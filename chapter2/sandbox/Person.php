<?php
class Person{
  public string $name;
  public string $email;
  public string $phone;

  public function __construct(string $name, string $email, string $phone){
    $this->name = $name;
    $this->email = $email;
    $this->phone = $phone;
  }

  public function displayUser(){
    echo "<br>";
    echo $this->name;
    echo "<br>";
    echo $this->email;
    echo "<br>";
    echo $this->phone;
    echo "<br>";
  }
}

$p1 = new Person("John Doe", "John@demo.com", '988989');
$p1->displayUser();

$p1 = new Person("Mary", "mary@demo.com", '98879');
$p1->displayUser();