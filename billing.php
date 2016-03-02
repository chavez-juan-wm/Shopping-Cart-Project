<?php
    require_once("connect.php");

//    Redirects the page to the payment page when they submit all of the required info in the form
    if(@$_POST['billing'])
    {
        $sql = "SELECT * FROM address WHERE userId='".$currentUser3."'";
        $res = $dbh->prepare($sql);
        $res->execute();
        $count = $res->rowCount();

        if ($count == 1)
        {
            echo "There was 1";
            //        header("Location: payment.php");
        }
        else
            echo "None";
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <!-- This file has been downloaded from Bootsnipp.com. Enjoy! -->
    <title>Billing Information</title>
    <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/login.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>

    <!-- Files for menu bar -->
    <script src="js/navbar.js" type="text/javascript"></script>
    <link rel="stylesheet" type="text/css" href="css/navbar.css"/>

    <style>
        body
        {
            overflow-x: hidden;
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

    <!-- Start of the address details -->
    <div style="margin-top: 3%">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <form class="form-horizontal" name="billing" method="post">
                    <!-- Form Name -->
                    <legend>Address Details</legend>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="textinput">Line 1</label>
                        <div class="col-sm-10">
                            <input type="text" placeholder="Address Line 1" class="form-control" required>
                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="textinput">Line 2</label>
                        <div class="col-sm-10">
                            <input type="text" placeholder="Address Line 2" class="form-control">
                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="textinput">City</label>
                        <div class="col-sm-10">
                            <input type="text" placeholder="City" class="form-control" required>
                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="textinput">State</label>
                        <div class="col-sm-4">
                            <input type="text" placeholder="State" class="form-control" required>
                        </div>

                        <label class="col-sm-2 control-label" for="textinput">Postcode</label>
                        <div class="col-sm-4">
                            <input type="text" placeholder="Post Code" class="form-control" required>
                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="textinput">Country</label>
                        <div class="col-sm-10">
                            <input type="text" placeholder="Country" class="form-control" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <div class="pull-right">
                                <a href="cart.php" class="btn btn-default" role="button">Cancel</a>
                                <button type="submit" class="btn btn-primary" name="billing" value="1">Next</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div><!-- /.col-lg-12 -->
        </div><!-- /.row -->
    </div>
</body>
</html>
