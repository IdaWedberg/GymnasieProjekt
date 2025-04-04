<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Sessioner</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <section>
  <a href="logIn.php">Har du redan ett konto?</a>
    <h1>Registrera</h1>
    <form method="post" action="logIn.php">
      <label for="name">Namn</label>
      <br>
      <input type="text" name="firstname" id="firstname">
      <br>
      <label for="lastname">Efternamn</label>
      <br>
      <input type="text" name="lastname" id="name">
      <br>
      <label for="username">Användarnamn</label>
      <br>
      <input type="text" name="username" id="username">
      <br>
      <label for="email">Email</label>
      <br>
      <input type="text" name="email" id="email">
      <br>
      <label for="phone">Telefonnummer</label>
      <br>
      <input type="text" name="phone" id="phone">
      <br>
      <label for="password">Lösenord</label>
      <br>
      <input type="password" name="pwd" id="pwd">
      <br>

      <input type="submit" value="Registrera">
      
    </form>
  </section>


</body>

</html>