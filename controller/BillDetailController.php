<?php

require_once('../model/billdetail.php');
require_once('../model/billdetailService.php');
require_once('../phpconnectmongodb.php');

class BillDetailController
{
    private $billService;
    public function __construct()
    {
        $this->billService = new billdetailService();
    }
    public function getAllBillIndex()
    {
        return $this->billService->getAllBillDetail();
    }
    public function countTop10Product()
    {
        return $this->billService->countTopProducts();
    }
}
