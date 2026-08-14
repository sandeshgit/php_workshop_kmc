<?php

class Product{
  
  private string $name;
  private int $price;
  private float $quantity;

  public function __construct(string $name, int $price, float $quantity) {
    $this->setProductName($name);
    $this->setPrice($price);
    $this->quantity = $quantity;
  }

  public function setPrice(int $price): bool{
    if ($price < 0){
      echo "The price can't be a negative number";
      return false;
    }
    $this->price = $price;
    return true;
  }

  public function getProductName(): string{
    return $this->name;
  }

  public function setProductName(string $name): bool{
    if (strlen($name) < 3) {
      echo "The product name should have at least 3 characters";
      return false;
    }

    if (!preg_match('/^[a-zA-Z0-9_]+$/', $name)) {
      echo "The product name should contain only alphabets, numebers and underscore";
      return false;
    }

    $this->name = $name;
    return true;
  }
  

  public function displayProduct(): void{
    echo "<br>";
    // echo __CLASS__;
    // echo "<br>";
    // echo __METHOD__;
    // echo "<br>";
    // echo __FILE__;
    echo "<br>";
    echo "Name: ";
    echo $this->name;
    echo "<br>";
    echo "Price: ";
    echo $this->price;
    echo "<br>";
    echo "Quantity: ";
    echo $this->quantity;
  }
}

