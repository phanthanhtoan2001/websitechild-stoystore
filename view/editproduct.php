<?php
require_once('../controller/productController.php');
$id = isset($_GET['id']) ? $_GET['id'] : '';

$controller = new productController();
$result = $controller->getById((int)$id);
$controller->updateById((int)$id);
?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Chi tiết sản phẩm</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
</head>

<body>
    <?php include 'header.php' ?>
    <div class="container my-5">
        <h1 class="text-center mb-4">Chỉnh sửa sản phẩm</h1>
        <form method="post">
            <div class="mb-3">
                <label for="productName" class="form-label">Product Name</label>
                <input type="text" name="productName" id="productName" value="<?php echo $result['productName'] ?>" class="form-control">
            </div>
            <div class="mb-3">
                <label for="productDescription" class="form-label">Product Description</label>
                <textarea name="productDescription" id="productDescription" class="form-control"><?php echo $result['productDescription']; ?></textarea>
            </div>

            <div class="mb-3 d-flex justify-content-center align-items-center">
                <label for="fileupload" class="form-label me-2">Product Image</label>
                <input type="file" id="fileupload" class="form-control">
                <input type="text" value="<?php echo $result['productImage'] ?>" hidden name="productImage" id="productImage" class="form-control">
            </div>
            <div class="d-flex justify-content-center align-items-center">
                <img id="id" src="<?php echo $result['productImage'] ?>" alt="Chờ cập nhật" width="400" height="300">
            </div>
            <div class="mb-3">
                <label for="productPrice" class="form-label">Product Price</label>
                <input type="text" name="productPrice" id="productPrice" value="<?php echo $result['productPrice'] ?>" class="form-control">
            </div>

            <div class="mb-3">
                <label for="productStock" class="form-label">Product Stock</label>
                <input value="<?php echo $result['productStock'] ?>" type="text" name="productStock" id="productStock" class="form-control">
            </div>

            <div class="mb-3">
                <label for="categoryID" class="form-label">Category ID</label>
                <input value="<?php echo $result['categoryID'] ?>" type="text" name="categoryID" id="categoryID" class="form-control">
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-primary">Edit Product</button>
            </div>
        </form>
    </div>
    <script src="../assets/js/Upload.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/js/bootstrap.min.js"></script>
    <?php include 'footer.php' ?>
</body>

</html>