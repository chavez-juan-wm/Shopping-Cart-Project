<?php
    require_once("connect.php");

//  If the user clicks on the Add to Cart button AND they are currently signed in, then their item will be added and
// they will be sent to their cart.
    if(@$_POST['addProduct'] && $currentUser3 != 1)
    {
        $productId = $_POST['addProduct'];

        $sql = "SELECT * FROM orders WHERE userId='".$currentUser3."' AND productId ='".$productId."'";
        $res = $dbh->prepare($sql);
        $res -> execute();
        $count = $res->rowCount();

//      This checks if the item the user wants to add to their cart isn't already in there. This prevents duplicate rows
//      from being created in the database.
        if($count == 0)
        {
            $sql = "INSERT INTO `shopping_cart`.`orders` (`productId`, `userId`, `quantity`) VALUES ('".$productId."', '$currentUser3', '1');";
            $stmt = $dbh -> prepare($sql);
            $stmt -> execute();
        }
        header("Location: cart.php");
    }

//  If the add to cart button is clicked, then they will be sent to the cart, but nothing will be added because they aren't signed in.
    else if (@$_POST['addProduct'] && $currentUser3 == 1)
        header("Location: cart.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Products</title>
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

    <!-- Files for menu bar -->
    <script src="js/navbar.js" type="text/javascript"></script>
    <link rel="stylesheet" type="text/css" href="css/navbar.css"/>

    <style>
        img
        {
            width: 185px;
            height: 115px;
        }
    </style>
</head>

<body>

<script>
//  All the jQuery that shows the hidden divs when their image is clicked
    $(document).ready(function(){

        $(".close").click(function(){
            $(".secondDiv").fadeOut(400);

            for(var i = 1; i<=12; i++)
                $("#product" + i).fadeOut(400);
        });

        $("img").click(function(){
            var product = this.id;
            var number = product.substring(3, 5);
            $(".secondDiv").fadeIn(400);
            $("#product" + number).fadeIn(500);
        });
    });
</script>

<div style="z-index: 10" id='cssmenu'>
    <ul>
        <li><a href='index.html'><span>Home</span></a></li>
        <li><a href='#'><span>About</span></a>
            <ul>
                <li class='has-sub'><a href='aboutUs.html'><span>About Us</span></a></li>
                <li class='has-sub'><a href='FAQ.html'><span>Frequently Asked Questions</span></a></li>
            </ul>
        </li>
        <li class="active"><a href='products.php'><span>Products</span></a></li>
        <li><a href='cart.php'><span>Cart</span></a></li>
        <li style="float: right;"><a href='login.php'><span>Profile</span></a></li>
    </ul>
</div>

<div>
    <div id = bodyText>
        <!--display: none-->
        <div class="secondDiv" style="display: none">
            <div class="information" style="height: 55%;">
                <div id="product1" style="display: none;">
                    <button class="close">&#10006;</button>

                    <div style="width: 45%; float: left">
                        <div class="image">
                            <img src="pics/exploding_kittens.png" style="width: 200%; height: 180%">
                        </div>
                    </div>

                    <div style="float: left; margin-top: 3%; margin-left: 15%">
                        <h2 style="text-align: center">Exploding Kittens</h2>
                        <h3 style="text-align: center">$20.00</h3>
                        <div style="text-align: center">
                            <form name="addProduct" method="post">
                                <button class="btn" type="submit" name="addProduct" value="1">Add to Cart</button>
                            </form>
                        </div>

                    </div>

                    <div class="imgInfo">
                        <ul>
                            <li>Exploding Kittens is a card game for people who are into kittens and explosions and laser beams and sometimes goats.</li>
                            <li>Family-friendly, party game for 2-5 players (up to 9 players when combined with any other deck).</li>
                            <li>This is the most-backed project in Kickstarter history and all cards feature illustrations by The Oatmeal.</li>
                            <li>Includes 56 cards (2.5 x 3.5 inches), box, and instructions.</li>
                            <li>This box, like 99.99% of boxes, does not meow</li>
                        </ul>
                    </div>
                </div>

                <div id="product2" style="display: none">
                    <button class="close">&#10006;</button>

                    <div style="width: 45%; float: left">
                        <div class="image">
                            <img src="pics/monopoly.jpg" style="width: 260%; height: 240%">
                        </div>
                    </div>

                    <div style="float: left; margin-top: 3%; margin-left: 19%">
                        <h2 style="text-align: center">Monopoly</h2>
                        <h3 style="text-align: center">$17.99</h3>
                        <div style="text-align: center">
                            <form name="addProduct" method="post">
                                <button class="btn" type="submit" name="addProduct" value="2">Add to Cart</button>
                            </form>
                        </div>

                    </div>

                    <div class="imgInfo">
                        <ul>
                            <li>Monopoly is the fast-dealing property trading game that will have the whole family buying, selling and having a blast.</li>
                            <li>Featuring a speed die for a faster, more intense game of Monopoly.</li>
                            <li>For 2 to 8 players.</li>
                            <li>Includes gameboard, 8 tokens, 28 Title Deed cards, 16 Chance cards.</li>
                            <li>16 Community Chest cards, 1 pack of Monopoly money, 32 houses, 12 hotels, 2 dice, 1 speed die and instructions.</li>
                        </ul>
                    </div>
                </div>

                <div id="product3" style="display: none">
                    <button class="close">&#10006;</button>

                    <div style="width: 45%; float: left">
                        <div class="image">
                            <img src="pics/life.jpg" style="width: 260%; height: 240%">
                        </div>
                    </div>

                    <div style="float: left; margin-top: 3%; margin-left: 18%">
                        <h2 style="text-align: center">The Game of Life</h2>
                        <h3 style="text-align: center">$21.99</h3>
                        <div style="text-align: center">
                            <form name="addProduct" method="post">
                                <button class="btn" type="submit" name="addProduct" value="3">Add to Cart</button>
                            </form>
                        </div>
                    </div>

                    <div class="imgInfo">
                        <ul>
                            <li>The Game of Life is a classic game of chance.</li>
                            <li>Easy to set up and play.</li>
                            <li>Choose careers, financial moves and other choices.</li>
                            <li>Now with careers chosen by kids.</li>
                            <li>Includes game board with spinner, cards, Spin to Win tokens, cars, pegs, money pack and game guide.</li>
                        </ul>
                    </div>
                </div>

                <div id="product4" style="display: none">
                    <button class="close">&#10006;</button>

                    <div style="width: 45%; float: left">
                        <div class="image">
                            <img src="pics/candyland.gif" style="width: 260%; height: 240%">
                        </div>
                    </div>

                    <div style="float: left; margin-top: 3%; margin-left: 20%">
                        <h2 style="text-align: center">Candy Land</h2>
                        <h3 style="text-align: center">$12.99</h3>
                        <div style="text-align: center">
                            <form name="addProduct" method="post">
                                <button class="btn" type="submit" name="addProduct" value="4">Add to Cart</button>
                            </form>
                        </div>
                    </div>

                    <div class="imgInfo" style="padding-top: 32px; padding-bottom: 32px;">
                        <ul>
                            <li>Sweet version of the classic boardgame features a race to the castle.</li>
                            <li>You encounter all kinds of delicious surprises.</li>
                            <li>Includes gameboard, 4 pawns, card deck and instructions.</li>
                        </ul>
                    </div>
                </div>

                <div id="product5" style="display: none">
                    <button class="close">&#10006;</button>

                    <div style="width: 45%; float: left">
                        <div class="image">
                            <img src="pics/checkers.png" style="width: 300%; height: 280%">
                        </div>
                    </div>

                    <div style="float: left; margin-top: 3%; margin-left: 23%">
                        <h2 style="text-align: center">Checkers</h2>
                        <h3 style="text-align: center">$18.34</h3>
                        <div style="text-align: center">
                            <form name="addProduct" method="post">
                                <button class="btn" type="submit" name="addProduct" value="5">Add to Cart</button>
                            </form>
                        </div>
                    </div>

                    <div class="imgInfo" style="padding-top: 28px; padding-bottom: 28px;">
                        <ul>
                            <li>High Quality</li>
                            <li>Proprietary Design</li>
                            <li>Exceptional Performance</li>
                        </ul>
                    </div>
                </div>

                <div id="product6" style="display: none">
                    <button class="close">&#10006;</button>

                    <div style="width: 40%; float: left">
                        <div class="image">
                            <img src="pics/apples_to_apples.jpg" style="width: 180%; height: 160%">
                        </div>
                    </div>

                    <div style="float: left; margin-top: 3%; margin-left: 10%">
                        <h2 style="text-align: center">Apples to Apples Party Box</h2>
                        <h3 style="text-align: center">$19.99</h3>
                        <div style="text-align: center">
                            <form name="addProduct" method="post">
                                <button class="btn" type="submit" name="addProduct" value="6">Add to Cart</button>
                            </form>
                        </div>
                    </div>

                    <div class="imgInfo">
                        <ul>
                            <li>Apples to Apples is the game of hilarious comparisons.</li>
                            <li>It's as easy as comparing apples to apples; just open the box, deal the cards and you're ready to play.</li>
                            <li>Select the card from your hand that you think is best described by a card played by the judge.</li>
                            <li>Includes over 500 cards.</li>
                            <li>Each round is filled with surprising and outrageous comparisons from a wide range of people, places, things and events.</li>
                        </ul>
                    </div>
                </div>

                <div id="product7" style="display: none">
                    <button class="close">&#10006;</button>

                    <div style="width: 45%; float: left">
                        <div class="image" style="padding-left: 100px">
                            <img src="pics/uno.jpg" style="width: 190%; height: 170%">
                        </div>
                    </div>

                    <div style="float: left; margin-top: 3%; margin-left: 20%">
                        <h2 style="text-align: center">Uno</h2>
                        <h3 style="text-align: center">$9.99</h3>
                        <div style="text-align: center">
                            <form name="addProduct" method="post">
                                <button class="btn" type="submit" name="addProduct" value="7">Add to Cart</button>
                            </form>
                        </div>
                    </div>

                    <div class="imgInfo">
                        <ul>
                            <li>Four suits of 25 cards each, plus the eight Wild cards.</li>
                            <li>Earn points from other players when you go out first.</li>
                            <li>Reach 500 points to win the standard game.</li>
                            <li>Two-handed, partner, and tournament options for even more action.</li>
                            <li>Includes 108-card deck plus instructions and scoring rules.</li>
                        </ul>
                    </div>
                </div>

                <div id="product8" style="display: none">
                    <button class="close">&#10006;</button>

                    <div style="width: 45%; float: left">
                        <div class="image">
                            <img src="pics/bicycle_cards.jpg" style="width: 190%; height: 170%">
                        </div>
                    </div>

                    <div style="float: left; margin-top: 3%; margin-left: 2.5%">
                        <h2 style="text-align: center">Bicycle Rider Playing Cards</h2>
                        <h3 style="text-align: center">$3.99</h3>
                        <div style="text-align: center">
                            <form name="addProduct" method="post">
                                <button class="btn" type="submit" name="addProduct" value="8">Add to Cart</button>
                            </form>
                        </div>
                    </div>

                    <div class="imgInfo" style="padding-top: 20px; padding-bottom: 20px;">
                        <ul>
                            <li>Standard Size playing cards.</li>
                            <li>Features the 'Classic' Bicycle Rider Back.</li>
                            <li> Made in the USA.</li>
                        </ul>
                    </div>
                </div>

                <div id="product9" style="display: none">
                    <button class="close">&#10006;</button>

                    <div style="width: 40%; float: left">
                        <div class="image">
                            <img src="pics/sorry.jpg" style="width: 260%; height: 240%">
                        </div>
                    </div>

                    <div style="float: left; margin-top: 3%; margin-left: 26%">
                        <h2 style="text-align: center">Sorry</h2>
                        <h3 style="text-align: center">$19.99</h3>
                        <div style="text-align: center">
                            <form name="addProduct" method="post">
                                <button class="btn" type="submit" name="addProduct" value="9">Add to Cart</button>
                            </form>
                        </div>
                    </div>

                    <div class="imgInfo" style="padding-top: 22px; padding-bottom: 22px">
                        <ul>
                            <li>It's an edge-of-your-seat race to home, so hurry up and get there first.</li>
                            <li>Includes gameboard, 16 translucent pawns, deck of cards and instructions.</li>
                            <li>For 2 to 4 players.</li>
                            <li>Ages 6 and up.</li>
                        </ul>
                    </div>
                </div>

                <div id="product10" style="display: none">
                    <button class="close">&#10006;</button>

                    <div style="width: 45%; float: left">
                        <div class="image">
                            <img src="pics/chess.jpg" style="width: 300%; height: 280%">
                        </div>
                    </div>

                    <div style="float: left; margin-top: 3%; margin-left: 25%">
                        <h2 style="text-align: center">Chess</h2>
                        <h3 style="text-align: center">$12.99</h3>
                        <div style="text-align: center">
                            <form name="addProduct" method="post">
                                <button class="btn" type="submit" name="addProduct" value="10">Add to Cart</button>
                            </form>
                        </div>
                    </div>

                    <div class="imgInfo" style="padding-top: 10px; padding-bottom: 10px;">
                        <ul>
                            <li>Chess family classics edition</li>
                            <li>Features heavy-duty folding board</li>
                            <li>Solid staunton chess pieces</li>
                            <li>For 2 players</li>
                            <li>Ages 8 to adult</li>
                        </ul>
                    </div>
                </div>

                <div id="product11" style="display: none">
                    <button class="close">&#10006;</button>

                    <div style="width: 30%; float: left;">
                        <div class="image">
                            <img src="pics/connect4.jpg" style="width: 300%; height: 280%">
                        </div>
                    </div>

                    <div style="float: left; margin-top: 3%; margin-left: 33%">
                        <h2 style="text-align: center">Connect 4</h2>
                        <h3 style="text-align: center">$12.99</h3>
                        <div style="text-align: center">
                            <form name="addProduct" method="post">
                                <button class="btn" type="submit" name="addProduct" value="11">Add to Cart</button>
                            </form>
                        </div>
                    </div>

                    <div class="imgInfo" style="padding-top: 10px; padding-bottom: 10px;">
                        <ul>
                            <li>Classic Connect 4 game is disc-dropping fun</li>
                            <li>Choose yellow or red discs</li>
                            <li>When you get 4 discs in a row you win</li>
                            <li>Includes grid, 2 legs, slider bar, 21 red discs, 21 yellow discs and instructions</li>
                        </ul>
                    </div>
                </div>

                <div id="product12" style="display: none">
                    <button class="close">&#10006;</button>

                    <div style="width: 30%; float: left;">
                        <div class="image">
                            <img src="pics/pictionary.jpg" style="width: 300%; height: 280%">
                        </div>
                    </div>

                    <div style="float: left; margin-top: 3%; margin-left: 33%">
                        <h2 style="text-align: center">Pictionary</h2>
                        <h3 style="text-align: center">$24.99</h3>
                        <div style="text-align: center">
                            <form name="addProduct" method="post">
                                <button class="btn" type="submit" name="addProduct" value="12">Add to Cart</button>
                            </form>
                        </div>
                    </div>

                    <div class="imgInfo" style="padding-top: 7px; padding-bottom: 7px;">
                        <ul>
                            <li>The beloved game of quick sketches and hilarious guesses</li>
                            <li>Features a new board for faster game play</li>
                            <li>There are two levels of clues (1200 Adult, 800 Junior) so that everyone can play</li>
                            <li>It's a classic, family and kid favorite!</li>
                            <li>For 3 or more players</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <table align="center">
            <tr>
                <td><img id= "img1" src="pics/exploding_kittens.png" style="cursor: pointer"></td>
                <td><img id= "img2" src="pics/monopoly.jpg" style="cursor: pointer"></td>
                <td><img id= "img3" src="pics/life.jpg" style="cursor: pointer"></td>
                <td><img id= "img10" src="pics/chess.jpg" style="cursor: pointer"></td>
            </tr>
            <tr>
                <td class="description" valign="top"><h4 style="margin-top: 1px">Exploding Kittens</h4></td>
                <td class="description" valign="top"><h4 style="margin-top: 1px">Monopoly</h4></td>
                <td class="description" valign="top"><h4 style="margin-top: 1px">The Game of Life</h4></td>
                <td class="description" valign="top"><h4 style="margin-top: 1px">Chess</h4></td>
            </tr>
            <tr>
                <td><img id= "img4" src="pics/candyland.gif" style="cursor: pointer"></td>
                <td><img id= "img5" src="pics/checkers.png" style="cursor: pointer"></td>
                <td>
                    <div style="text-align: center">
                        <img id= "img6" src="pics/apples_to_apples.jpg" style="width: 130px; height:125px; cursor: pointer">
                    </div>
                </td>
                <td><img id= "img11" src="pics/connect4.jpg" style="cursor: pointer; width: 185px; height:125px;"></td>
            </tr>
            <tr>
                <td class="description" valign="top"><h4 style="margin-top: 1px">Candy Land</h4></td>
                <td class="description" valign="top"><h4 style="margin-top: 1px">Checkers</h4></td>
                <td class="description" valign="top"><h4 style="margin-top: 1px">Apples to Apples</h4></td>
                <td class="description" valign="top"><h4 style="margin-top: 1px">Connect 4</h4></td>
            </tr>
            <tr>
                <td><img id= "img7" src="pics/uno.jpg" style="width: 185px; height: 180px; cursor: pointer"></td>
                <td><img id= "img8" src="pics/bicycle_cards.jpg" style="width: 185px; height: 180px; cursor: pointer"></td>
                <td><img id= "img9" src="pics/sorry.jpg" style="cursor: pointer"></td>
                <td><img id= "img12" src="pics/pictionary.jpg" style="cursor: pointer; width: 185px; height:125px;"></td>
            </tr>
            <tr>
                <td class="description" valign="top"><h4 style="margin-top: 1px">Uno</h4></td>
                <td class="description" valign="top"><h4 style="margin-top: 1px">Bicycle Rider Playing Cards</h4></td>
                <td class="description" valign="top"><h4 style="margin-top: 1px">Sorry</h4></td>
                <td class="description" valign="top"><h4 style="margin-top: 1px">Pictionary</h4></td>
            </tr>
        </table>
    </div>
</div>
</body>
</html>