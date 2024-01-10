<?php

echo '<h1 style="color:red">case 1</h1>';
require_once('case1and2.php');
require_once('case3.php');
require_once('case4.php');


echo '<h1 style="color:red">case 2</h1>';
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



echo '<h1 style="color:red">case3</h1>';
$array[] = new content("testing", "some test content");
$array[] = new content("testing", "some important content", 'article', true);
$array[] = new content("raid shadow legends", "new booster pack 10% discount", "ad");
$array[] = new content("web dev", "sql only", 'vacancy');
foreach ($array as $i => $content) {
  echo '<h1>' . $content->getTitle() . '</h1>';
  echo '<p>' . $content->getContent() . '<p><br>';
}


echo '<h1 style="color:red">case4</h1>';
$group1 = new group(new student("basile", 0));
$group1->addStudent(new student("sais names dont matter", 100));
$group1->addStudent(new student("getter and setter", 100));
$group1->displayStudents();
echo 'average group score: ' . $group1->getGroupAverage();
$group2 = new group(new student("Alex", 100));
$group2->addStudent(new student("pieter", 200));
$group2->addStudent(new student("mohammed", 300));
$group2->displayStudents();
echo 'average group score: ' . $group2->getGroupAverage() . '<br>';

$group1->removeStudent("sais names dont matter");
$group1->addStudent(new student("names matter", 100));
$group1->displayStudents();
echo 'average group score: ' . $group1->getGroupAverage();