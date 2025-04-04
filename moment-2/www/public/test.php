<?php
include './inc/functions.php';


$summa = sum(2, 5); // Här anropas funktionen sum
$prod = multiply(2, 5);
$div = divide(2, 5);
$sub = subtract(2, 5);
    
    header('Content-Type: text/html; charset=utf-8');
    echo "Summan av 2 och 5 är $summa<br>";
    echo "Produkten av 2 och 5 är $prod<br>";
    echo "Kvoten av 2 och 5 är $div<br>";
    echo "Differensen av 2 och 5 är $sub<br>";

    mb_internal_encoding("UTF-8");

    if(isset($_POST['name'])){
        $name = $_POST['name'];

        if(!mb_check_encoding($name)){
            header('Location: index.php');
        }

        $name = htmlspecialchars($name);

        $name = trim($name);
        $name = stripslashes($name);

        header(('Content-Type: text/html; charset=utf-8'));
        echo "<br>". $name . "<br>";
    }

    if(isset($_POST['lastname'])){
        $lastname = $_POST['lastname'];

        if(!mb_check_encoding($lastname)){
            header('Location: index.php');
        }

        $lastname = htmlspecialchars($lastname);

        $lastname = trim($lastname);
        $lastname = stripslashes($lastname);

        header(('Content-Type: text/html; charset=utf-8'));
        echo $lastname . "<br>";
    }
    
    if(isset($_POST['username'])){
        $username = $_POST['username'];

        if(!mb_check_encoding($username)){
            header('Location: index.php');
        }

        $username = htmlspecialchars($username);

        $username = trim($username);
        $username = stripslashes($username);

        header(('Content-Type: text/html; charset=utf-8'));
        echo $username . "<br>";
    }

    if(isset($_POST['password'])){
        $password = $_POST['password'];

        if(!mb_check_encoding($password)){
            header('Location: index.php');
        }

        $password = htmlspecialchars($password);

        $password = trim($password);
        $password = stripslashes($password);

        header(('Content-Type: text/html; charset=utf-8'));
        echo $password . "<br>";
    }
?>