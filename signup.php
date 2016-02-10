<?php
    /*** mysql hostname ***/
    $hostname = 'localhost';
    /*** mysql username ***/
    $username = 'root';
    /*** mysql password ***/
    $password = 'root';

    try
    {
        $dbh = new PDO("mysql:host=$hostname;dbname=shopping_cart", $username, $password);
        // set the PDO error mode to exception
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOException $e)
    {
        echo "Connection failed: " . $e->getMessage();
    }

    $error = false;
    $success = false;

    if(@$_POST['addUser'])
    {
        if($_POST['firstName'] && $_POST['lastName'] && $_POST['password'] && $_POST['email'])
        {
            /**
            * If we're here...all is well. Process the insert
            */

            $stmt = $dbh->prepare('INSERT INTO users (firstName, lastName, email, password) VALUES (:firstName, :lastName, :email, :password)');
            $result = $stmt->execute(
            array(
                    'firstName'=>$_POST['firstName'],
                    'lastName'=>$_POST['lastName'],
                    'email'=>$_POST['email'],
                    'password'=>$_POST['password'],
                )
            );

            if($result)
            {
                $success = "User " . $_POST['firstName'] . " was successfully saved.";
            }
            else
            {
                $success = "There was an error saving " . $_POST['firstName'];
            }
        }
    }

    /**
    * We'll always want to pull the users to show them in the table
    */
    $stmt = $dbh->prepare('SELECT * FROM users');
    $stmt->execute();
    $users = $stmt->fetchAll();

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Create an Account</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/login.css" rel="stylesheet">
    <script src="js/jquery.js"></script>

    <!-- Files for menu bar -->
    <script src="js/navbar.js" type="text/javascript"></script>
    <link rel="stylesheet" type="text/css" href="css/navbar.css"/>

    <style>
        .card-container.card
        {
            max-width: 40%;
            padding: 40px 40px;
        }
    </style>
</head>

<body>

    <script>
        $(document).ready(function()
        {
            $("#work").on('change', function(){
                alert("It works!");
            });
            $("#work").on('click', function(){
                alert("It works!");
            });
        });
    </script>

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
            <li  class="active" style="float: right;"><a href='login.html'><span>Profile</span></a></li>
        </ul>
    </div>

    <div id = bodyText>
        <div class="container">
            <div class="card card-container">
                <img id="profile-img" class="profile-img-card" src="https://www.junkfreejune.org.nz/themes/base/production/images/default-profile.png" />

                <form name="addUser" id="check" method = "post" class="form-signin">
                    <span id="reauth-email" class="reauth-email"></span>
                    <div style="float: left">
                        <input type="text" class="form-control, inputEmail" name="firstName" placeholder="First Name" required autofocus>
                        <input type="text" class="form-control, inputEmail" name="lastName" placeholder="Last Name" required>
                        <input type="email" class="form-control, inputEmail" name="email" placeholder="Email Address" required>
                    </div>

                    <div style="float: right">
                        <input type="password" class="form-control, inputPassword" name="password" placeholder="Password" required>
                        <input type="password" class="form-control, inputPassword" id="work" name="confirmPassword" placeholder="Repeat Password" required>
                    </div>

                    <button type="submit" name="addUser" value="1" class="btn btn-lg btn-primary btn-block btn-signin">Sign Up</button>
                </form>
                <!-- /form -->
            </div><!-- /card-container -->
        </div><!-- /container -->

        <div align="center" class="error">
            <?php
            if($error){
                echo $error;
                echo '<br /><br />';
            }
            ?>
        </div>


        <div align="center" class="success">
            <?php
            if($success){
                echo $success;
                echo '<br /><br />';
            }
            ?>
        </div>


        <table class="table" align="center">
            <thead>
                <th>User Id</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Password</th>
            </thead>

            <tbody>
            <?php
            foreach($users as $user){
                ?>
                <tr>
                    <td><?php echo $user['userId']?></td>
                    <td><?php echo $user['firstName']?></td>
                    <td><?php echo $user['lastName']?></td>
                    <td><?php echo $user['email']?></td>
                    <td><?php echo $user['password']?></td>
                </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
    </div>
</body>

</html>
