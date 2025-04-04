<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mina förfrågningar</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="container">
        <section class="section">
            <h1>Mina förfrågningar</h1>
            
            <div class="flex-center">
                <a href="write_request.php" class="btn btn-primary">Skapa en förfrågan</a>
                <a href="read_request.php" class="btn btn-outline">Visa alla förfrågningar</a>
            </div>

            <div class="request-list">
                <?php
                session_start();
                include_once('../model/dbFunctions.php');

                // Kontrollera om användaren är inloggad
                if (!isset($_SESSION['uid'])) {
                    header("Location: logIn.php");
                    exit();
                }

                // Hämta alla förfrågningar som skapats av den inloggade användaren
                $requests = getOwnRequests($_SESSION['username']);
                
                // Om inga förfrågningar hittades, visa ett meddelande
                if (empty($requests)) {
                    echo "<div class='card'><p>Inga förfrågningar hittades.</p></div>";
                } else {
                    // Visa alla förfrågningar
                    foreach ($requests as $request) {
                        echo "<div class='request-card'>";
                        echo "<h3 class='request-title'>" . htmlspecialchars($request['title']) . "</h3>";
                        echo "<div class='request-details'>";
                        echo "<p><strong>Beskrivning:</strong> " . htmlspecialchars($request['description']) . "</p>";
                        echo "<p><strong>Plats:</strong> " . htmlspecialchars($request['place']) . "</p>";
                        echo "<p><strong>Betalning:</strong> " . htmlspecialchars($request['payment']) . "</p>";
                        echo "<p><strong>Datum:</strong> " . htmlspecialchars($request['date']) . "</p>";
                        echo "</div>";
                        echo "<a href='own_requests.php?delete=" . $request['id'] . "' class='btn btn-accent' onclick='return confirm(\"Är du säker på att du vill ta bort denna förfrågan?\")'>Ta bort</a>";
                        echo "</div>";
                    }
                }

                // Hantera borttagning av förfrågningar
                if (isset($_GET['delete'])) {
                    $id = $_GET['delete'];
                    
                    // Säkerställ att ID är en giltig siffra för att undvika SQL-injektion
                    if (!is_numeric($id)) {
                        die("Ogiltigt ID");
                    }

                    if (removeRequests($id)) {
                        echo "<div class='card status-approved'>Förfrågan har tagits bort!</div>";
                        echo "<script>setTimeout(function() { window.location.href = 'own_requests.php'; }, 1500);</script>";
                    } else {
                        echo "<div class='card status-rejected'>Något gick fel vid borttagning!</div>";
                    }
                }
                ?>
            </div>
        </section>
    </div>
</body>
</html>