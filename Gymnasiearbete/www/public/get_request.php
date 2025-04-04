<head>
    <link rel="stylesheet" href="style.css">
</head>
<?php
header('Content-Type: application/json');

// Anslut till databasen
$conn = new mysqli('localhost', 'username', 'password', 'dog_sitting_db');
if ($conn->connect_error) {
    die(json_encode(["error" => "Database connection failed"]));
}

// Hämta data från frontend
$data = json_decode(file_get_contents('php://input'), true);
$user_id = $data['user_id'];
$description = $data['description'];

// Validera data
if (!$user_id || !$description) {
    echo json_encode(["error" => "Missing required fields"]);
    exit;
}

// Spara i databasen
$stmt = $conn->prepare("INSERT INTO requests (user_id, description) VALUES (?, ?)");
$stmt->bind_param("is", $user_id, $description);
if ($stmt->execute()) {
    echo json_encode(["success" => true, "request_id" => $stmt->insert_id]);
} else {
    echo json_encode(["error" => "Failed to create request"]);
}
$stmt->close();
$conn->close();
?>
Exempel: API för att lista förfrågningar
PHP-filen get_requests.php:










php
Kopiera kod
<?php
header('Content-Type: application/json'); 

// Anslut till databasen
$conn = new mysqli('localhost', 'username', 'password', 'dog_sitting_db');
if ($conn->connect_error) {
    die(json_encode(["error" => "Database connection failed"]));
}

// Hämta alla öppna förfrågningar
$result = $conn->query("SELECT requests.id, users.username, requests.description, requests.status, requests.created_at
                        FROM requests
                        JOIN users ON requests.user_id = users.id
                        WHERE requests.status = 'open'");

$requests = [];
while ($row = $result->fetch_assoc()) {
    $requests[] = $row;
}
echo json_encode($requests);

$conn->close();
?>