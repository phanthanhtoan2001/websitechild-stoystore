 <?php
    require_once('../controller/BillController.php');
    $controller = new BillController();
    $result = $controller->getAllBillIndex();
    ?>
 <?php
    require_once('../controller/UserController.php');
    $controller = new UserController();
    $result1 = $controller->getAllProductIndex();
    ?>

 <!doctype html>

 <!--[if gt IE 8]><!-->
 <html class="no-js" lang=""> <!--<![endif]-->

 <head>
     <meta charset="utf-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <title>List Detail Bill</title>

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
                                         <th>Mã hóa đơn</th>
                                         <th>Khách hàng</th>
                                         <th>Ngày tạo hóa đơn</th>
                                         <th>Mô tả</th>
                                         <th>Phương thức thanh toán</th>
                                         <th>Giá</th>

                                         <th></th>
                                     </tr>
                                 </thead>
                                 <tbody>
                                     <?php

                                        foreach ($result as $document) {
                                            echo '<tr>';

                                            echo '<td>' . $document['billID'] . '</td>';
                                            foreach ($result1  as $document1) {
                                                if ($document['userID'] == $document1['userID']) {
                                                    echo '<td>' . $document1['userName'] . '</td>';
                                                    break;
                                                }
                                            }
                                            $billDate = $document['billDate'];

                                            // Check if the date string is in the correct format
                                            $billDate = $document['billDate'];
                                            $dateTime = (new DateTime())->setTimestamp($billDate->toDateTime()->getTimestamp());
                                            $formattedDate = $dateTime->format('d/m/Y');
                                            echo '<td>' . $formattedDate . '</td>';


                                            echo '<td>' . $document['billNote'] . '</td>';
                                            echo '<td>' . $document['billPaymentMethod'] . '</td>';
                                            echo '<td>' . $document['total'] . '</td>';
                                            echo '<td><a href="/view/billdetail.php?id=' . $document['billID'] . '"><i class="fa fa-info-circle"></i></a> </td>';
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




 </body>

 </html>