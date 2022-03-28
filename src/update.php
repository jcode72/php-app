<?php

include 'bootstrap.php';

// Prepare the query
$details = $_GET["details"];
$id = $_GET["id"];

$selectQuery = $database->prepare("UPDATE Clients SET `service`= :details WHERE `id` = :id;");
$selectQuery->bindParam("details", $details);
$selectQuery->bindParam("id", $id);

// Run the query
$selectQuery->execute();

if($selectQuery->errorInfo()[0] !== "00000") {
  echo print_r(json_encode($selectQuery->errorInfo(), JSON_PRETTY_PRINT), true);
  header("HTTP/1.1 500 Internal Server Error");
  return;
}
if($database->errorInfo()[0] !== "00000") {
  echo print_r(json_encode($database->errorInfo(), JSON_PRETTY_PRINT), true);
  header("HTTP/1.1 500 Internal Server Error");
  return;
}

// Get the results
$results = $selectQuery->fetchAll(PDO::FETCH_ASSOC);

// Print the results
echo print_r(json_encode($results, JSON_PRETTY_PRINT), true);
