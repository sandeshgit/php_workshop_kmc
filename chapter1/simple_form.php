<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Form</title>
</head>
<body>
  <form action="process.php" method="POST">

    <div>
      <label for="username">Username</label>
      <input type="text" name="username">
    </div>
    <br>
    <div>
      <label for="email">Email</label>
      <input type="email" name="email" id="email">
    </div>
    <br>
    <div>
      <label for="password">Password</label>
      <input type="password" name="password" id="password">
    </div>
    <br>
    <input type="submit" value="Submit">

  </form>
</body>
</html>