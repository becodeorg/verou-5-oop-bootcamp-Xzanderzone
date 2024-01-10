<?php
class student
{
  public string $name;
  public float $grade;
  public function __construct(string $name, float $grade)
  {
    $this->name = $name;
    $this->grade = $grade;
  }
}
class group
{
  public array $array;
  public string $name;
  public function __construct(string $name)
  {
    $this->name = $name;
  }
  public function addStudent(student $student)
  {
    $this->array[] = $student;
  }
  public function removeStudent(string $name)
  {
    foreach ($this->array as $i => $value) {
      if ($name === $value->name) {
        unset($this->array[$i]);
        return "$name successfully removed";
      }
    }
    return "no student found by this name";
  }
  public function getGroupAverage()
  {
    $total = 0;
    $count = 0;
    foreach ($this->array as $i) {
      $total += $i->grade;
      $count++;
    }
    ;
    return round($total / $count, 2);
  }
  public function displayStudents(student $specific = null)
  {
    if ($specific === null) {
      foreach ($this->array as $i) {
        echo '<p><b>' . $i->name . '</b> : ' . $i->grade . '</p>';
      }
    } else {
      echo '<p>' . $specific->name . ' : ' . $specific->grade . '</p>';
    }
  }
}
