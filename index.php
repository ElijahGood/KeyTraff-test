<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="./jquery-3.4.1.js"></script>
    
    <script>
        $.ajax({
            type:'POST',
            url:'get_orders.php',
            data:{'orders':'orders'},
            success: function(response){
                let jsonData = JSON.parse(response);
                $.each(jsonData[0], function(index, element){
                    $('#orders-container').append(
                        '<tr>'+
                        '<td>' + element.id+ '</td>'+
                        '<td>' + element.name+ '</td>'+
                        '<td>' + element.price+ '</td>'+
                        '<td>' + element.count+ '</td>'+
                        '<td>' + element.fio+ '</td>'+
                        '</tr>'
                    );
                }); 
            }
        });

        $.ajax({
            type:'POST',
            url:'get_products.php',
            data:{'products':'products'},
            success: function(response){
                let jsonData = JSON.parse(response);
                $.each(jsonData[0], function(index, element){
                    $('#products-container').append(
                        '<tr>'+
                        '<td>' + element.name + '</td>'+
                        '<td>' + element.quantity + '</td>'+
                        '<td>' + element.total_sum + '</td>'+
                        '</tr>'
                    );
                }); 
            }
        });

    </script>  

</head>
<body>

    <header>
        <a class="logo">KeyTraff</a>
        <!-- <div class="header-right">
             <a href="#orders">orders</a>
            <a href="#products">products</a> 
        </div> -->
    </header>
    <div class="container">
        <div id="buttons-container">
            <button type="button" class="btn btn-info btn-block" id="get_orders" >1) Заказы</button>
        </div>
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th scope="col">#order</th>
                    <th scope="col">Product</th>
                    <th scope="col">Price</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Operator</th>
                </tr>
            </thead>
            <tbody id="orders-container">
            </tbody>
        </table>
        <br>
        <div  class="button-container-2">
            <button type="button" class="btn btn-info btn-block">2) Товары</button>
        </div>
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Sum</th>
                </tr>
            </thead>
            <tbody id="products-container">
            </tbody>
        </table>
        <br>
    </div>
    <hr>
    <footer class="page-footer font-small blue">
        <div class="footer-copyright text-center py-3">© 2019 inazarin
        </div>
    </footer>

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


// $stmt1 = "SELECT requests.id, offers.name, requests.price, requests.count, operators.fio FROM ((requests
//          JOIN offers ON requests.offer_id = offers.id)
//          JOIN operators ON requests.operator_id = operators.id)
//          WHERE requests.count > 2 AND (operators.id = 10 OR operators.id = 12)";
// $stmt2 = "SELECT offers.name, SUM(requests.count) AS quantity, SUM(requests.count * requests.price)  AS total_sum
//             FROM requests
//             JOIN offers ON requests.offer_id = offers.id
//             GROUP BY requests.offer_id";

?>