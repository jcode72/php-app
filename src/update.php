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
print_r($selectQuery->errorInfo());
print_r($database->errorInfo());

// Get the results
$results = $selectQuery->fetchAll(PDO::FETCH_ASSOC);

// Print the results
echo print_r($results, true);
