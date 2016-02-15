<?php
    require_once("connect.php");

    $total = 0;
    $items = "";

    $query = "SELECT products.productName, products.productLink, products.productPrice, products.productId, orders.quantity
            FROM orders LEFT JOIN products on orders.productId = products.productId WHERE userId = '$currentUser3'";

    $stmt = $dbh->prepare($query);
    $stmt->execute();
    $users = $stmt->fetchAll();
    $count = $stmt->rowCount();

    if ($currentUser3 == 1)
    {
        $items = "<a href= 'login.php'>Sign in</a> to add items to your cart.";
    }

    else if ($count == 0)
        $items = "You currently have no items in your cart.";
    else
        $items = "";

    if(@$_POST['product'])
    {
        $productId = $_POST['product'];
        $quantity = $_POST['quantity'];
        $sql = "UPDATE `shopping_cart`.`orders` SET `quantity`='$quantity' WHERE userId='".$currentUser3."' AND productId ='".$productId."'";
        $res = $dbh->prepare($sql);
        $res -> execute();

        $stmt = $dbh->prepare($query);
        $stmt->execute();
        $users = $stmt->fetchAll();
    }

    if(@$_POST['delete'])
    {
        $productId = $_POST['delete'];
        $sql = "DELETE FROM `shopping_cart`.`orders` WHERE `userId`='".$currentUser3."' AND productId = '".$productId."'";;
        $res = $dbh->prepare($sql);
        $res -> execute();

        $stmt = $dbh->prepare($query);
        $stmt->execute();
        $users = $stmt->fetchAll();
        $count = $stmt->rowCount();

        if($count == 0)
            $items = "You currently have no items in your cart.";
    }

    if(@$_POST['Checkout'])
    {
        if($count != 0)
            header("Location: billing.php");
    }

    if(@$_POST['continue'])
    {
        header("Location: products.php");
    }
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
        .link
        {
            color: dodgerblue;
            background:none!important;
            border:none;
            padding:0!important;
            font: inherit;
            cursor: pointer;
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
        <h2>Shopping Cart</h2>

        <h4 style="padding-left: 7px; color: midnightblue;"><?php echo $items ?></h4>

        <table class="table" align="center">
            <thead>
                <th>Product</th>
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
                        <form method="post" name="delete">
                            <button class="link" type="submit" name="delete" value="<?= $user["productId"] ?>">Delete</button>
                        </form>
                    </div>
                </td>
                <td>
                    <form method="post" name="product">
                        <input style="width: 8%" type="text" name="quantity" value="<?= $user["quantity"] ?>">&nbsp;
                        <button class="btn-info" type="submit" name=product value="<?= $user["productId"] ?>">Update</button>
                    </form>
                </td>
                <td><p style="color: orangered">$<?php $total += $user['quantity'] * $user['productPrice']; echo $user['productPrice'];?></p></td>
                <td><p style="color: orangered">$<?php echo $user['quantity'] * $user['productPrice'];?></p></td>
            </tr>
                    <?php
                }
            ?>
            </tbody>
        </table>

        <h4 style="float: right; padding-right: 50px; margin-top: 2px"><strong>Total: $<?=$total?></strong></h4>

        <div style="padding-left: 10px; float: left">
            <form name="continue" method="post">
                <button name="continue" class="btn-primary" value="1" type="submit"> Continue Shopping </button>
            </form>
        </div>
        <div style="padding-left: 10px; float: left">
            <form name="Checkout" method="post">
                <button name="Checkout" class="btn-success" value="1" type="submit"> Checkout </button>
            </form>
        </div>
    </div>
</body>
</html>