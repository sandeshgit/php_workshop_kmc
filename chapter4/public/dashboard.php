<?php
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}

require_once __DIR__ . '/../src/Core/Autoloader.php';

use App\Models\Post;
use App\Models\User;

if (empty($_SESSION['user_id'])) {
  header("Location: /chapter4/public/login.php");
  exit;
}

$userId = $_SESSION['user_id'];
$user = User::findById((int) $userId);
$username = $user['username'];

$userPosts = Post::findByUserId($userId);
// print_r($userPosts);
$allPosts = Post::findAll();
// print_r($allPosts);

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/styles.css">
  <title>Dashboard</title>
</head>
<body>
  <header class="header">
    <div class="container header__container">
      <h1 class="header__title">KMC Buddies</h1>
      <nav class="nav">
        <a href="dashboard.php" class="nav__link">Dashboard</a>
        <a href="logout.php" class="nav__link">Logout</a>
      </nav>
    </div>
  </header>
  <main class="container">
      <section class="section">
        <div class="card">
          <div class="card__header">
            <div class="card__avatar">
              <?= strtoupper($username[0]) ?>
            </div>
            <div class="card__username">
              @<?= $username ?>
            </div>
          </div>
          <div class="card__body">
            <p> <b>Email:</b> <?= $user['email'] ?> </p>
            <p> <b>Bio:</b> <?= $user['bio']?: 'No Bio yet!' ?> </p>
            <p> <b>Member Since:</b> <?= $user['created_at'] ?> </p>
          </div>
        </div>
      </section>

      <section class="section">
        <h2 class="section__title">Create a post!</h2>
        <div class="card">
          <div class="card__body">
            <form action="create_post.php" method="post">
              <div class="form-group">
                <textarea name="content" id="" placeholder="Whats on your mind, <?= $username ?> ? "></textarea>
              </div>
              <input type="submit" value="Post" class="btn btn-primary">
            </form>
          </div>
        </div>
      </section>


      <section class="section">
        <h2 class="section__title">Your Posts</h2>
        <?php foreach ($userPosts as $post): ?>
          <div class="card post-card">
            <div class="card__header">
              <span class="card__avatar"> <?= strtoupper($post['username'][0]) ?> </span>
              <div>
                <h3 class="card__username">@<?= $post['username'] ?></h3>
                <span class="card__meta"><?= $post['created_at'] ?></span>
              </div>
            </div>
            <div class="card__body">
              <p class="post-content"><?= $post['content'] ?></p>
            </div>
          </div>
        <?php endforeach; ?>
      </section>


  </main>
</body>
</html>