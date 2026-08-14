<?php
class Book{

  const PI = 3.14;

  public string $title;
  public string $author;
  public int $price;
  public static int $bookCounter = 0;

  public function __construct(string $t, string $a, int $p){
    $this->title = $t;
    $this->author = $a;
    $this->price = $p;
    self::$bookCounter++;
  }

  public function displayBook() :void {
    echo "<br>";
    echo __CLASS__;
    echo "<br>";
    echo __METHOD__;
    echo "<br>";
    echo __FUNCTION__;
    echo "<br>";
    echo self::PI;
    echo "<br>";
    echo $this->title;
    echo "<br>";
    echo $this->author;
    echo "<br>";
    echo $this->price;
  }

  public static function getCounter(): int {
    return self::$bookCounter;
  }

}

$book1 = new Book("War and Peace", "Leo Tolstoy", 500);
$book1->displayBook();
// echo "<br>";
// $book1 = new Book("PHP Basics", "Rasmus", 1000);
// $book1->displayBook();
// echo "<br><br>";
// echo "The total number of books so far: " . Book::getCounter();

