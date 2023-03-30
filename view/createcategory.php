<?php
require_once('../controller/CategoryController.php');
$controller = new CategoryController();
$controller->create();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Thêm sản phẩm</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
</head>

<body>
    <?php include 'header.php' ?>
    <div class="container my-5">
        <h1 class="text-center mb-4">Thêm sản phẩm</h1>
        <form method="post">
            <div class="mb-3">
                <label for="categoryName" class="form-label">Category name</label>
                <input type="text" name="categoryName" id="categoryName" class="form-control">
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-primary">Create Category</button>
            </div>
        </form>
    </div>
    <script src="../assets/js/Upload.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/js/bootstrap.min.js"></script>
    <?php include 'footer.php' ?>
</body>

</html>