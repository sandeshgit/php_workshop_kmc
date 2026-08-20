<?php

namespace App\Controllers;

use App\Models\User;

class AuthController{
  private array $errors = [];
  private string $username = '';
  private string $email = '';

  public function register(): array{
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
      $this->username = trim($_POST['username'])?:"";
      $this->email = trim($_POST["email"]) ?: "";
      $password = $_POST["password"];
      $confirmPassword = $_POST["confirm_password"];

      if (empty($this->username)){
        $this->errors[] = "Username should not be empty";
      } elseif ((strlen($this->username) < 3) || (strlen($this->username) > 30)){
        $this->errors[] = "Username should contain 3-30 characters";
      } elseif (!preg_match('/^[a-zA-Z0-9_]+$/', $this->username)){
        $this->errors[] = "Username should only have alphabets, numbers and underscores";
      } elseif (User::findByUsername($this->username)){
        $this->errors[] = "Username is already taken";
      }

      if (empty($this->email)){
        $this->errors[] = "Email should not be empty";
      } elseif (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
        $this->errors[] = "Email is not valid";
      } elseif (User::findByEmail($this->email)){
        $this->errors[] = "Email is already registered";
      }

      if (strlen($password) < 6){
        $this->errors[] = "Password should contain at least 6 characters";
      }

      if ($password !== $confirmPassword){
        $this->errors[] = "Passwords do not match";
      }

      if (empty($this->errors)){
        $user = User::create($this->username, $this->email, $password);
        if ($user){
          $_SESSION['flash_messages']['success'] = "Registration Successful. Please log in.";
          header("Location: /chapter4/public/login.php");
        }
      }
    }

    return [
      "errors" => $this->errors,
      "username" => $this->username,
      "email" => $this->email
    ];
  }

  public function login(): array {
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
      $this->email = trim($_POST['email']) ?: "";
      $password = trim($_POST['password']);

      if ((empty($this->email)) || (empty($password))) {
        $this->errors[] = "Email and password can't be empty";
      } else {
        $user = User::authenticate($this->email, $password);
        if ($user){
          session_regenerate_id(true);
          $_SESSION['user_id'] = $user['id'];
          header("Location: /chapter4/public/dashboard.php");
          exit;
        } else{
          $this->errors[] = "Invalid email or password";
        }
      }
    }
    return [
      'errors' => $this->errors,
      'email' => $this->email
    ];
  }

  public function logout(): void {
    $_SESSION = [];
    header("Location: /chapter4/public/login.php");
    exit;
  }


}