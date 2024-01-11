<?php

echo '<h1 style="color:red">case 1</h1>';
require_once('case1and2.php');
require_once('case3.php');
require_once('case4.php');


//case 1 
echo '<h1 style="color:red">case 2</h1>';
$banana = new item('banana', 1, 6, 0);
$apple = new item('apple', 1.5, 6, 0);
$wine = new item('wine', 10, 21, 0);

echo '<p>classes : ' . $banana->getPrice() * 6 + $apple->getPrice() * 3 + $wine->getPrice() * 2 . 'price total <br>';
echo $banana->getTaxPerItem() * 6 + $apple->getTaxPerItem() * 3 + $wine->getTaxPerItem() * 2 . 'tax <br></p>';


//case 2
$banana->setDiscount(0.5);
$apple->setDiscount(0.5);

echo '<p>discount : ' . $banana->getPrice() * 6 + $apple->getPrice() * 3 + $wine->getPrice() * 2 . 'price total <br>';
echo $banana->getTaxPerItem() * 6 + $apple->getTaxPerItem() * 3 + $wine->getTaxPerItem() * 2 . 'tax</p>';


//case 2.5 with a basket
echo '<h1 style="color:blue">case 2.5 with basket class</h1>';
$basket = new basket();
$basket->add($banana, 3);
$basket->add($banana, 3);
$basket->add($apple, 3);
$basket->add($wine, 2);
$basket->print();

//case 3
echo '<h1 style="color:red">case3</h1>';
$array[] = new content("testing", "some test content");
$array[] = new content("testing", "some important content", 'article', true);
$array[] = new content("raid shadow legends", "new booster pack 10% discount", "ad");
$array[] = new content("web dev", "sql only", 'vacancy');
foreach ($array as $i => $content) {
  echo '<h1>' . $content->getTitle() . '</h1>';
  echo '<p>' . $content->getContent() . '<p><br>';
}


//case 4
echo '<h1 style="color:red">case4</h1>';
echo '<p>group one :</p>';
$group1 = new group('angry from ex5 in orderFOrm');
$group1->addStudent(new student("basile", 25));
$group1->addStudent(new student("sais names dont matter", 50));
$group1->addStudent(new student("getter and setter", 100));
$alex = new student("alex", 111.11);
$group1->addStudent($alex);
$group1->displayStudents();
echo '<p><b>average group score</b>: ' . $group1->getGroupAverage() . '</p> <br>';

echo '<p>group two :</p>';
$group2 = new group('table One');
$group2->addStudent(new student("alec", 100));
$group2->addStudent(new student("pieter", 200));
$group2->addStudent(new student("mohammed", 300));
$group2->displayStudents();
echo '<p><b>average group score</b>: ' . $group2->getGroupAverage() . '</p> <br>';

echo '<h2>updating groups: </h2>';
$group1->removeStudent("sais names dont matter");
$group1->addStudent(new student("names matter", 999));
$group1->removeStudent($alex->name);
$group2->addStudent($alex);
echo '<p>group one : removed alex and sais...,added names</p>';
$group1->displayStudents();
echo '<p><b>average group score</b>: ' . $group1->getGroupAverage() . '</p> <br>';
echo '<p>group two :added alex</p>';
$group2->displayStudents();
echo '<p><b>average group score</b>: ' . $group2->getGroupAverage() . '</p> <br>';



//case overkill school class
echo '<h1 style="color:blue">case4.5</h1>';
echo '<h2 style="color:blue"> updating groups via "school class": </h2>';
$becode = new school('BeCode');
$group3 = new group('table one');
$becode->addGroup($group3);
$basile = new student("basile", 25);
$group3->addStudent($basile);
$group3->addStudent(new student("kelsey", 50));
$group3->addStudent(new student("lucas  ", 100));
$alex = new student("alex", 111.11);
$group3->addStudent($alex);
// $group3->displayStudents();

$group4 = new group('table two');
$becode->addGroup($group4);
$group4->addStudent(new student("alec", 100));
$group4->addStudent(new student("pieter", 200));
$group4->addStudent(new student("mohammed", 300));
// $group4->displayStudents();

$becode->displayGroups();
echo $becode->MoveStudent($alex, $group4, $group3);
echo $becode->MoveStudent($basile, null, $group3);
$becode->displayGroups();
