<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Calculator</title>
</head>
<body>
  
  <form action="" method="post">
    <div>
      <input type="text" name="first_number">

      <select name="operation" id="operation">
        <option value="add">+</option>
        <option value="subtract">-</option>
        <option value="multiply">*</option>
        <option value="divide">/</option>
      </select>

      <input type="text" name="second_number">
    </div>
    <br>
    <input type="submit" value="Calculate">

  </form>

  <?php 
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        $first_number = $_POST["first_number"];
        $second_number = $_POST["second_number"];
        $operation = $_POST["operation"];
        
        switch ($operation) {
          case 'add':
            $result = $first_number + $second_number;
            break;
          case 'subtract':
            $result = $first_number - $second_number;
            break;            
          case 'multiply':
            $result = $first_number * $second_number;
            break;            
          case 'divide':
            $result = ($second_number != 0) ? $first_number / $second_number : "Can't divide by zero";
            break;            
          default:
            # code...
            break;
        }
        echo "<br>";
        echo $result;

      }

  ?>


</body>
</html>