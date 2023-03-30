<?php
// Import productController class
require_once('../controller/productController.php');

// Get the ID of the product from the URL parameter
$id = isset($_GET['id']) ? $_GET['id'] : '';

// Create an instance of productController
$controller = new productController();

// Call the getProductDetail() method to get the product detail
$result = $controller->getById((int)$id);
?>

<!doctype html>


<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Details</title>

</head>

<body>

    <?php include 'header.php' ?>


    <div class="content">
        <div class="animated fadeIn">
            <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Data Table</strong>


                        </div>
                        <div class="card-body">
                            <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Mã</th>
                                        <th>Tên sản phẩm</th>
                                        <th>Mô tả</th>
                                        <th>Hình ảnh</th>
                                        <th>Giá</th>
                                        <th>Số lượng</th>
                                        <th>Danh mục</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if ($result != null) {
                                        echo '<tr>';
                                        echo '<td>' . $result['productID'] . '</td>';
                                        echo '<td>' . $result['productName'] . '</td>';
                                        echo '<td>' . $result['productDescription'] . '</td>';
                                        echo '<td><img src="' . $result['productImage'] . '" width="100" height="100"></td>';
                                        echo '<td>' . $result['productPrice'] . '</td>';
                                        echo '<td>' . $result['productStock'] . '</td>';
                                        echo '<td>' . $result['categoryID'] . '</td>';
                                        echo '</tr>';
                                    } else {
                                        echo '<tr><td colspan="8">Product not found</td></tr>';
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>


            </div>
        </div><!-- .animated -->
    </div><!-- .content -->
    <div class="clearfix"></div>
    <?php include 'footer.php' ?> </div>
</body>

</html>