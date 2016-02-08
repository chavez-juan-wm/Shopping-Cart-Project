<?php
    /*** mysql hostname ***/
    $hostname = 'localhost';
    /*** mysql username ***/
    $username = 'root';
    /*** mysql password ***/
    $password = '';

    try
    {
        $dbh = new PDO("mysql:host=$hostname;dbname=shopping_cart", $username, $password);
        // set the PDO error mode to exception
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "Connected successfully";
    }
    catch(PDOException $e)
    {
        echo "Connection failed: " . $e->getMessage();
    }

    $query = "SELECT products.productName, users.firstName, users.lastName, users.email
    FROM orders LEFT JOIN products on orders.productId = products.productId LEFT JOIN users on orders.userId = users.userId;";


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
                <th>Product Name</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
            </thead>

            <tbody>
            <?php
                foreach($users as $user){
                    ?>
                    <tr>
                        <td><?php echo $user['productName']?></td>
                        <td><?php echo $user['firstName']?></td>
                        <td><?php echo $user['lastName']?></td>
                        <td><?php echo $user['email']?></td>
                    </tr>
                    <?php
                }
            ?>
            </tbody>

        </table>
    </body>
</html>