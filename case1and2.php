<?php

//without classes
$banana = 1;
$apple = 1.5;
$wine = 10;
echo 'basic : ' . $banana * 6 + $apple * 3 + $wine * 2 . 'price total <br>';
echo $banana * 6 * 0.06 + $apple * 3 * 0.06 + $wine * 2 * 0.21 . 'tax <br>';

//classes
class item
{
  public float $price;
  public string $name;
  public float $taxPercent;
  public float $taxPerItem;
  public float $discount;
  public function __construct($name, $price, $taxPercent, $discount = 0)
  {
    $this->name = $name;
    $this->price = $price;
    $this->taxPercent = $taxPercent;
    $this->discount = $discount;
  }
  public function getTaxPerItem()
  {
    return ($this->price - ($this->price * $this->discount)) * ($this->taxPercent / 100);
  }
  public function getPrice(bool $discounted = true)
  {
    if ($discounted)
      return $this->price - ($this->price * $this->discount);
    else
      return $this->price;
  }
  public function setDiscount(float $discount)
  {
    $this->discount = $discount;
  }
}
