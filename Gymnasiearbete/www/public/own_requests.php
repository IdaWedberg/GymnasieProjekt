<head>
    <link rel="stylesheet" href="style.css">
</head>
<?php
session_start();
include_once('../model/dbFunctions.php');




// Kontrollera om användaren är inloggad
if (!isset($_SESSION['uid'])) {
    header("Location: logIn.php");
    exit();
}

echo "<a href='write_request.php'>Skapa en förfråga</a>";
echo "<br>";
echo "<a href='read_request.php'>Visa förfrågningar</a>";
// Hämta alla förfrågningar som skapats av den inloggade användaren
$requests = getOwnRequests($_SESSION['username']);
// Om inga förfrågningar hittades, visa ett meddelande

if (empty($requests)) {
    echo "<p>Inga förfrågningar hittades.</p>";
} else {
    // Visa alla förfrågningar
    
    foreach ($requests as $request) {
        
        echo "<div class='own_request'>";
        echo "<div id='own-requests'>";
        echo "<h2>" . htmlspecialchars($request['title']) . "</h2>";
        echo "<p><strong>Beskrivning:</strong> " . htmlspecialchars($request['description']) . "</p>";
        echo "<p><strong>Plats:</strong> " . htmlspecialchars($request['place']) . "</p>";
        echo "<p><strong>Betalning:</strong> " . htmlspecialchars($request['payment']) . "</p>";
        echo "<p><strong>Datum:</strong> " . htmlspecialchars($request['date']) . "</p>";
        echo "<a href='own_requests.php?delete=" . $request['id'] . "' onclick='return confirm(\"Är du säker på att du vill ta bort denna förfrågan?\")'>Ta bort</a>";
        echo "<hr>";
        echo "</div>";
        
    }
}
//länk för att ta bort request

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    
    // Säkerställ att ID är en giltig siffra för att undvika SQL-injektion
    if (!is_numeric($id)) {
        die("Ogiltigt ID");
    }

    if (removeRequests($id)) {
        echo "Förfrågan har tagits bort!";
        header("Location: own_requests.php"); // Omdirigera tillbaka efter borttagning
        exit();
    } else {
        echo "Något gick fel vid borttagning!";
    }
}
if (isset($_GET['delete'])) {
    var_dump($_GET['delete']); // Se om ID:t skickas korrekt
    exit();
}
?>