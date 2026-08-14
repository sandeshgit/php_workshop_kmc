<?php
class Calculator{
  public float $result = 0;
  
  public function add(float $number): static {
    $this->result += $number;
    return $this;
  }

  public function subtract(float $number): static {
    $this->result -= $number;
    return $this;
  }

  public function multiply(float $number): static {
    $this->result *= $number;
    return $this;
  }

  public function divide(float $number): static {
    if ($number != 0){
      $this->result /= $number;
    } else {
      echo "<br> Divison by Zero is not possible";
    }
    return $this;
  }

  public function getResult(): float {
    return $this->result;
  }

  public function reset(): static{
    $this->result = 0;
    return $this;
  }

}

$calc1 = new Calculator();
$calc1->add(10);
$calc1->subtract(5);
$calc1->multiply(4);
echo $calc1->getResult();

$calc1->reset();

$calc1->add(10)->subtract(5)->multiply(4);
echo "<br>";
echo $calc1->getResult();