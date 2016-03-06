<?php
    require_once("connect.php");
    date_default_timezone_set('America/Phoenix');

    $total = 0;


//  Just displays all of the receipt elements. The product name, price, and quantity.
    $query = "SELECT products.productName, products.productPrice, orders.quantity
                FROM orders LEFT JOIN products on orders.productId = products.productId WHERE userId = :userId";

    $stmt = $dbh->prepare($query);
    $stmt->execute(array('userId'=>$currentUser3));
    $users = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <!-- This file has been downloaded from Bootsnipp.com. Enjoy! -->
    <title>Receipt</title>
    <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/login.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>

    <!-- Files for menu bar -->
    <script src="js/navbar.js" type="text/javascript"></script>
    <link rel="stylesheet" type="text/css" href="css/navbar.css"/>
</head>

<body>
<div style="z-index: 10" id='cssmenu'>
    <ul>
        <li><a href='index.html'><span>Home</span></a></li>
        <li><a href='#'><span>About</span></a>
            <ul>
                <li class='has-sub'><a href='aboutUs.html'><span>About Us</span></a></li>
                <li class='has-sub'><a href='FAQ.html'><span>Frequently Asked Questions</span></a></li>
            </ul>
        </li>
        <li><a href='products.php'><span>Products</span></a></li>
        <li class="active"><a href='cart.php'><span>Cart</span></a></li>
        <li style="float: right;"><a href='login.php'><span>Profile</span></a></li>
    </ul>
</div>

<div class="container" style="margin-top: 20px">
    <div class="row">
        <div class="well col-xs-10 col-sm-10 col-md-6 col-xs-offset-1 col-sm-offset-1 col-md-offset-3">
            <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <address>
                        <strong>West-Mec</strong>
                        <br>
                        5405 N 99th Ave
                        <br>
                        Glendale, AZ 85305
                        <br>
                        Phone: (623) 738-0045
                    </address>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6 text-right">
                    <p>
                        <em>Date: <?php echo date('m/d/Y'); ?></em>
                    </p>
                    <p>
                        <em>Receipt #: <?php echo(mt_rand(1,1000000)); ?></em>
                    </p>
                </div>
            </div>

            <div class="row">
                <div class="text-center">
                    <h1>Receipt</h1>
                </div>

                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Quantity</th>
                            <th class="text-center">Price</th>
                            <th class="text-center">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach($users as $user){
                        ?>
                        <tr>
                            <td class="col-md-9"><em><?php echo $user['productName']?></em></h4></td>
                            <td class="col-md-1" style="text-align: center"> <?= $user["quantity"] ?> </td>
                            <td class="col-md-1 text-center">$<?php $total += $user['quantity'] * $user['productPrice']; echo $user['productPrice'];?></td>
                            <td class="col-md-1 text-center">$<?php echo $user['quantity'] * $user['productPrice'];?></td>
                        </tr>
                            <?php
                        }
                        ?>
                        <tr>
                            <td style="border-top: none" class="text-danger"><h4><strong>Total: $<?=$total?></strong></h4></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
