<?php

/**
 * Anluter till databasen och returnerar ett PDO-objekt
 * @return PDO  Objektet som returneras
 */
function connectToDb()
{
  // Definierar konstanter med användarinformation.
  define('DB_USER', 'root');
  define('DB_PASSWORD', '12345');
  define('DB_HOST', 'mariadb'); // mariadb om docker annars localhost
  define('DB_NAME', 'animalguard1');

  // Skapar en anslutning till MySql och databasen animalguard
  $dsn = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8';
  $db = new PDO($dsn, DB_USER, DB_PASSWORD);

  return $db;
}

function addUser($email, $username, $pwd, $firstname, $lastname, $phone)
{
  $db = connectToDb();
  /* Bygger upp sql frågan */
  $stmt = $db->prepare("INSERT INTO users(uid, username, firstname, password, email, lastname, phone) VALUES(UUID(), :user,:fn, :pwd, :mail, :ln, :ph)");

  $stmt->bindValue(":user", $username);
  $stmt->bindValue(":fn", $firstname);
  $stmt->bindValue(":mail", $email);
  $stmt->bindValue(":pwd", $pwd);
  $stmt->bindValue(":ln", $lastname);
  $stmt->bindValue(":ph", $phone);

  if ($stmt->execute())
    return true;
  else
    return false;
}

function auth($user, $pwd)
{
  $db = connectToDb();
  /* Bygger upp sql frågan */
  $stmt = $db->prepare("SELECT * FROM users WHERE username = :user");
  $stmt->bindValue(":user", $user);

  $stmt->execute();

  $result['success'] = false;

  /** Kontroll att resultat finns */
  if ($stmt->rowCount() == 1) {
    // Hämtar användaren, kan endast kunna vara 1 person
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    // Kontrollerar lösenordet, och allt ok.
    if (password_verify($pwd, $user['password'])) {
      $result['success'] = true;
      $result['uid'] = $user['uid'];
      $result['username'] = $user['username'];
      $result['email'] = $user['email'];
      $result['firstname'] = $user['firstname'];
      $result['lastname'] = $user['lastname'];
      $result['phone'] = $user['phone'];
    }
  }

  return $result;
}
function addrequest($title, $description, $place, $payment, $date)
{
  $db = connectToDb();
  $stmt = $db->prepare("INSERT INTO request(title, description, place, payment, date, uid, username, phone) VALUES(:ti, :des, :pl, :pay, :date, :uid, :user, :ph)");

  
  $stmt->bindValue(":user", $_SESSION['username']);
  $stmt->bindValue(":ti", $title);
  $stmt->bindValue(":des", $description);
  $stmt->bindValue(":pl", $place);
  $stmt->bindValue(":pay", $payment);
  $stmt->bindValue(":date", $date);
  $stmt->bindValue(":uid", $_SESSION['uid']);
  $stmt->bindValue(":ph", $_SESSION['phone']);

  if ($stmt->execute())
    return true;
  else
    return false;
}

function getAllRequests()
{
    try {
        $db = connectToDb();
        $stmt = $db->prepare("SELECT * FROM request");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC); // Se till att du returnerar en array
    } catch (PDOException $e) {
        error_log("Database error: " . $e->getMessage());
        return false; // Returnera false vid fel
    }
}
function getOwnRequests()
{
    try {
        $db = connectToDb();
        $stmt = $db->prepare("SELECT * FROM request WHERE username = :user");
        $stmt->bindValue(":user", $_SESSION['username']);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC); // Se till att du returnerar en array
    } catch (PDOException $e) {
        error_log("Database error: " . $e->getMessage());
        return false; // Returnera false vid fel
    }
}

function removeRequests($id)
{
    try {
        $db = connectToDb();
        $stmt = $db->prepare("DELETE FROM request WHERE id = :id");
        $stmt->bindValue(":id", $id);
        return $stmt->execute(); // Returnera true/false beroende på om det lyckades
    } catch (PDOException $e) {
        error_log("Database error: " . $e->getMessage());
        return false; // Returnera false vid fel
    }
}