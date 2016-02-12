<?php
    require_once("connect.php");

    $sql = "SELECT currentUser FROM users WHERE userId = 1";
    $currentUser = $dbh->prepare($sql);
    $currentUser -> execute();
    $currentUser2 = $currentUser->fetch();
    $currentUser3 = $currentUser2['currentUser'];

    $query = "SELECT products.productName, products.productLink, products.productPrice, orders.quantity
    FROM orders LEFT JOIN products on orders.productId = products.productId WHERE userId = '$currentUser3'";

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

    <style>
        img
        {
            width: 140px;
            height: 110px;
        }
    </style>
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

<div id = bodyText>
    <h2>Shopping Cart</h2>
    <table class="table" align="center">
        <thead>
            <th>Product</th>
            <th>Quantity</th>
            <th>Price</th>
        </thead>
        <tbody>
        <?php
            foreach($users as $user){
        ?>
        <tr>
            <td><img style="float: left" src= "<?php echo $user['productLink']?> " /> <h4 style="float: left; padding-left: 12px"><?php echo $user['productName']?></h4></td>
            <td><?php echo $user['quantity']?></td>
            <td><h5 style="color: red">$<?php echo $user['quantity'] * $user['productPrice']?></h5></td>
        </tr>
                <?php
            }
        ?>
        </tbody>

    </table>
</div>
</body>
</html>