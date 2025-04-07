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
    <div class="crazy">
    <h4>Vänligen kontakta <?php echo $username; ?> på numret: <a href="tel:<?php echo str_replace(['-', ' '], '', $phone); ?>"><?php echo $phone; ?></a></h4>
</div>
    <br>
    <div class="flex-center">
                <a href="read_request.php" class="btn btn-primary">Tillbaka</a>
            </div>    
</body>
</html>