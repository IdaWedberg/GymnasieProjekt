<?php
// PUNKT 1
session_start();

if (isset($_POST['title'], $_POST['description'], $_POST['place'], $_POST['payment'], $_POST['date'])) {
    include_once('../model/dbFunctions.php');
    $request = addrequest($_POST['title'], $_POST['description'], $_POST['place'], $_POST['payment'], $_POST['date']);

    if ($user = true) {
        echo "Förfrågan skapad";
    } else {
        echo "Förfrågan kunde inte skapas";
    }
}

?>
<!DOCTYPE html>
<html lang="sv">

<head>
    <meta charset="utf-8" />
    <title>LogIn</title>
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <section>
        <form method="post" action="write_request.php">Skapa din förfrågan
            <br>
            <br>
            <lable for="title">Titel</lable>
            <br>
            <input type="text" name="title" id="ti">
            <br>
            <lable for="description">Beskrivning</lable>
            <br>
            <input type="text" name="description" id="des">
            <br>
            <lable for="place">Plats</lable>
            <br>
            <input type="text" name="place" id="pl">
            <br>
            <lable for="payment">Betalning</lable>
            <br>
            <input type="text" name="payment" id="pay">
            <br>
            <lable for="date">Datum</lable>
            <br>
            <input type="date" name="date" id="date">
            <br>
            <input type="submit" value="Skapa förfrågan">
            <br>
            <a href="read_request.php">Visa förfrågningar</a>
    <a href="own_requests.php">Mina förfrågningar</a>
    <a href="loggOut.php">Logga ut</a>
    
        </form>
    </section>
</body>

</html>