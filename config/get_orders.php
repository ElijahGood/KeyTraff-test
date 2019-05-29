<?php

//database connection
$mysql = require_once(ROOT.'/config/database.php');
try {
    $pdo = new PDO('mysql:host=localhost;dbname=keytraff', $mysql['user'], $mysql['password']);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}

if (isset($_POST['orders']) && $_POST['orders']) {
    $stmt1 = "SELECT requests.id, offers.name, requests.price, requests.count, operators.fio FROM ((requests
         JOIN offers ON requests.offer_id = offers.id)
         JOIN operators ON requests.operator_id = operators.id)
         WHERE requests.count > 2 AND (operators.id = 10 OR operators.id = 12)";
    $test = $pdo->prepare($stmt2);
    $test->execute();
    $test_data = $test->fetchAll();
    echo json_encode($test_data);
} else {
    echo json_encode('fuckedup');
}
