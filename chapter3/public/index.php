<?php
  // require_once __DIR__ . '/../src/Models/User.php';
  // require_once __DIR__ . '/../src/Models/Post.php';

  require_once __DIR__ . '/../src/Core/Autoloader.php';

use App\Core\Database;
use App\Models\User;
  use App\Models\Post;
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>KMC Buddies</title>
</head>
<body>

<?php


  $newUserId = User::create('test246', 'test246@demo.com', 'test245');
  echo "<br>";
  echo $newUserId;
  echo "<br>";

  $db = Database::getInstance();
  $pdo = $db->getConnection();

  $sql_query = "SELECT * FROM users";
  $stmt = $pdo->prepare($sql_query);
  $stmt->execute();

  $result = $stmt->fetchAll();
  // print_r($result);


  // $post1 = new Post("Hello world");
  // echo $post1->post;
  // echo "<br>";

  $user1 = new User("johndoe", "johndoe@demo.com", "hello123");
  $user1->displayUser();

  $user2 = new User("johndoe", "johndoe@demo.com", "hello123");
  $user2->displayUser();


?>

</body>
</html>