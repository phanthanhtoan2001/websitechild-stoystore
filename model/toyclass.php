<?php
class Toy
{

  private $productID;
  private $productName;
  private $productStock;
  private $productPrice;
  private $categoryID;
  private $productImage;
  private $productDescription;


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
  public function GetproductName()
  {
    return $this->productName;
  }
  public function SetProductname($productName)
  {
    $this->productName = strtoupper($productName);
  }
  public function GetproductDescription()
  {
    return $this->productDescription;
  }
  public function SetproductDescription($productDescription)
  {
    $this->productDescription = strtoupper($productDescription);
  }
  public function GetproductImage()
  {
    return $this->productImage;
  }
  public function SetproductImage($productImage)
  {
    $this->productImage = strtoupper($productImage);
  }

  public function GetproductPrice()
  {
    return $this->productPrice;
  }
  public function SetproductPrice($productPrice)
  {
    $this->productPrice = strtoupper($productPrice);
  }
  public function GetproductStock()
  {
    return $this->productStock;
  }
  public function SetproductStock($productStock)
  {
    $this->productStock = strtoupper($productStock);
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
