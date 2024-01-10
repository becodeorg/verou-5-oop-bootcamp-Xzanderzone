<!-- There's two groups, both of 10 students. 
Every student has a name and gets a grade.
Provide an easy way to calculate the average score of a group.
Add a function to move a student from one group to another.
Show the average score of both groups. Move the top student from one group with the lowest scoring student from another. Show the averages again - how were these affected? -->

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
  public function __construct(student $st)
  {
    $this->array[] = $st;
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
    return $total / $count;
  }
  public function displayStudents(student $specific = null)
  {
    if ($specific === null) {
      foreach ($this->array as $i) {
        echo $i->name . ' : ' . $i->grade . '<br>';
      }
      echo '<br>';
    } else {
      echo $specific->name . ' : ' . $specific->grade . '<br>';
    }
  }
}
