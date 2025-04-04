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
  <h1>Registrera</h1>
  <a href="logIn.php">Har du redan ett konto?</a>
    <form method="post" action="logIn.php">
      <label for="name">Namn</label>
      <input type="text" name="firstname" id="firstname">
      <label for="lastname">Efternamn</label>
      <input type="text" name="lastname" id="name">
      <label for="username">Användarnamn</label>
      <input type="text" name="username" id="username">
      <label for="email">Email</label>
      <input type="text" name="email" id="email">
      <label for="phone">Telefonnummer</label>
      <input type="text" name="phone" id="phone">
      <label for="password">Lösenord</label>
      <input type="password" name="pwd" id="pwd">
      <input type="submit" value="Registrera">
      
    </form>
  </section>


</body>

</html>