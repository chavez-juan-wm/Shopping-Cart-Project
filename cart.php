<?php
    require_once("connect.php");

    $total = 0;

$sql = "SELECT currentUser FROM users WHERE userId = 1";
    $currentUser = $dbh->prepare($sql);
    $currentUser -> execute();
    $currentUser2 = $currentUser->fetch();
    $currentUser3 = $currentUser2['currentUser'];

    $query = "SELECT products.productName, products.productLink, products.productPrice, products.productId, orders.quantity
    FROM orders LEFT JOIN products on orders.productId = products.productId WHERE userId = '$currentUser3'";

    $stmt = $dbh->prepare($query);
    $stmt->execute();
    $users = $stmt->fetchAll();

    if(@$_POST['product1'])
    {
        $quantity = $_POST['quantity1'];
        $sql = "UPDATE `shopping_cart`.`orders` SET `quantity`='$quantity' WHERE userId='".$currentUser3."' AND productId ='1'";
        $res = $dbh->prepare($sql);
        $res -> execute();

        $stmt = $dbh->prepare($query);
        $stmt->execute();
        $users = $stmt->fetchAll();
    }

    if(@$_POST['product2'])
    {
        $quantity = $_POST['quantity2'];
        $sql = "UPDATE `shopping_cart`.`orders` SET `quantity`='$quantity' WHERE userId='".$currentUser3."' AND productId ='2'";
        $res = $dbh->prepare($sql);
        $res -> execute();

        $stmt = $dbh->prepare($query);
        $stmt->execute();
        $users = $stmt->fetchAll();
    }

    if(@$_POST['product3'])
    {
        $quantity = $_POST['quantity3'];
        $sql = "UPDATE `shopping_cart`.`orders` SET `quantity`='$quantity' WHERE userId='".$currentUser3."' AND productId ='3'";
        $res = $dbh->prepare($sql);
        $res -> execute();

        $stmt = $dbh->prepare($query);
        $stmt->execute();
        $users = $stmt->fetchAll();
    }

    if(@$_POST['product4'])
    {
        $quantity = $_POST['quantity4'];
        $sql = "UPDATE `shopping_cart`.`orders` SET `quantity`='$quantity' WHERE userId='".$currentUser3."' AND productId ='4'";
        $res = $dbh->prepare($sql);
        $res -> execute();

        $stmt = $dbh->prepare($query);
        $stmt->execute();
        $users = $stmt->fetchAll();
    }

    if(@$_POST['product5'])
    {
        $quantity = $_POST['quantity5'];
        $sql = "UPDATE `shopping_cart`.`orders` SET `quantity`='$quantity' WHERE userId='".$currentUser3."' AND productId ='5'";
        $res = $dbh->prepare($sql);
        $res -> execute();

        $stmt = $dbh->prepare($query);
        $stmt->execute();
        $users = $stmt->fetchAll();
    }

    if(@$_POST['product6'])
    {
        $quantity = $_POST['quantity6'];
        $sql = "UPDATE `shopping_cart`.`orders` SET `quantity`='$quantity' WHERE userId='".$currentUser3."' AND productId ='6'";
        $res = $dbh->prepare($sql);
        $res -> execute();

        $stmt = $dbh->prepare($query);
        $stmt->execute();
        $users = $stmt->fetchAll();
    }

    if(@$_POST['product7'])
    {
        $quantity = $_POST['quantity7'];
        $sql = "UPDATE `shopping_cart`.`orders` SET `quantity`='$quantity' WHERE userId='".$currentUser3."' AND productId ='7'";
        $res = $dbh->prepare($sql);
        $res -> execute();

        $stmt = $dbh->prepare($query);
        $stmt->execute();
        $users = $stmt->fetchAll();
    }

    if(@$_POST['product8'])
    {
        $quantity = $_POST['quantity8'];
        $sql = "UPDATE `shopping_cart`.`orders` SET `quantity`='$quantity' WHERE userId='".$currentUser3."' AND productId ='8'";
        $res = $dbh->prepare($sql);
        $res -> execute();

        $stmt = $dbh->prepare($query);
        $stmt->execute();
        $users = $stmt->fetchAll();
    }

    if(@$_POST['product9'])
    {
        $quantity = $_POST['quantity9'];
        $sql = "UPDATE `shopping_cart`.`orders` SET `quantity`='$quantity' WHERE userId='".$currentUser3."' AND productId ='9'";
        $res = $dbh->prepare($sql);
        $res -> execute();

        $stmt = $dbh->prepare($query);
        $stmt->execute();
        $users = $stmt->fetchAll();
    }

    if(@$_POST['delete1'])
    {
        $sql = "DELETE FROM `shopping_cart`.`orders` WHERE `userId`='".$currentUser3."' AND productId = '1'";;
        $res = $dbh->prepare($sql);
        $res -> execute();

        $stmt = $dbh->prepare($query);
        $stmt->execute();
        $users = $stmt->fetchAll();
    }

    if(@$_POST['delete2'])
    {
        $sql = "DELETE FROM `shopping_cart`.`orders` WHERE `userId`='".$currentUser3."' AND productId = '2'";;
        $res = $dbh->prepare($sql);
        $res -> execute();

        $stmt = $dbh->prepare($query);
        $stmt->execute();
        $users = $stmt->fetchAll();
    }

    if(@$_POST['delete3'])
    {
        $sql = "DELETE FROM `shopping_cart`.`orders` WHERE `userId`='".$currentUser3."' AND productId = '3'";;
        $res = $dbh->prepare($sql);
        $res -> execute();

        $stmt = $dbh->prepare($query);
        $stmt->execute();
        $users = $stmt->fetchAll();
    }

    if(@$_POST['delete4'])
    {
        $sql = "DELETE FROM `shopping_cart`.`orders` WHERE `userId`='".$currentUser3."' AND productId = '4'";;
        $res = $dbh->prepare($sql);
        $res -> execute();

        $stmt = $dbh->prepare($query);
        $stmt->execute();
        $users = $stmt->fetchAll();
    }

    if(@$_POST['delete5'])
    {
        $sql = "DELETE FROM `shopping_cart`.`orders` WHERE `userId`='".$currentUser3."' AND productId = '5'";;
        $res = $dbh->prepare($sql);
        $res -> execute();

        $stmt = $dbh->prepare($query);
        $stmt->execute();
        $users = $stmt->fetchAll();
    }

    if(@$_POST['delete6'])
    {
        $sql = "DELETE FROM `shopping_cart`.`orders` WHERE `userId`='".$currentUser3."' AND productId = '6'";;
        $res = $dbh->prepare($sql);
        $res -> execute();

        $stmt = $dbh->prepare($query);
        $stmt->execute();
        $users = $stmt->fetchAll();
    }

    if(@$_POST['delete7'])
    {
        $sql = "DELETE FROM `shopping_cart`.`orders` WHERE `userId`='".$currentUser3."' AND productId = '7'";;
        $res = $dbh->prepare($sql);
        $res -> execute();

        $stmt = $dbh->prepare($query);
        $stmt->execute();
        $users = $stmt->fetchAll();
    }

    if(@$_POST['delete8'])
    {
        $sql = "DELETE FROM `shopping_cart`.`orders` WHERE `userId`='".$currentUser3."' AND productId = '8'";;
        $res = $dbh->prepare($sql);
        $res -> execute();

        $stmt = $dbh->prepare($query);
        $stmt->execute();
        $users = $stmt->fetchAll();
    }

    if(@$_POST['delete9'])
    {
        $sql = "DELETE FROM `shopping_cart`.`orders` WHERE `userId`='".$currentUser3."' AND productId = '9'";;
        $res = $dbh->prepare($sql);
        $res -> execute();

        $stmt = $dbh->prepare($query);
        $stmt->execute();
        $users = $stmt->fetchAll();
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
            /*border is optional*/
            cursor: pointer;
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
            <td>
                <div style="float: left">
                    <img src= "<?php echo $user['productLink']?> " />
                </div>

                <div style="float: left; padding-left: 12px">
                    <h4><?php echo $user['productName']?></h4>
                    <form method="post" name="delete<?= $user["productId"] ?>">
                        <button class="link" type="submit" name="delete<?= $user["productId"] ?>" value="1">Delete</button>
                    </form>
                </div>
            </td>
            <td>
                <form method="post" name="product<?= $user["productId"] ?>">
                    <input style="width: 8%" type="text" name="quantity<?= $user["productId"] ?>" value="<?= $user["quantity"] ?>">&nbsp;
                    <button type="submit" name="product<?= $user["productId"] ?>" value="1">Update</button>
                </form>
            </td>
            <td><h4 style="color: orangered">$<?php $total += $user['quantity'] * $user['productPrice']; echo $user['quantity'] * $user['productPrice'];?></h4></td>
        </tr>
                <?php
            }
        ?>
        </tbody>
    </table>

    <h4 style="float: right; padding-right: 30px; margin-top: 2px">Total: $<?=$total?></h4>
</div>
</body>
</html>