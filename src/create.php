<?php

include 'bootstrap.php';

// Prepare the query
$client = $_GET["client"];
$service = $_GET["service"];
$date = date("Y-m-d H:i:s");

$selectQuery = $database->prepare("INSERT INTO Clients (`client`, `service`, `date`) values (:client, :service, :date);");
$selectQuery->bindParam("client", $client);
$selectQuery->bindParam("service", $service);
$selectQuery->bindParam("date", $date);

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

header("HTTP/1.1 201 Created");
// Print the results
echo print_r(json_encode($results, JSON_PRETTY_PRINT), true);
