<?php

    require_once("connect.php");

    $sql = "SELECT currentUser FROM users WHERE userId = 1";
    $currentUser = $dbh->prepare($sql);
    $currentUser -> execute();
    $currentUser2 = $currentUser->fetch();
    $currentUser3 = $currentUser2['currentUser'];

    $query = "SELECT products.productName, orders.quantity
    FROM orders LEFT JOIN products on orders.productId = products.productId AND userId = '$currentUser3'";

    $stmt = $dbh->prepare($query);
    $stmt->execute();
    $users = $stmt->fetchAll();
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Cart</title>
    <link href="css/styles.css" rel="stylesheet">
    <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">

    <!-- Files for menu bar -->
    <script src="js/navbar.js" type="text/javascript"></script>
    <link rel="stylesheet" type="text/css" href="css/navbar.css"/>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
</head>

<body>
<div style="z-index: 10" id='cssmenu'>
    <ul>
        <li><a href='index.html'><span>Home</span></a></li>
        <li><a href='#'><span>About</span></a>
            <ul>
                <li class='has-sub'><a href=''><span>About Us</span></a></li>
                <li class='has-sub'><a href=''><span>Contact Info</span></a></li>
                <li class='has-sub'><a href=''><span>Frequently Asked Questions</span></a></li>
            </ul>
        </li>
        <li><a href='products.php'><span>Products</span></a></li>
        <li class="active"><a href='#'><span>Cart</span></a>
            <ul>
                <li class='has-sub'><a href='cart.php'><span>Shopping Cart</span></a></li>
                <li class='has-sub'><a href=''><span>Checkout</span></a></li>
            </ul>
        </li>
        <li style="float: right;"><a href='login.php'><span>Profile</span></a></li>
    </ul>
</div>

<script>
    function clean()
    {
        $("#body tr").remove();
    }
</script>

<div id = bodyText>
    <table class="table" align="center">
        <thead>
            <th>Product Name</th>
            <th>Quantity</th>
        </thead>

        <tbody id="body">
        <?php
            foreach($users as $user){
        ?>
        <tr>
            <td><?php echo $user['productName']?></td>
            <td><?php echo $user['quantity']?></td>
        </tr>
                <?php
            }
        ?>
        </tbody>

    </table>
</div>
</body>
</html>