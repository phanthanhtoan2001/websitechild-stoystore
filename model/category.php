<?php
class Category
{
    private $categoryID;
    private $categoryName;
    public function __construct()
    {
    }
    public function GetcategoryName()
    {
        return $this->categoryName;
    }
    public function SetcategoryName($categoryName)
    {
        $this->categoryName = strtoupper($categoryName);
    }

    public function GetcategoryID()
    {
        return $this->categoryID;
    }
    public function SetcategoryID($categoryID)
    {
        $this->categoryID = strtoupper($categoryID);
    }
}
