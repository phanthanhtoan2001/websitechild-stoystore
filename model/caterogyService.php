<?php
require_once('../model/category.php');
require_once('../phpconnectmongodb.php');


class categoryService
{
    private  $dbcollectiontoy;
    public function __construct()
    {
        $this->dbcollectiontoy  = Getmongodb("dbwebtoystore", "Category");
    }
    public function getAllToy()
    {
        //$result = [];
        $result = $this->dbcollectiontoy->find([]);
        return $result;
    }

    // C

    public function findOneId($id)
    {
        $toy = $this->dbcollectiontoy->findOne(["categoryID" => (int)$id]);
        return $toy;
    }

    public function getNextProductId()
    {
        try {
            $lastProduct = $this->dbcollectiontoy->findOne([], ['sort' => ['categoryID' => -1]]);
            $lastProductId = 1;

            if ($lastProduct !== null) {
                $lastProductId = $lastProduct['categoryID'];
            }

            return $lastProductId + 1;
        } catch (Exception $e) {
            // Handle the exception here
            echo "Error: " . $e->getMessage();
            exit;
        }
    }



    public function createProduct($Category)
    {
        $Category['categoryID'] = $this->getNextProductId();
        $result = $this->dbcollectiontoy->insertOne($Category);
        return $result;
    }
    public function deleteProduct($id)
    {
        $result = $this->dbcollectiontoy->deleteOne(["categoryID" => (int)$id]);
        return $result;
    }

    public function updateProduct($id, $updateData)
    {
        $result = $this->dbcollectiontoy->updateOne(
            ["categoryID" => (int)$id],
            ['$set' => $updateData]
        );
        return $result;
    }
}
