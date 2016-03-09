<?php
require_once("connect.php");

$total = 0;
$items = "";

//  The mysql query that gets the product name, image link, price, product id, and quantity
$query = "SELECT products.productName, products.productLink, products.productPrice, products.productId, history.quantity, history.date
            FROM history LEFT JOIN products on history.productId = products.productId WHERE userId = :userId ORDER BY date DESC";

//  Executes the query above and counts how many rows it has
$stmt = $dbh->prepare($query);
$stmt->execute(array('userId'=>$currentUser3));
$users = $stmt->fetchAll();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Purchase History</title>
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
        p
        {
            font-size: medium;
        }
    </style>
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

<div id = bodyText>
    <h2>Purchase History</h2>

    <h4 style="padding-left: 7px; color: midnightblue;"><?php echo $items ?></h4>

    <table class="table" align="center">
        <thead>
            <th>Product</th>
            <th>Date Purchased</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Total</th>
        </thead>
        <tbody>
        <?php
        foreach($users as $user){
            ?>
            <tr>
                <td>
                    <div style="float: left">
                        <img src= "<?php echo $user['productLink']?> " />
                    </div>

                    <div style="float: left; padding-left: 12px">
                        <h4><?php echo $user['productName']?></h4>
                    </div>
                </td>
                <td>
                    <p style="padding-left: 10px">
                    <?php
                        $date = strtotime($user['date']);
                        echo date('m-d-Y',$date);
                    ?>
                    </p>
                </td>
                <td>
                    <p style="padding-left: 25px"><?= $user["quantity"] ?></p>&nbsp;
                </td>
                <td><p style="color: orangered">$<?php $total += $user['quantity'] * $user['productPrice']; echo $user['productPrice'];?></p></td>
                <td><p style="color: orangered">$<?php $number = $user['quantity'] * $user['productPrice']; echo number_format((float)$number, 2, '.', '');?></p></td>
            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>

    <h4 style="float: right; padding-right: 50px; margin-top: 2px"><strong>Total: $<?= number_format((float)$total, 2, '.', ''); ?></strong></h4>

    <div style="padding-left: 10px; float: left">
        <form name="continue" action="products.php">
            <button name="continue" class="btn-primary" value="1" type="submit"> Continue Shopping </button>
        </form>
    </div>

</div>
</body>
</html>