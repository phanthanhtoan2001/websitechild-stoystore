<?php

use function PHPUnit\Framework\equalTo;

require_once('../controller/productController.php');
$controller = new productController();
$result = $controller->getAllProductIndex();
?>
<?php
require_once('../controller/CategoryController.php');

$controller = new CategoryController();
$result1 = $controller->getAllProductIndex();

?>

<!doctype html>

<!--[if gt IE 8]><!-->
<html class="no-js" lang=""> <!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Home</title>

</head>

<body>

    <?php include 'header.php' ?>


    <div class="content">
        <div class="animated fadeIn">
            <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <strong class="card-title">Sản phẩm</strong>
                            <div>
                                <a href="/view/Createproduct.php" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Thêm sản phẩm</a>
                            </div>
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
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $resultArray = $result->toArray();
                                    $resultArray1 = $result1->toArray();
                                    foreach ($resultArray as $document) {

                                        echo '<tr>';
                                        echo '<td>' . $document['productID'] . '</td>';
                                        echo '<td>' . $document['productName'] . '</td>';
                                        echo '<td>' . $document['productDescription'] . '</td>';
                                        echo '<td><img src="' . $document['productImage'] . '" width="100" height="100"></td>';
                                        echo '<td>' . number_format($document['productPrice'], 0, ',', '.') . ' VND</td>';
                                        echo '<td>' . $document['productStock'] . '</td>';

                                        foreach ($resultArray1 as $document1) {
                                            if ($document['categoryID'] == $document1['categoryID']) {
                                                echo '<td>' . $document1['categoryName'] . '</td>';
                                                break;
                                            }
                                        }


                                        echo '<td>
            <a href="/view/editproduct.php?id=' . $document['productID'] . '"><i class="fa fa-pencil"></i></a>
            <a href="/view/deleteproduct.php?id=' . $document['productID'] . '" onclick="confirmDelete(\'' . $document['productName'] . '\', \'' . $document['productImage'] . '\')">
              <i class="fa fa-trash-o"></i>
            </a>
          </td>';
                                        echo '</tr>';
                                    }

                                    ?>
                                    <video controls>
                                        <source idsrc="">
                                    </video>


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>


            </div>
        </div><!-- .animated -->
    </div><!-- .content -->
    <div class="clearfix"></div>


    <?php include 'footer.php' ?>

    </div>
    <script>
        function confirmDelete(productName, productImage) {
            var result = confirm("Bạn có chắc chắn muốn xóa sản phẩm '" + productName + "'?\n\n");
            if (result == true) {
                console.log("Sản phẩm " + productName + " đã được xóa.");

            } else {
                console.log("Đã huỷ xóa sản phẩm " + productName + ".");

            }
        }
    </script>

</body>

</html>