<?php

namespace App\Models;

use App\Core\Database;
use PDO;

class Post{
  private int $userId;
  private string $content;

  public function __construct(int $userId, string $content)
  {
    $this->userId = $userId;
    $this->content = $content;
  }


  public static function create(int $userId, string $content): int|false {
    $pdo = Database::getInstance()->getConnection();
    $stmt = $pdo->prepare("INSERT INTO posts (user_id, content) VALUES (:user_id, :content)");
    $result = $stmt->execute([
      'user_id' => $userId,
      'content' => $content
    ]);
    return $result ? (int) $pdo->lastInsertId() : false;
  }

  public static function findByUserId(int $userId): ?array{
    $pdo = Database::getInstance()->getConnection();
    $stmt = $pdo->prepare(
      "SELECT posts.*, users.username 
      FROM posts
      JOIN users ON users.id = posts.user_id 
      WHERE user_id = :user_id
      ORDER BY created_at DESC"
    );
    $stmt->execute(['user_id' => $userId]);
    $result = $stmt->fetchAll();
    return $result ?: null;
  }

  public static function findAll(): ?array{
    $pdo = Database::getInstance()->getConnection();
    $stmt = $pdo->prepare(
      "SELECT posts.*, users.username 
      FROM posts
      JOIN users ON users.id = posts.user_id 
      ORDER BY created_at DESC"
    );
    $stmt->execute();
    $result = $stmt->fetchAll();
    return $result ?: null;
  }


}