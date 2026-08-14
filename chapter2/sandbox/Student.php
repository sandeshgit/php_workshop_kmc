<?php

class Student{
  private int $id;
  private string $name;
  private string $email;
  public array $marks = [];
  private string $enrolledAt;
  private static int $nextId = 1;
  private static int $totalStudents = 0;

  public function __construct(string $name, string $email) {
    $this->id = self::$nextId++;
    $this->setName($name);
    $this->setEmail($email);
    $this->enrolledAt = date('Y-m-d');
    self::$totalStudents++;
  }

  public function getName(): string{
    return $this->name;
  }

  public function getEmail(): string{
    return $this->email;
  }

  public function setName(string $name): bool{
    if ((strlen($name) < 3) || (strlen($name) > 30)) {
      echo "The name should be between 3-30 characters";
      return false;
    }
    $this->name = $name;
    return true;
  }

  public function setEmail(string $e): bool{
    if (!filter_var($e, FILTER_VALIDATE_EMAIL)) {
      echo "The email address is not valid";
      return false;
    }
    $this->email = $e;
    return true;
  } 


  public function addMarks(string $subject, int $score): bool{
    if (($score < 0) || ($score > 100)) {
      echo "The score should be between 0 to 100";
      return false;
    }
    $this->marks[$subject] = $score;
    return true;
  }

  public function getAverage(): float{
    if (empty($this->marks)) {
      return 0;
    }
    $average = array_sum($this->marks) / count ($this->marks);
    return $average;
  }

  public function getGrade(): string {
    $average = $this->getAverage();
    if ($average >= 90) return "A+";
    if ($average >= 80) return "A";
    if ($average >= 70) return "B+";
    if ($average >= 60) return "B";
    if ($average >= 50) return "C";
    return "F";
  }

  public function displayReport() : void{
    echo "<h3>Report Card of $this->name </h3>";
    echo "<p>Student ID: $this->id </p>";
    echo "<p>Email: $this->email </p>";
    echo "<h4>Marks</h4>";
    foreach ($this->marks as $subject => $score) {
      echo "$subject:  $score <br>";
    }
    echo "Average: " . $this->getAverage() . "<br>";
    echo "Grade: " . $this->getGrade() . "<br>";
  }
}

$student1 = new Student("John", "john@demo.com");

$student1->addMarks("English", 80);
$student1->addMarks("Social", 87);
$student1->addMarks("Maths", 90);
$student1->addMarks("Science", 88);

// print_r($student1);
$student1->displayReport();

$student2 = new Student("Ram", "ram@demo.com");
$student2->addMarks("English", 88);
$student2->addMarks("Social", 87);
$student2->addMarks("Maths", 80);
$student2->addMarks("Science", 78);
$student2->displayReport();
