<?php

require_once('../model/bill.php');
require_once('../model/billService.php');
require_once('../phpconnectmongodb.php');

class BillController
{
    private $billService;
    public function __construct()
    {
        $this->billService = new billService();
    }
    public function getAllBillIndex()
    {
        return $this->billService->getAllBill();
    }
    public function getBillDetail($id)
    {
        return $this->billService->findOneId($id);
    }
    public function totalMoney()
    {
        return $this->billService->calculateTotalAmount();
    }
    public function totalBill()
    {
        return $this->billService->countBillsThisMonth();
    }
}
