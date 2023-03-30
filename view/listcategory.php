<?php
require_once('../controller/CategoryController.php');
$controller = new CategoryController();
$result = $controller->getAllProductIndex();

?>
<!doctype html>


<html class="no-js" lang="">

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
                            <strong class="card-title">Danh mục sản phẩm</strong>
                            <div>
                                <a href="/view/createcategory.php" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Thêm danh mục sản phẩm</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Mã</th>
                                        <th>Tên danh mục</th>

                                        <th> </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    foreach ($result as $document) {
                                        echo '<tr>';

                                        echo '<td>' . $document['categoryID'] . '</td>';
                                        echo '<td>' . $document['categoryName'] . '</td>';

                                        echo '<td><a href="/view/editcategory.php?id=' . $document['categoryID'] . ' "><i class="fa fa-pencil"></i></a>
                                        
                                        <a href="/view/deletecategory.php?id=' . $document['categoryID'] . '"
                                        onclick="confirmDelete(\'' . $document['categoryID'] . '\', \'' . $document['categoryName'] . '\')">
                                        <i class="fa fa-trash-o"></i>
                                    </a>                                        
                                        </td>';
                                        echo '</tr>';
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


    <?php include 'footer.php' ?>
    </div>
    <script>
        function confirmDelete(categoryID, categoryName) {
            var result = confirm("Bạn có chắc chắn muốn xóa sản phẩm '" + productName + "'?\n\n");
            if (result == Ok) {
                // xóa sản phẩm
            } else {
                // không xóa sản phẩm
            }
        }
    </script>

</body>

</html>