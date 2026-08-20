<?php
if(session_status() == PHP_SESSION_NONE){
  session_start();
}
require_once __DIR__ . '/../src/Core/Autoloader.php';

use App\Controllers\AuthController;

$auth = new AuthController();
$userRegister = $auth->register();

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/styles.css">
  <title>Document</title>
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
          if (!empty($userRegister['errors'])) {
            echo "<div class='alert alert-error'>";
            foreach ($userRegister['errors'] as $error) {
              echo $error . "<br>";
            }
            echo "</div>";
          }

        ?>

        <h2 class="section__title">Register</h2>
        <form action="" method="post">
          <div class="form-group">
            <label for="username">Username</label>
            <input type="text" name="username">
          </div>
          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email">
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" id="">
          </div>
          <div class="form-group">
            <label for="confirm_password">Confirm Password</label>
            <input type="password" name="confirm_password" id="">
          </div>
          <div>
            <input type="submit" value="Register" class="btn btn-primary btn-full">
          </div>
        </form>
      </div>
    </section>
  </main>

</body>
</html>