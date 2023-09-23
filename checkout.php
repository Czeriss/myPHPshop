<?php
    session_start();

    if(empty($_SESSION["checkout"]))
        $_SESSION["checkout"] = array();
    
    include("class.book.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/checkout.css">

</head>
<body>

    <header>
        <?php include_once("header.php"); ?>
    </header>

        <?php

            $fullPrice = 0;

            if(!empty($_SESSION["checkout"])) {

                echo '

                    <main>

                    <article class="product">';

                $checkoutProduct = array_unique($_SESSION["checkout"]);

                $db = mysqli_connect("localhost", "root", "", "shop");

                foreach($checkoutProduct as $product) {
                
                    $question = "SELECT `books`.`ID`, `books`.`Name`, `categoty`.`Name`, `Author`, `Price`,  `Number`, `Img_Name` FROM `books` INNER JOIN `categoty` ON `Category` = `categoty`.`ID` WHERE `books`.`ID` = {$product}";
                    $query = mysqli_query($db, $question);
                    $answer =  mysqli_fetch_row($query);
                    $book = new Book($answer[0], $answer[1], $answer[2], $answer[3], $answer[4], $answer[5], $answer[6]);
                    $book -> bulidCheckoutSection();

                    $fullPrice += $book->getBookPirce();
                
                }

                mysqli_close($db);

                if(isset($_POST["delete"])) {

                    $key = array_search($_POST["delete"], $_SESSION["checkout"]);

                    if (false !== $key) {

                        unset($_SESSION["checkout"][$key]);
                        echo("<meta http-equiv='refresh' content='0'>");
                    }
                    
                }

                echo '</article>';

                echo "
                
                    <article class=\"checkout_form\">

                        <form method=\"post\">

                            <label for=\"fisrtName\">First Name: </label>
                            <input type=\"text\" name=\"fisrtName\" required maxlength=50> <br>

                            <label for=\"surname\">Surname: </label>
                            <input type=\"text\" name=\"surname\" required maxlength=50> <br>

                            <label for=\"address\">Address: </label>
                            <input type=\"text\" name=\"address\" required > <br>

                            <label for=\"city\">City: </label>
                            <input type=\"text\" name=\"city\" required > <br>

                            <hr>

                            <span class=\"price\"> Full price: $fullPrice</span>
                            <input type=\"submit\" name=\"order_checkout\" value=\"Order products\">
                        
                        </form>
                        
                    </article>
                    
                    </main>";

                if(isset($_POST["order_checkout"])){

                    $firstName = filter_var($_POST["fisrtName"], FILTER_SANITIZE_STRING);
                    $surname = filter_var($_POST["surname"], FILTER_SANITIZE_STRING);
                    $address = filter_var($_POST["address"], FILTER_SANITIZE_STRING);
                    $city = filter_var($_POST["city"], FILTER_SANITIZE_STRING);

                    $orderedID = implode(", ",$checkoutProduct);
                    $date = date("Y-m-d H:i:s");

                    $db = mysqli_connect("localhost", "root", "", "shop");

                    $question = "INSERT INTO `orders` (`Ordered_ID`, `FirstName`, `Surname`, `Address`, `City`, `Price`, `Date`) VALUES ( \"$orderedID\", \"$firstName\", \"$surname\", \"$address\", \"$city\", $fullPrice, \"$date\")";
                
                    mysqli_query($db, $question);

                    foreach($checkoutProduct as $product) {

                        $query = mysqli_query($db, "SELECT `Number` FROM `books` WHERE `ID` = $product");

                        $productNumber = mysqli_fetch_row($query);
                        $productNumber = array_pop($productNumber);

                        $productNumber -= 1;

                        mysqli_query($db, "UPDATE `books` SET `Number`= $productNumber WHERE `ID` = $product");
                    }

                    mysqli_close($db);

                    unset($_SESSION["checkout"]);
                
                ?>

                    <script>

                        let articles = document.querySelectorAll("article");

                        articles.forEach(displayNone);

                        function displayNone(article) {

                            article.style.display = "none";
                        }

                    </script>

                <?php 
                
                echo "<h2 class=\"order_complete\"> Your order is complete. Thank for ordered something in my shop!</h2>";

                }

            }
            
            else {
                echo '<a href="http://localhost/web/" class="main_site"><h2 class="no_product_checkout">Please add somethig to checkout!</h2></a>';
            }
            
        ?>

    <footer>
        <?php include_once("footer.php"); ?>
    </footer>

</body>
</html>