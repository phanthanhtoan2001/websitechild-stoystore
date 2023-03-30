<?php
require_once('../controller/UserController.php');
$controller = new userService();
$result = $controller->getAll();


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
                            <strong class="card-title">Danh sách người dùng</strong>
                        </div>

                        <div class="card-body">
                            <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Mã</th>
                                        <th>Tên người dùng</th>
                                        <th>Số điện thoại</th>
                                        <th>Địa chỉ</th>
                                        <th>phân loại</th>
                                        <th>địa chỉ mail</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    foreach ($result as $document) {
                                        echo '<tr>';

                                        echo '<td>' . $document['userID'] . '</td>';
                                        echo '<td>' . $document['userName'] . '</td>';
                                        echo '<td>' . $document['userPhoneNumber'] . '</td>';

                                        echo '<td>' . $document['userAddress'] . '</td>';
                                        echo '<td>' . $document['userRole'] . '</td>';
                                        echo '<td>' . $document['userEmail'] . '</td>';

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