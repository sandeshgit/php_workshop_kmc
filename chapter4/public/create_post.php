<?php
if (session_status() == PHP_SESSION_NONE){
  session_start();
}

if (empty($_SESSION['user_id'])){
  header("Location: /chapter4/public/login.php");
  exit;
}

require_once __DIR__ . '/../src/Core/Autoloader.php';

use App\Models\User;
use App\Controllers\PostController;

$userId = $_SESSION['user_id'];
$user = User::findById($userId);
$username = $user['username'];

$postController = new PostController();
$result = $postController->create();


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
        <h2 class="section__title">Create a post!</h2>
        <div class="card">
          <div class="card__body">
            <form action="" method="post">
              <div class="form-group">
                <textarea name="content" id="" placeholder="Whats on your mind, <?= $username ?> ? "></textarea>
              </div>
              <input type="submit" value="Post" class="btn btn-primary">
            </form>
          </div>
        </div>
      </section>

  </main>
</body>
</html>