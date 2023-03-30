<?php
require_once('../controller/productController.php');

$controller = new productController();

$controller->create();
?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Create Product</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
</head>

<body>
    <?php include 'header.php' ?>
    <div class="container my-5">
        <h1 class="text-center mb-4">Create Product</h1>
        <form method="post">
            <div class="mb-3">
                <label for="productName" class="form-label">Product Name</label>
                <input type="text" name="productName" id="productName" class="form-control">
            </div>
            <div class="mb-3">
                <label for="productDescription" class="form-label">Product Description</label>
                <textarea name="productDescription" id="productDescription" class="form-control"></textarea>
            </div>

            <div class="mb-3 d-flex justify-content-center align-items-center">
                <label for="fileupload" class="form-label me-2">Product Image</label>
                <input type="file" id="fileupload" class="form-control">
                <input type="text" hidden name="productImage" id="productImage" class="form-control">
            </div>
            <div class="d-flex justify-content-center align-items-center">
                <img id="id" src="https://linhkienvietfones.vn/wp-content/uploads/2022/08/no-image-800x600-1-300x225.png" alt="" width="400" height="300">
            </div>
            <div class="mb-3">
                <label for="productPrice" class="form-label">Product Price</label>
                <input type="text" name="productPrice" id="productPrice" class="form-control">
            </div>

            <div class="mb-3">
                <label for="productStock" class="form-label">Product Stock</label>
                <input type="text" name="productStock" id="productStock" class="form-control">
            </div>
            <div class="mb-3">
                <select name="categoryID" id="categoryID" class="form-control">
                    <?php
                    require_once('../controller/CategoryController.php');
                    $controller = new CategoryController();
                    $categories = $controller->getAllProductIndex();
                    foreach ($categories as $category) {
                        echo '<option value="' . $category['categoryID'] . '">' . $category['categoryName'] . '</option>';
                    }
                    ?>
                </select>
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-primary">Create Product</button>
            </div>
        </form>
    </div>
    <script src="../assets/js/Upload.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/js/bootstrap.min.js"></script>
    <?php include 'footer.php' ?>
</body>

</html>