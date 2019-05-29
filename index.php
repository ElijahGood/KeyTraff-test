<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="/jquery-3.4.1.js"></script>
    
    

    <script>
        $(document).ready(function(){
            $('#get_orders').click(function() {
                console.log($.ajax);
                $.ajax({
                    url:'get_orders.php',
                    data: 'orders='+'1', //sending the data to page.php
                    success: function(data) {  
                        console.log(data);
                    }
                }).fail(function(e) { 
                        alert('an error occured');
                }).complete(function() { 
                        /*alert*/
                });
            //     var response = '';
            //     $.ajax({
            //         type: "GET",
            //         url: "get_orders.php",
            //         async: false,
            //         success: function() {
            //             console.log();
            //         }
            //     });
            // });
            // alert(response);
            });
        });
    </script>

</head>
<body>

    <div class="container">
        <div id="buttons-container">
            <h2>KeyTraff</h2>
            <button type="button" class="btn btn-info" id="get_orders">1) Заказы</button>
            <button type="button" class="btn btn-info">2) Товары</button>
        </div>
        <div id="orders-container" style="display:none">
            <textarea>Here we are!</textarea>
        </div>
    </div>

    <!-- for js and jquery -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <!-- js bundle -->
    <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script> -->
</body>
</html>

<?php

define('ROOT', dirname(__FILE__));

//database connection
$mysql = require_once(ROOT.'/config/database.php');
try {
    $pdo = new PDO('mysql:host=localhost;dbname=keytraff', $mysql['user'], $mysql['password']);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}

$request = $_SERVER['REQUEST_URI'];
if ($request == '/get_orders') {
    print_r("ORDERS QUERY HERE 1!");
    exit;
} else if ($request == 'get_orders') {
    print_r("ORDERS QUERY HERE 2!");
    exit;
}

if ($_POST['get_orders']) {
    print_r("ORDERS QUERY HERE 3!");
    exit;
}

$stmt1 = "SELECT requests.id, offers.name, requests.price, requests.count, operators.fio FROM ((requests
         JOIN offers ON requests.offer_id = offers.id)
         JOIN operators ON requests.operator_id = operators.id)
         WHERE requests.count > 2 AND (operators.id = 10 OR operators.id = 12)";
$stmt2 = "SELECT offers.name, SUM(requests.count) AS quantity, SUM(requests.count * requests.price)  AS total_sum
            FROM requests
            JOIN offers ON requests.offer_id = offers.id
            GROUP BY requests.offer_id";

// $test = $pdo->prepare($stmt2);
// $test->execute();
// $test_data = $test->fetchAll();
// if ($test_data) {
//     print_r($test_data);
// } else {
//     echo "FUcked up!";
// }
