<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
</head>
<body>
   <h1>Test</h1>
   <form action="test.php" method="post">
      <label> Name <br>
         <input type="text" name="name">
      </label>
      <br>
      <label> Lastname <br>
         <input type="text" name="lastname">
      </label>
      <br>
      <label> Username <br>
         <input type="text" name="username">
      </label>
      <br>
      <label> Password <br>
         <input type="password" name="password">
      </label>
      <br>
      <input type="submit" value="skicka"></button>
</form>
   <?php 
      for ($i = 0.0; $i < 0.6; $i= $i+0.1){
         echo $i . "<br>";
      }
      $i = 0.0;
      while ($i < 0.6){
         echo $i . "<br>";
         $i = $i + 0.1;
         
      }

      $page["head"] = "<h1>Välkommen</h1>";
      $page["main"] = "<p>Detta är innehållet på min sida</p>";
      $page["footer"] = "<hr><p>Min sidfoot</p>";

      foreach ($page as $x){
         echo $x;
      }
   ?>

</body>
</html>