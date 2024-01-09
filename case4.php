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
  public function removeStudent(student $student)
  {
    // unset($this->array[$student]);
  }
}

$group1 = new group(new student("basile", 0));
$group2 = new group(new student("names matter", 100));

echo $group1->array[0]->name . '<br>';
echo $group2->array[0]->name . '<br>';