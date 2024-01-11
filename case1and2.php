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

//basket case...2.5?
class basket
{
  public array $content = [];
  public function add(item $item, int $count = 1)
  {
    //check if the item is in basket,change count and return
    foreach ($this->content as &$id) {
      if ($id['0']->name == $item->name) {
        $id['1'] += $count; //[0]is the item , 1 is the count
        if ($id['1'] < 0)
          $id['1'] = 0;
        return;
      }
    }
    //items not in basket
    if ($count <= 0)
      return;
    $this->content[] = [$item, $count];
  }
  public function print()
  {
    $total = 0;
    echo '<ul>basket contains :<br>';
    foreach ($this->content as $id => $item) {
      $total += $item[0]->price * $item[1];
      echo '<li>' . $item[0]->name . ' x' . $item[1] . ' price per: ' . $item[0]->price . '$ </li>';
    }
    echo '</ul>'
      . 'Total price: ' . $total;
  }
}