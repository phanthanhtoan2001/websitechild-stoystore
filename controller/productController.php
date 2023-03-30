<?php

require_once('../model/toyclass.php');
require_once('../model/toyService.php');
require_once('../phpconnectmongodb.php');




class productController
{
    private $toyService;
    public function __construct()
    {
        $this->toyService = new toyService();
    }
    public function getAllProductIndex()
    {
        return $this->toyService->getAllToy();
    }
    public function getById($id)
    {

        return $this->toyService->findOneId($id);
    }
    public function deleteById($id)
    {
        header('Location:../view/listproduct.php');
        return $this->toyService->deleteProduct($id);
    }
    public function updateById($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = array(
                'productName' => ($_POST['productName']),
                'productPrice' => $_POST['productPrice'],
                'productImage' =>  $_POST['productImage'],
                'productDescription' => $_POST['productDescription'],
                'productStock' => $_POST['productStock'],
                'categoryID' => $_POST['categoryID']
                // Các trường thông tin sản phẩm khác
            );
            header('Location:../view/listproduct.php');
            // Update thông tin sản phẩm vào MongoDB
            return  $this->toyService->updateProduct($id, $data);
        }
    }

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $product = array(

                'productName' => ($_POST['productName']),
                'productPrice' => $_POST['productPrice'],
                'productImage' =>  $_POST['productImage'],
                'productDescription' => $_POST['productDescription'],
                'productStock' => $_POST['productStock'],
                'categoryID' => $_POST['categoryID']
            );
            header('Location:../view/listproduct.php');
            return  $this->toyService->createProduct($product);
        }
    }
    public function getStockIn()
    {
        return $this->toyService->getTopProducts();
    }
}
