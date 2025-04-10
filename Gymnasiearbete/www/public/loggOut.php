<head>
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<?php
session_start();

$_SESSION = array();
session_destroy();

header("Location: logIn.php");
?>