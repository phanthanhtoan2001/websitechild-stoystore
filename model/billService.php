<?php
require_once('../model/bill.php');
require_once('../phpconnectmongodb.php');


class billService
{
    private  $dbcollectiontoy;
    public function __construct()
    {
        $this->dbcollectiontoy  = Getmongodb("dbwebtoystore", "Bill");
    }
    public function getAllBill()
    {
        $result = $this->dbcollectiontoy->find([]);
        return $result;
    }
    public function findOneId($id)
    {
        $bill = $this->dbcollectiontoy->findOne(["billID" => (int)$id]);
        return $bill;
    }
    public function calculateTotalAmount()
    {
        $totalAmount = 0;

        $cursor = $this->dbcollectiontoy->find([]);

        foreach ($cursor as $document) {
            $totalAmount += $document['total'];
        }

        return $totalAmount;
    }
    public function countBillsThisMonth()
    {

        $filter = [];

        // Count the number of bills
        $count = $this->dbcollectiontoy->countDocuments($filter);

        return $count;
    }
}
