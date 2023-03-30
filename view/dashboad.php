<?php
require_once('../controller/UserController.php');
$controller = new userController();
$result = $controller->countById();
?>
<?php
require_once('../controller/productController.php');
$controller = new productController();
$result1 = $controller->getStockIn();
$resultall = $controller->getAllProductIndex();
?>
<?php
require_once('../controller/BillController.php');
$controller = new BillController();
$result2 = $controller->totalMoney();
$result3 = $controller->totalBill();
?>
<?php
require_once('../controller/BillDetailController.php');
$controller = new BillDetailController();
$resulttop = $controller->countTop10Product();
?>



<!doctype html>

<!--[if gt IE 8]><!-->
<html class="no-js" lang=""> <!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Home - trang chủ</title>

    <style>
        #product-chart {
            margin: auto;
            display: block;
        }
    </style>
</head>

<body>

    <?php include 'header.php' ?>

    <div class="content">
        <!-- Animated -->
        <div class="animated fadeIn">
            <!-- Widgets  -->
            <div class="row justify-content-center">
                <div class="col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="stat-widget-five">
                                <div class="stat-icon dib flat-color-1">
                                    <i class="pe-7s-cash"></i>
                                </div>
                                <div class="stat-content">
                                    <div class="text-left dib">
                                        <div class="stat-text"><?php echo $result2 ?></div>
                                        <div class="stat-heading"> Tổng doanh thu</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



                <div class="col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="stat-widget-five">
                                <div class="stat-icon dib flat-color-3">
                                    <i class="pe-7s-browser"></i>
                                </div>
                                <div class="stat-content">
                                    <div class="text-left dib">
                                        <div class="stat-text"><?php echo $result3 ?></div>
                                        <div class="stat-heading">Số lượng bill</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="stat-widget-five">
                                <div class="stat-icon dib flat-color-4">
                                    <i class="pe-7s-users"></i>
                                </div>
                                <div class="stat-content">
                                    <div class="text-left dib">
                                        <div class="stat-text"><span><?php echo  $result; ?></span></div>
                                        <div class="stat-heading">Khách hàng</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.breadcrumbs-->
            <!-- Content -->

        </div>
    </div>
    <div class="content" style="text-align:center;">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center ">
                            <strong class="card-title">Top sản phẩm bán chạy</strong>

                        </div>
                        <div class="card-body">
                            <canvas id="myChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="content" style="text-align:center;">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Sản phẩm tồn kho </strong>
                        </div>
                        <div class="card-body">
                            <canvas id="product-chart" width="1200" height="500"></canvas>
                            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                            <script>
                                var labels = [];
                                var data = [];

                                <?php foreach ($result1 as $document) { ?>
                                    labels.push('<?php echo $document['productName']; ?>');
                                    data.push(<?php echo $document['productStock']; ?>);
                                <?php } ?>

                                var ctx = document.getElementById('product-chart').getContext('2d');
                                var chart = new Chart(ctx, {
                                    type: 'line',
                                    data: {
                                        labels: labels,
                                        datasets: [{
                                            label: 'Product Stock',
                                            data: data,
                                            backgroundColor: 'rgba(255, 99, 132, 0.2)',
                                            borderColor: 'rgba(255, 99, 132, 1)',
                                            borderWidth: 1
                                        }]
                                    },
                                    options: {
                                        scales: {
                                            yAxes: [{
                                                ticks: {
                                                    beginAtZero: true
                                                }
                                            }]
                                        }
                                    }
                                });
                            </script>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- --------------------- -->

    <?php include 'footer.php' ?>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        var data = {
            labels: [
                <?php foreach ($resulttop as $documenttop) {
                    foreach ($resultall as $all) {
                        if ($documenttop['_id'] ==  $all['productID']) {
                            echo "'" . $all['productName'] . "',";
                            break;
                        }
                    }
                } ?>
            ],
            datasets: [{
                data: [
                    <?php foreach ($resulttop as $documenttop) {
                        echo $documenttop['count'] . ",";
                    } ?>
                ],
                backgroundColor: [
                    'rgba(54, 162, 235, 0.7)',
                    'rgba(255, 99, 132, 0.7)',
                    'rgba(75, 192, 192, 0.7)',
                    'rgba(255, 206, 86, 0.7)',
                    'rgba(153, 102, 255, 0.7)',
                    'rgba(255, 159, 64, 0.7)'
                ],
                borderColor: [
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 99, 132, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        };
        var options = {
            responsive: true,
            maintainAspectRatio: false,
            legend: {
                position: 'right',
                labels: {
                    fontSize: 14
                }
            },
            animation: {
                animateScale: true,
                animateRotate: true
            }
        };
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'pie',
            data: data,
            options: options
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
    <script src="/assets/js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flot-charts@0.8.3/excanvas.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flot-charts@0.8.3/jquery.flot.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery.flot@0.8.3/jquery.flot.pie.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery.flot@0.8.3/jquery.flot.time.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery.flot@0.8.3/jquery.flot.stack.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery.flot@0.8.3/jquery.flot.resize.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery.flot@0.8.3/jquery.flot.crosshair.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flot.curvedlines@1.1.1/curvedLines.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery.flot.tooltip@0.9.0/js/jquery.flot.tooltip.min.js"></script>
    <script src="/assets/js/init/flot-chart-init.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>




</body>

</html>