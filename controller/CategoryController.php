<?php

require_once('../model/category.php');
require_once('../model/caterogyService.php');
require_once('../phpconnectmongodb.php');



class CategoryController
{
    private $categoryService;
    public function __construct()
    {
        $this->categoryService = new categoryService();
    }
    public function getAllProductIndex()
    {
        return $this->categoryService->getAllToy();
    }
    public function getById($id)
    {

        return $this->categoryService->findOneId($id);
    }
    public function deleteById($id)
    {
        header('Location:../view/listcategory.php');
        return $this->categoryService->deleteProduct($id);
    }
    // Controller
    public function updateById($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = array(
                'categoryName' => ($_POST['categoryName']),

            );
            header('Location:../view/listcategory.php');

            return  $this->categoryService->updateProduct($id, $data);
        }
    }
    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = array(
                'categoryName' => ($_POST['categoryName']),

            );
            header('Location:../view/listcategory.php');
            return  $this->categoryService->createProduct($data);
        }
    }
}
