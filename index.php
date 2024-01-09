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

$banana = new item('banana', 1, 6, 0);
$apple = new item('apple', 1.5, 6, 0);
$wine = new item('wine', 10, 21, 0);

echo 'classes : ' . $banana->getPrice() * 6 + $apple->getPrice() * 3 + $wine->getPrice() * 2 . 'price total <br>';
echo $banana->getTaxPerItem() * 6 + $apple->getTaxPerItem() * 3 + $wine->getTaxPerItem() * 2 . 'tax <br>';

//ex 2
$banana->setDiscount(0.5);
$apple->setDiscount(0.5);

echo 'discount : ' . $banana->getPrice() * 6 + $apple->getPrice() * 3 + $wine->getPrice() * 2 . 'price total <br>';
echo $banana->getTaxPerItem() * 6 + $apple->getTaxPerItem() * 3 + $wine->getTaxPerItem() * 2 . 'tax';