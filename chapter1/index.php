<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <div>
    <?php
      
      
      // echo "Hello World";

      // int a = 5;
      // int b = 10;
      // c = a + b;
      // printf("%d", c);

      $a = 5;
      $b = 10;

      $c = $a + $b;

      echo "<br>";
      echo $c;

      $a = "Something";

      echo "<br>";
      echo $a;

      // String concatenation

      $firstName = "John";
      $lastName = "Doe";
      echo "<br>";

      echo "The person is " . $firstName . " " . $lastName;

      echo "<br>";

      echo "The person is $firstName $lastName";

      echo "<br>";

      echo 'The person is $firstName $lastName';

      # This is a comment


      /**
       * This is a 
       * multiline comment
      */


      // $name = 'John';
      // echo "<br>";
      // echo $name;



      // Some string functions

      $name = "John Doe";

      echo "<br>";
      echo strlen($name);
      echo "<br>";

      echo strtoupper($name);
      echo "<br>";
      echo strtolower($name);

      $str = "Kailali Multiple Campus";
      $new_string = str_replace("a", "b", $str);
      echo "<br>";
      echo $new_string;


    ?>
  </div>
</body>
</html>