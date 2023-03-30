<?php
class Bill
{

    private $billID;
    private $billDate;
    private $billNote;
    private $billPaymentMethod;
    private $total;
    private $userID;



    public function __construct()
    {
    }
    public function GetbillID()
    {
        return $this->billID;
    }
    public function SetproductID($billID)
    {
        $this->billID = strtoupper($billID);
    }
    public function GetbillDate()
    {
        return $this->billDate;
    }
    public function SetbillDate($billDate)
    {
        $this->billDate = strtoupper($billDate);
    }
    public function GetbillNote()
    {
        return $this->billNote;
    }
    public function SetbillNote($billNote)
    {
        $this->billNote = strtoupper($billNote);
    }
    public function GetbillPaymentMethod()
    {
        return $this->billPaymentMethod;
    }
    public function SetbillPaymentMethod($billPaymentMethod)
    {
        $this->billPaymentMethod = strtoupper($billPaymentMethod);
    }

    public function Gettotal()
    {
        return $this->total;
    }
    public function Settotal($total)
    {
        $this->total = strtoupper($total);
    }
    public function GetuserID()
    {
        return $this->userID;
    }
    public function SetuserID($userID)
    {
        $this->userID = strtoupper($userID);
    }
}
