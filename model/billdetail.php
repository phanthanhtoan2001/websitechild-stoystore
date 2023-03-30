<?php
class billdetail
{

    private $billID;
    private $productID;
    private $productQuantity;
    private $productCost;



    public function __construct()
    {
    }
    public function GetproductID()
    {
        return $this->productID;
    }
    public function SetproductID($productID)
    {
        $this->productID = strtoupper($productID);
    }
    public function GetbillID()
    {
        return $this->billID;
    }
    public function SetbillIDe($billID)
    {
        $this->billID = strtoupper($billID);
    }
    public function GetproductQuantity()
    {
        return $this->productQuantity;
    }
    public function SetproductQuantity($productQuantity)
    {
        $this->productQuantity = strtoupper($productQuantity);
    }
    public function GetproductCost()
    {
        return $this->productCost;
    }
    public function SetproductCost($productCost)
    {
        $this->productCost = strtoupper($productCost);
    }
}
