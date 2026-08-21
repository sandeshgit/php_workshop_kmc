<?php

namespace App\Controllers;

use App\Models\Post;

class PostController{
  private array $errors = [];

  public function create() :array{
    if (empty($_SESSION['user_id'])){
      header("Location: /chater4/public/login.php");
      exit;
    }

    if ($_SERVER['REQUEST_METHOD'] == "POST"){
      $content = trim($_POST['content'])?:"";
      $userId = $_SESSION['user_id'];

      if (empty($content)){
        $this->errors[] = "Post content can not be empty";
      } elseif (strlen($content) > 1000) {
        $this->errors[] = "Post length can not be more than 1000 characters";
      }

      if (empty($this->errors)){
        $newPostId = Post::create($userId, $content);
        if ($newPostId){
          $_SESSION['flash_messages']['success'] = "Post created successfully";
          header("Location: /chapter4/public/dashboard.php");
          exit;
        } else {
          $this->errors[] = "Post could not be created";
        }
      }
    }
    return [
      'errors' => $this->errors
    ];
  }
}