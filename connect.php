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
    }
    catch(PDOException $e)
    {
        echo "Connection failed: " . $e->getMessage();
    }


    $sql = "SELECT currentUser FROM users WHERE userId = 1";
    $currentUser = $dbh->prepare($sql);
    $currentUser -> execute();
    $currentUser2 = $currentUser->fetch();
    $currentUser3 = $currentUser2['currentUser'];