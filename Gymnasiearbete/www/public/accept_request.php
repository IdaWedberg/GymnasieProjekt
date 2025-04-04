<head>
    <link rel="stylesheet" href="style.css">
</head>
<?php
session_start();

// Hämta användarnamn och telefonnummer från URL-parametrar
$username = isset($_GET['username']) ? htmlspecialchars($_GET['username']) : 'Okänd användare';
$phone = isset($_GET['phone']) ? htmlspecialchars($_GET['phone']) : 'Okänt nummer';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accepterad Request</title>
</head>
<body>
    <h1>Tack för att du vill hjälpa mig!</h1>
    <p>Vänligen kontakta <b><?php echo $username; ?></b> 
    på numret <b><?php echo $phone; ?></b></p>
    
    <br>
    <a href="read_request.php">Tillbaka</a>
</body>
</html>