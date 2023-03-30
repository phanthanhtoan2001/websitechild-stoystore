<?php
class user
{

    private $userID;
    private $userName;
    private $userPhoneNumber;
    private $userAddress;
    private $userRole;
    private $userEmail;



    public function __construct()
    {
    }
    public function GetuserID()
    {
        return $this->userID;
    }
    public function SetuserID($userID)
    {
        $this->userID = strtoupper($userID);
    }
    public function GetuserName()
    {
        return $this->userName;
    }
    public function SetuserName($userName)
    {
        $this->userName = strtoupper($userName);
    }
    public function GetuserPhoneNumber()
    {
        return $this->userPhoneNumber;
    }
    public function SetuserPhoneNumber($userPhoneNumber)
    {
        $this->userPhoneNumber = strtoupper($userPhoneNumber);
    }
    public function GetuserAddress()
    {
        return $this->userAddress;
    }
    public function SetuserAddress($userAddress)
    {
        $this->userAddress = strtoupper($userAddress);
    }

    public function GetuserRole()
    {
        return $this->userRole;
    }
    public function SetuserRole($userRole)
    {
        $this->userRole = strtoupper($userRole);
    }
    public function GetuserEmail()
    {
        return $this->userEmail;
    }
    public function SetuserEmail($userEmail)
    {
        $this->userEmail = strtoupper($userEmail);
    }
}
