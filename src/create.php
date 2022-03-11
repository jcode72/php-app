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

print_r($selectQuery->errorInfo());
print_r($database->errorInfo());

// Get the results
$results = $selectQuery->fetchAll(PDO::FETCH_ASSOC);

// Print the results
echo print_r($results, true);
