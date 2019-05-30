<?php

define('ROOT', dirname(__FILE__));
//database connection
$mysql = require ROOT.'/config/database.php';
try {
    $pdo = new PDO('mysql:host=localhost;dbname=keytraff', $mysql['user'], $mysql['password']);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $stmt2 = "SELECT offers.name, SUM(requests.count) AS quantity, SUM(requests.count * requests.price)  AS total_sum
            FROM requests
            JOIN offers ON requests.offer_id = offers.id
            GROUP BY requests.offer_id";
    $test = $pdo->prepare($stmt2);
    $test->execute();
    $test_data = array();
    while ($tmp_data = $test->fetchAll()) {
        $test_data[] = $tmp_data; 
    }
    echo json_encode($test_data);
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}
