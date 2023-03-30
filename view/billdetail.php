<?php
// Import productController class
require_once('../controller/BillController.php');

$id = isset($_GET['id']) ? $_GET['id'] : '';

$controller = new BillController();

$result = $controller->getBillDetail((int)$id);
?>
<?php
require_once('../controller/BillDetailController.php');

$controller = new BillDetailController();
$result1 = $controller->getAllBillIndex();

?>
<?php
require_once('../controller/UserController.php');

$controller = new userController();
$result2 = $controller->getAllProductIndex();

?>
<?php
require_once('../controller/productController.php');

$controller = new productController();
$result3 = $controller->getAllProductIndex();

?>
<!doctype html>

<!--[if gt IE 8]><!-->
<html class="no-js" lang=""> <!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Home</title>
    <style>
        .card {
            border-radius: 15px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
            background-color: #fff;
        }

        .card-body {
            padding: 2rem;
        }

        .container.mb-5.mt-3 {
            margin-top: 1.5rem;
            margin-bottom: 3rem;
        }

        .text-muted {
            color: #7e8d9f;
        }

        .text-muted span {
            color: #8f8061;
        }

        .text-center {
            text-align: center;
        }

        img {
            max-width: 100%;
            height: auto;
            display: block;
            margin-left: auto;
            margin-right: auto;
        }

        .product-info {
            display: flex;
            align-items: center;
            justify-content: flex-start;
            gap: 1rem;
            margin-top: 2rem;
            margin-bottom: 2rem;
        }

        .product-img {
            width: 100px;
            height: 100px;
        }

        .product-details {
            display: flex;
            flex-direction: column;
        }

        hr {
            border-top: 1px solid #dee2e6;
            margin-top: 2rem;
            margin-bottom: 2rem;
        }

        .ms-3 {
            margin-left: 1rem;
        }

        .mt-2 {
            margin-top: 0.5rem;
        }

        .float-start {
            float: left;
        }

        .text-black {
            color: #000;
        }

        .fw-bold {
            font-weight: bold;
        }

        .badge {
            border-radius: 15px;
            font-size: 0.8rem;
            padding: 0.5rem;
        }

        .bg-warning {
            background-color: #ffc107;
            color: #000;
        }

        ul.list-unstyled li {
            margin-bottom: 1rem;
        }

        ul.list-unstyled li:last-child {
            margin-bottom: 0;
        }
    </style>

</head>

<body>

    <?php include 'header.php' ?> <?php ?>
    <div class="card">
        <div class="card-body">
            <div class="container mb-5 mt-3">
                <div class="row d-flex align-items-baseline">
                    <div class="col-xl-9">
                        <p style="color: #7e8d9f;font-size: 20px;">Mã hóa đơn &gt;&gt; <strong>ID: <?php echo $result['billID'] ?></strong></p>
                    </div>
                </div>
                <div class="container">
                    <div class="col-md-12">
                        <div class="text-center">
                            <img src="https://res.cloudinary.com/ddt8drwas/image/upload/v1679934580/TVT_n5hd3g.png">

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-8">
                            <?php
                            foreach ($result2 as $document2) {
                                if ($document2['userID'] == $result['userID']) {
                                    echo '<ul class="list-unstyled">';
                                    echo '<li class="text-muted">Họ và tên khách hàng: <span style="color:#8f8061 ;">' . $document2['userName'] . '</span></li>';
                                    echo '<li class="text-muted"> Địa chỉ:' . $document2['userAddress'] . '</li>';
                                    echo '<li class="text-muted"><i class="fa fa-phone"></i> SĐT: ' . $document2['userPhoneNumber'] . '</li>';
                                }
                            }

                            echo '</ul>';
                            ?>

                            <?php
                            $billDate = $result['billDate'];
                            $dateTime = (new DateTime())->setTimestamp($billDate->toDateTime()->getTimestamp());
                            $formattedDate = $dateTime->format('d/m/Y');

                            ?>
                        </div>
                        <div class="col-xl-4">

                            <ul class="list-unstyled">
                                <li class="text-muted"><i class="fa fa-circle" style="color:#8f8061 ;"></i> <span class="fw-bold">ID:</span><?php echo $result['billID'] ?></li>
                                <li class="text-muted"><i class="fa fa-circle" style="color:#8f8061 ;"></i> <span class="fw-bold">Ngày tạo hóa đơn: </span><?php echo $formattedDate  ?></li>
                                <li class="text-muted"><i class="fa fa-circle" style="color:#8f8061;"></i> <span class="me-1 fw-bold">Status:</span><span class="badge bg-warning text-black fw-bold">
                                        Hoàn thành</span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="product-info">
                        <?php foreach ($result1 as $document1) { ?>
                            <?php foreach ($result3 as $document3) { ?>
                                <?php if ($document1['productID'] == $document3['productID'] && $document1['billID'] == $result['billID']) { ?>
                                    <div class="card mb-3">
                                        <div class="row g-0 align-items-center">
                                            <div class="col-md-4">
                                                <img src="<?php echo $document3['productImage']; ?>" class="card-img" alt="Elegant shoes and shirt" />
                                            </div>
                                            <div class="col-md-8">
                                                <div class="card-body">
                                                    <h5 class="card-title"><?php echo $document3['productName']; ?></h5>
                                                    <p class="card-text mb-0"><span class="text-muted">Giá:</span> <?php echo $document3['productPrice']; ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php break; ?>
                                <?php } ?>
                            <?php } ?>
                        <?php } ?>
                    </div>



                    <hr>
                    <div class="row">
                        <div class="col-xl-8">
                            <p class="ms-3">Add additional notes and payment information</p>
                        </div>
                        <div class="col-xl-3">
                            <ul class="list-unstyled">
                                <li class="text-muted ms-3"><span class="text-black me-4">SubTotal</span>$1050</li>
                                <li class="text-muted ms-3 mt-2"><span class="text-black me-4">Shipping</span>$15</li>
                            </ul>
                            <p class="text-black float-start"><span class="text-black me-3"> Total Amount</span><span style="font-size: 25px;">$1065</span></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include 'footer.php' ?>
</body>

</html>