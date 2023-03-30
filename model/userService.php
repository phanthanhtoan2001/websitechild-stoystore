<?php
session_start();
require_once('../model/user.php');
require_once('../phpconnectmongodb.php');


class userService
{
    private  $dbcollectiontoy;
    public function __construct()
    {
        $this->dbcollectiontoy  = Getmongodb("dbwebtoystore", "User");
    }
    public function getAll()
    {
        //$result = [];
        $result = $this->dbcollectiontoy->find([]);
        return $result;
    }
    public function countuser()
    {

        $result = $this->dbcollectiontoy->countDocuments();
        return $result;
    }

    // C

    public function findOneId($id)
    {
        $toy = $this->dbcollectiontoy->findOne(["userID" => (int)$id]);
        return $toy;
    }

    public function getNextProductId()
    {
        try {
            $lastProduct = $this->dbcollectiontoy->findOne([], ['sort' => ['userID' => -1]]);
            $lastProductId = 1;

            if ($lastProduct !== null) {
                $lastProductId = $lastProduct['userID'];
            }

            return $lastProductId + 1;
        } catch (Exception $e) {
            // Handle the exception here
            echo "Error: " . $e->getMessage();
            exit;
        }
    }



    public function createProduct($product)
    {
        $product['userID'] = $this->getNextProductId();
        $result = $this->dbcollectiontoy->insertOne($product);
        return $result;
    }
    public function deleteProduct($id)
    {
        $result = $this->dbcollectiontoy->deleteOne(["userID" => (int)$id]);
        return $result;
    }

    public function updateProduct($id, $updateData)
    {
        $result = $this->dbcollectiontoy->updateOne(
            ["userID" => (int)$id],
            ['$set' => $updateData]
        );
        return $result;
    }
}
