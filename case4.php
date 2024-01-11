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

//overkill 
class school
{
  public array $array;
  public string $name;
  public function __construct(string $name)
  {
    $this->name = $name;
  }
  public function addGroup(group $group)
  {
    $this->array[] = $group;
  }
  public function removeGroup(string $name)
  {
    foreach ($this->array as $i => $value) {
      if ($name === $value->name) {
        unset($this->array[$i]);
        return "$name successfully removed";
      }
    }
    return "no group found by this name";
  }
  public function displayGroups(group $specific = null)
  {
    if ($specific === null) {
      foreach ($this->array as $group) {
        echo "<p>Group: <b>" . $group->name . "</b></p>";
        $group->displayStudents();

      }
    } else {
      echo "<p>Group: <b>" . $specific->name . "</b></p>";
      $specific->displayStudents();
    }
    echo '<br>';
  }
  public function MoveStudent(student $student, group $new = null, group $previous = null)
  {
    if ($previous && $new) {
      $new->addStudent($student);
      $previous->removeStudent($student->name);
      return "<p>moved $student->name from $previous->name to $new->name </p>";
    } else if ($new) {
      $new->addStudent($student);
      return "<p>added new student $student->name to $new->name</p>";
    } else if ($previous) {
      $previous->removeStudent($student->name);
      return "<p>$student->name removed from $previous->name, hopefully due to having graduated</p>";

    }

  }
}
