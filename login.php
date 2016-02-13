<?php
    require_once("connect.php");

    $sql = "SELECT currentUser FROM users WHERE userId = 1";
    $currentUser = $dbh->prepare($sql);
    $currentUser -> execute();
    $currentUser2 = $currentUser->fetch();
    $currentUser3 = $currentUser2['currentUser'];
    $logout = '';

    if($currentUser3 == 1)
    {
        $check = "No one is signed in.";
        $sql = "SELECT * FROM users WHERE userId = 1";
        $res = $dbh->prepare($sql);
        $res -> execute();

        $users = $res->fetchAll();
    }

    else if($currentUser3 != 1)
    {
        $logout = "<form method='post' name='logout'>
                    <td><button class='link' type='submit' name='logout' value='1'>Log Out</button></td>
                </form>";
        $check = "You are currently signed in as: ";
        $sql = "SELECT * FROM users WHERE userId = $currentUser3";
        $res = $dbh->prepare($sql);
        $res -> execute();
        $users = $res->fetchAll();
    }

    if(@$_POST['addUser'])
    {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM users WHERE email='".$email."' AND password ='".$password."'";
        $res = $dbh->prepare($sql);
        $res -> execute();
        $count = $res->rowCount();

        if ($count == 1)
        {
            $logout = "<form method='post' name='logout'>
                    <td><button class='link' type='submit' name='logout' value='1'>Log Out</button></td>
                </form>";
            $check = "You have successfully signed in as: ";
            $currentUser2 = $res->fetch();
            $currentUser3 = $currentUser2['userId'];

            $sql = "UPDATE `shopping_cart`.`users` SET `currentUser`= $currentUser3 WHERE `userId`='1';";
            $set = $dbh->prepare($sql);
            $set -> execute();

            $sql = "SELECT * FROM users WHERE email='".$email."' AND password ='".$password."'";
            $res = $dbh->prepare($sql);
            $res -> execute();
            $users = $res->fetchAll();
        }

        else
        {
            $check = "Something wasn't correct.";
        }
    }

    if(@$_POST['logout'])
    {
        $logout = '';
        $check = "You have successfully signed out ";

        $sql = "UPDATE `shopping_cart`.`users` SET `currentUser`= '1' WHERE `userId`='1';";
        $set = $dbh->prepare($sql);
        $set -> execute();

        $sql = "SELECT * FROM users WHERE userId = 1";
        $res = $dbh->prepare($sql);
        $res -> execute();
        $users = $res->fetchAll();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!-- This file has been downloaded from Bootsnipp.com. Enjoy! -->
    <title>Log In</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/login.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>

    <!-- Files for menu bar -->
    <script src="js/navbar.js" type="text/javascript"></script>
    <link rel="stylesheet" type="text/css" href="css/navbar.css"/>

    <style>
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
                    <li class='has-sub'><a href='aboutUs.html'><span>About Us</span></a></li>
                    <li class='has-sub'><a href='FAQ.html'><span>Frequently Asked Questions</span></a></li>
                </ul>
            </li>
            <li><a href='products.php'><span>Products</span></a></li>
            <li><a href='cart.php'><span>Cart</span></a></li>
            <li class="active" style="float: right;"><a href='login.php'><span>Profile</span></a></li>
        </ul>
    </div>

    <div class="container">
        <div class="card card-container">
            <img id="profile-img" class="profile-img-card" src="https://www.junkfreejune.org.nz/themes/base/production/images/default-profile.png" />

            <form name="addUser" method = "post" class="form-signin">
                <span id="reauth-email" class="reauth-email"></span>
                <input type="email" class="form-control, inputEmail" name="email" placeholder="Email address" required autofocus>
                <input type="password" class="form-control, inputPassword" name="password" placeholder="Password" required>

                <button name="addUser" value="1" class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Sign in</button>
            </form>
            <!-- /form -->


            <a href="signup.php" class="forgot-password">
                <p style="margin-bottom: 0">New? Create an Account</p>
            </a>

        </div><!-- /card-container -->
    </div><!-- /container -->

    <?php echo $check ?>

    <table class="table" align="center">
        <thead>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Log Out</th>
        </thead>

        <tbody>
        <?php
        foreach($users as $user){
            ?>
            <tr>
                <td><?php echo $user['firstName']?></td>
                <td><?php echo $user['lastName']?></td>
                <td><?php echo $user['email']?></td>

                <?php echo $logout ?>


            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>
</body>
</html>
