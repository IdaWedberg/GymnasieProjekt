<?php
session_start();
include_once '../model/dbFunctions.php';

//Signup
if (isset($_POST['email'], $_POST['username'], $_POST['pwd'], $_POST['firstname'], $_POST['lastname'], $_POST['phone'])) {
  $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_SPECIAL_CHARS);
  $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_SPECIAL_CHARS);
  $pwd = password_hash($_POST['pwd'], PASSWORD_DEFAULT);
  $firstname = filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_SPECIAL_CHARS);
  $lastname = filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_SPECIAL_CHARS);
  $phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_SPECIAL_CHARS);

  $result = addUser($email, $username, $pwd, $firstname, $lastname, $phone);
}
//login
if (isset($_POST['pwd'], $_POST['username'])) {
  
  $user = filter_input(INPUT_POST, 'username', FILTER_UNSAFE_RAW);
  $pwd = $_POST['pwd'];
  $user = auth($user, $pwd);

  if ($user['success']) {
    $_SESSION['uid'] = $user['uid'];
    $_SESSION['username'] = $user['username'];
    $_SESSION['email'] = $user['email'];
    $_SESSION['firstname'] = $user['firstname'];
    $_SESSION['lastname'] = $user['lastname'];
    $_SESSION['phone'] = $user['phone'];
    $_SESSION['pwd'] = $user['pwd'];
    header("Location: write_request.php");
    exit();
  } else {
    echo "Fel användarnamn eller lösenord";
  }


}
  
?>
<head>
    <link rel="stylesheet" href="style.css">
</head>
<section>
  <form method="post" action="logIn.php">
    <label for="username">Användarnamn</label>
    <br>
    <input type="text" name="username" id="username">
    <br>
    <label for="password">Lösenord</label>
    <br>
    <input type="password" name="pwd" id="pwd">
    <br>
    <input type="submit" value="Logga in">
  </form>
  <a href="index.php">Registrera dig</a>
</section>

