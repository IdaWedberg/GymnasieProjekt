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