<?php

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

  public function displayUser(): void{
    echo "<p>Username: $this->username</p>";
    echo "<p>Email: $this->email</p>";
    echo "<p>Password: $this->password</p>";
  }

}