<?php
/*** mysql hostname ***/
$hostname = 'localhost';

/*** mysql username ***/
$username = 'root';

/*** mysql password ***/
$password = 'root';

try
{
    $dbh = new PDO("mysql:host=$hostname;dbname=Test", $username, $password);
}
catch(PDOException $e)
{
    echo $e->getMessage();
}

$query = "SELECT family.position, food.meal ".
    "FROM family, food ".
    "WHERE family.position = food.position";


$stmt = $dbh->prepare($query);
$stmt->execute();
$users = $stmt->fetchAll();
?>

<html>
    <body>
    <table align="center" border="1" style="background-color: white; border-radius: 10px; margin-left: auto; margin-right: auto; border-collapse: collapse;">
        <thead>
        <th>Position</th>
        <th>Meal</th>
        </thead>
        <tbody>
        <?php
        foreach($users as $user){
            ?>
            <tr>
                <td><?php echo $user['position']?></td>
                <td><?php echo $user['meal']?></td>
            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>
    </body>
</html>
