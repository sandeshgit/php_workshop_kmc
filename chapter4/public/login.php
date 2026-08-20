<?php
if(session_status() == PHP_SESSION_NONE){
  session_start();
  if (!empty($_SESSION['flash_messages'])){
    $messages = $_SESSION['flash_messages']['success'];
  }
}

require_once __DIR__ . '/../src/Core/Autoloader.php';

use App\Controllers\AuthController;

$auth = new AuthController();
$authLogin = $auth->login();

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/styles.css">
  <title>Login Page</title>
</head>
<body>
  <header class="header">
    <div class="container header__container">
      <h1 class="header__title">KMC Buddies</h1>
      <nav class="nav">
        <a href="login.php" class="nav__link">Login</a>
        <a href="register.php" class="nav__link">Register</a>
      </nav>
    </div>
  </header>

  <main class="container">
    <section class="section">
      <div class="auth-card">

      <?php
      if (!empty($authLogin['errors'])){
        echo "<div class='alert alert-error'>";
        foreach ($authLogin['errors'] as $error) {
          echo $error . "<br>";
        }
        echo "</div>";
      }
      ?>

      <?php if (!empty($messages)): ?>
        <div class="alert alert-success">
        <?php 
          echo $messages . "<br>";
          unset($_SESSION['flash_messages']);
        ?>
        </div>
      <?php endif; ?>

        <h2 class="section__title">Log In</h2>
        <form action="" method="post">
          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="">
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" id="">
          </div>
          <input type="submit" value="Login" class="btn btn-primary btn-full">
        </form>
      </div>
    </section>
  </main>

</body>
</html>