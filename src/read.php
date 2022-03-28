<?php

include 'bootstrap.php';

// Prepare the query
$selectQuery = $database->prepare("SELECT * FROM Clients;");

// Run the query
$selectQuery->execute();

// Get the results
$results = $selectQuery->fetchAll(PDO::FETCH_ASSOC);

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

// Print the results
echo print_r(json_encode($results, JSON_PRETTY_PRINT), true);
