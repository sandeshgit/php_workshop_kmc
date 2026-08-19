<?php

namespace App\Models;

use App\Core\Database;

class User{
  private int $id;
  private string $username;
  private string $email;
  private string $password;
  private string $createdAt;
  private string $bio;

  private static int $nextId = 1;
  private static int $totalUsers = 0;

  public function __construct(string $username, string $email, string $password){
    $this->id = self::$nextId++;
    $this->setUserName($username);
    $this->setEmail($email);
    $this->setPassword($password);
    $this->createdAt = date('Y-m-d H:i:s');
    self::$totalUsers++;
  }

  public function setUserName(string $username): bool{
    if ((strlen($username) < 3) || (strlen($username) > 50)) {
      echo "The username should be between 3 to 50 characters";
      return false;
    }
    if (!preg_match('/^[a-zA-Z0-9_]+$/', $username)) {
      echo "The username should contain only alphabets, numbers and underscores";
      return false;
    }
    $this->username = $username;
    return true;
  }

  public function setEmail(string $email): bool{
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      echo "The email address is not valid";
      return false;
    }
    $this->email = $email;
    return true;
  }

  public function setPassword(string $password): bool{
    if (strlen($password) < 6) {
      echo "Password should contain at least 6 characters";
      return false;
    }
    $this->password = password_hash($password, PASSWORD_DEFAULT);
    return true;
  }

  public static function findByEmail(string $email): ?array{
    $pdo = Database::getInstance()->getConnection();
    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = :email");
    $stmt->execute(['email' => trim(strtolower($email))]);
    $result = $stmt->fetch();
    return $result ?: null;
  }

  public static function findByUsername(string $username): ?array{
    $pdo = Database::getInstance()->getConnection();
    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username");
    $stmt->execute(['username' => trim(strtolower($username))]);
    $result = $stmt->fetch();
    return $result ?: null;
  }

  public static function create(string $username, string $email, string $password): int|false{
    $pdo = Database::getInstance()->getConnection();
    $stmt = $pdo->prepare("INSERT INTO users (username, email, password) VALUES (:username, :email, :password)");
    $result = $stmt->execute([
      'username' => trim(strtolower($username)),
      'email' => trim(strtolower($email)),
      'password' => password_hash($password, PASSWORD_DEFAULT)
    ]);
    
    return $result ? (int) $pdo->lastInsertId() : false;

  }

  public function displayUser(): void{
    echo "<p>Username: $this->username</p>";
    echo "<p>Email: $this->email</p>";
    echo "<p>Password: $this->password</p>";
  }

}