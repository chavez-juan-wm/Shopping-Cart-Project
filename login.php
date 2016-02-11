<?php
    require_once("connect.php");

    if(@$_POST['addUser'])
    {
        $email = $_POST['email'];

        echo "Email: " . $_POST['email'];
        echo "\nPassword: " . $_POST['password'];

    $row = $dbh->prepare('SELECT userId FROM users');
    $row->execute();

    /* Return number of rows that were counted */
    $count = $row->rowCount();
    print("\nCounted $count rows.\n");


//        for
//        $query = "SELECT userId FROM users WHERE $email = 'email', $password = ''";

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
    <script src="js/jquery.js"></script>
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
                    <li class='has-sub'><a href=''><span>About Us</span></a></li>
                    <li class='has-sub'><a href=''><span>Contact Info</span></a></li>
                    <li class='has-sub'><a href=''><span>Frequently Asked Questions</span></a></li>
                </ul>
            </li>
            <li><a href='products.html'><span>Products</span></a></li>
            <li><a href='#'><span>Cart</span></a>
                <ul>
                    <li class='has-sub'><a href='cart.html'><span>Shopping Cart</span></a></li>
                    <li class='has-sub'><a href=''><span>Checkout</span></a></li>
                </ul>
            </li>
            <li  class="active" style="float: right;"><a href='login.php'><span>Profile</span></a></li>
        </ul>
    </div>

    <div class="container">
        <div class="card card-container">
            <img id="profile-img" class="profile-img-card" src="https://www.junkfreejune.org.nz/themes/base/production/images/default-profile.png" />

            <form name="addUser" method = "post" class="form-signin">
                <span id="reauth-email" class="reauth-email"></span>
                <input type="email" class="form-control, inputEmail" name="email" placeholder="Email address" required autofocus>
                <input type="password" class="form-control, inputPassword" name="password" placeholder="Password" required>
                <div id="remember" class="checkbox">
                    <label>
                        <input type="checkbox" value="remember-me"> Remember me
                    </label>
                </div>
                <button name="addUser" value="1" class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Sign in</button>
            </form>
            <!-- /form -->

            <a href="#" class="forgot-password">
                Forgot the password?
            </a>
            <a href="signup.php" class="forgot-password">
                <p style="margin-bottom: 0">New? Create an Account</p>
            </a>

        </div><!-- /card-container -->
    </div><!-- /container -->
</body>
</html>
