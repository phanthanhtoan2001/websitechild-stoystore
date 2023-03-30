<?php
// Import productController class
require_once('../controller/productController.php');

// Get the ID of the product from the URL parameter
$id = isset($_GET['id']) ? $_GET['id'] : '';

// Create an instance of productController
$controller = new productController();

// Call the getProductDetail() method to get the product detail
$result = $controller->deleteById((int)$id);
