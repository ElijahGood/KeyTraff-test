<?php

define('ROOT', dirname(__FILE__));
//database connection
$mysql = require ROOT.'/config/database.php';
try {
    $pdo = new PDO('mysql:host=localhost;dbname=keytraff', $mysql['user'], $mysql['password']);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $stmt1 = "SELECT requests.id, offers.name, requests.price, requests.count, operators.fio FROM ((requests
    JOIN offers ON requests.offer_id = offers.id)
    JOIN operators ON requests.operator_id = operators.id)
    WHERE requests.count > 2 AND (operators.id = 10 OR operators.id = 12)";
    $test = $pdo->prepare($stmt1);
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
