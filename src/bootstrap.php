<?php

// Connect to the database
//

ob_start();
include 'config.php';

try {
    $database = new PDO("mysql:host=$host;port=$port;dbname=$dbName;", $user, $pass, array(PDO::ATTR_TIMEOUT => '1'));
} catch (\Exception $e) {
    echo $e->getMessage() . PHP_EOL . PHP_EOL;
    throw $e;
}
