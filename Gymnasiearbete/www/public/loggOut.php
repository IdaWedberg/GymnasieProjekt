<head>
    <link rel="stylesheet" href="style.css">
</head>
<?php
session_start();

$_SESSION = array();
session_destroy();

header("Location: logIn.php");
?>