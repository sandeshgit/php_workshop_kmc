<?php

// Create a TodoItem class with properties (title, isCompleted, createdAt). Include methods: markComplete(), markIncomplete(), and getStatus(). Use a static counter for total items.
class ToDoItem
{
  private int $id;
  private string $title;
  private bool $isCompleted;
  private int $createdAt;

  private static int $nextId = 1;
  private static int $totalItems = 0;

  public function __construct(string $title)
  {
    $this->id = self::$nextId++;
    $this->title = $title;
    $this->isCompleted = false;
    $this->createdAt = time();
    self::$totalItems++;
  }
  
  public function markComplete(): void
  {
    $this->isCompleted = true;
  }

  public function markInComplete(): void
  {
    $this->isCompleted = false;
  }

  public function getStatus(): bool
  {
    return $this->isCompleted;
  }

  public function showToDoItem(): void
  {
    echo "<div>";
    echo "Id: $this->id <br>";
    echo "Task: $this->title <br>";
    echo "Status: " . ($this->isCompleted ? "Done" : "Not done") . "  <br>";
    echo "Created at: " . date('Y-m-d H:i:s', $this->createdAt) .  "<br>";
    echo "</div>";
    echo "<br>";
  }

  public static function getTotalItems(): int
  {
    return self::$totalItems;
  }

}


$task1 = new ToDoItem('Learn PHP');
$task1->markComplete();
$task1->showToDoItem();

$task2 = new ToDoItem('Learn Javascript');
$task2->showToDoItem();
