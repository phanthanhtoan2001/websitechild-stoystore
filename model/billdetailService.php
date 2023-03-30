<?php
require_once('../model/billdetail.php');
require_once('../phpconnectmongodb.php');


class billdetailService
{
    private  $dbcollectiontoy;
    public function __construct()
    {
        $this->dbcollectiontoy  = Getmongodb("dbwebtoystore", "BillDetail");
    }
    public function getAllBillDetail()
    {
        $result = $this->dbcollectiontoy->find([]);
        return $result;
    }
    public function countTopProducts()
    {
        $pipeline = [
            [
                // Match BillDetail documents with a non-null productId field
                '$match' => ['productID' => ['$ne' => null]]
            ],
            [
                // Group by productId and count the occurrences of each productId
                '$group' => [
                    '_id' => '$productID',
                    'count' => ['$sum' => 1]
                ]
            ],
            [
                // Sort by descending count
                '$sort' => ['count' => -1]
            ],
            [
                // Limit the result to the top 10 products
                '$limit' => 10
            ]
        ];

        $cursor = $this->dbcollectiontoy->aggregate($pipeline);
        $result = [];
        foreach ($cursor as $document) {
            $result[] = $document;
        }
        return $result;
    }
}
