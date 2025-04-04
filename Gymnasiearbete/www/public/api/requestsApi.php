<?php
session_start();

include '../../model/dbFunctions.php'; // Inkludera filen som innehåller getAllRequests()

$request = getAllRequests();

if ($request !== false) {
    echo json_encode($request);
} else {
  echo "Fel vid hämtning av förfrågningar.";
}





?>