<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <title>Valuta</title>
</head>
<body>
<h1>Frågor?</h1>
<?php
    $points = 0;
    if ($_POST['Hname'] == "Bygren") {
        $points++;
    }
    if ($_POST['Ename'] == "Klener") {
        $points++;
    }
    if ($_POST['Jname'] == "Svensson") {
        $points++;
    }
    if ($_POST['Vname'] == "Johansson") {
        $points++;
    }
    if ($_POST['Tname'] == "Björsing") {
        $points++;
    }

    if ($points < 1) {
        echo "$points Haha, du är ju helt värdelös!";
    } 
    if ($points > 1 && $points <= 3) {
        echo " $points Du är inte så bra på det här!";
    }
    if ($points > 3 && $points <= 4) {
        echo "$points Du är endå ganska bra!";
    }
    if ($points == 5) {
        echo "$points Du är grym!";
    }   
    
?>
</body>
</html>
