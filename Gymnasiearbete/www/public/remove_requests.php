<head>
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<?php
session_start();
include_once('../model/dbFunctions.php');


// Kontrollera om användaren är inloggad
if (!isset($_SESSION['uid'])) {
    header("Location: logIn.php");
    exit();
}

// Funktion för att ta bort request
removeRequests($id);

?>