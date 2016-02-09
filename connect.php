<?php
    /*** mysql hostname ***/
    $hostname = 'localhost';
    /*** mysql username ***/
    $username = 'root';
    /*** mysql password ***/
    $password = 'root';

    try
    {
        $dbh = new PDO("mysql:host=$hostname;dbname=Shopping_Cart", $username, $password);
        // set the PDO error mode to exception
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "Connected successfully";
    }
    catch(PDOException $e)
    {
        echo "Connection failed: " . $e->getMessage();
    }

    $query = "SELECT Products.productName, Users.firstName, Users.lastName, Users.email, Orders.quantity
    FROM Orders LEFT JOIN Products on Orders.productId = Products.productId LEFT JOIN Users on Orders.usersId = Users.usersId;";


    $stmt = $dbh->prepare($query);
    $stmt->execute();
    $users = $stmt->fetchAll();
?>

<html>
    <head>
        <title>Test</title>
    </head>

    <body>
        <table align="center" border="1" style="background-color: white; border-radius: 10px; margin-left: auto; margin-right: auto; border-collapse: collapse;">
            <thead>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Product Name</th>
                <th>Quantity</th>
            </thead>

            <tbody>
            <?php
                foreach($users as $user){
                    ?>
                    <tr>
                        <td><?php echo $user['firstName']?></td>
                        <td><?php echo $user['lastName']?></td>
                        <td><?php echo $user['email']?></td>
                        <td><?php echo $user['productName']?></td>
                        <td><?php echo $user['quantity']?></td>
                    </tr>
                    <?php
                }
            ?>
            </tbody>

        </table>
    </body>
</html>