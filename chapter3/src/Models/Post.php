<?php

namespace App\Models;

class Post{
  public string $post;

  public function __construct(string $post)
  {
    $this->post = $post;
  }
}