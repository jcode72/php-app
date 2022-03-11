<?php

include 'bootstrap.php';

// Prepare the query
$selectQuery = $database->prepare("SELECT * FROM Clients;");

// Run the query
$selectQuery->execute();

// Get the results
$results = $selectQuery->fetchAll(PDO::FETCH_ASSOC);
print_r($selectQuery->errorInfo());
print_r($database->errorInfo());

// Print the results
echo print_r($results, true);
