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
                
                }

                if(isset($_POST["delete"])) {

                    $key = array_search($_POST["delete"], $_SESSION["checkout"]);

                    if (false !== $key) {

                        unset($_SESSION["checkout"][$key]);
                        error_reporting(0);
                        header("Refresh:0");
                    }
                }

                echo '</article>';

                echo "
                
                    <article class=\"checkout_form\">

                        <form method=\"post\">

                            <label for=\"fisrtName\">First Name: </label>
                            <input type=\"text\" name=\"fisrtName\" required placeholder=\"Jhon\" maxlength=50> <br>

                            <label for=\"surName\">Surname: </label>
                            <input type=\"text\" name=\"surName\" required placeholder=\"Snow\" maxlength=50> <br>

                            <label for=\"address\">Address: </label>
                            <input type=\"text\" name=\"address\" required placeholder=\"First Street 15\"> <br>

                            <label for=\"city\">City: </label>
                            <input type=\"text\" name=\"city\" required placeholder=\"Warsaw\"> <br>

                            <button type=\"submit\" name=\"order_checkout\">Order products</button>
                        
                        </form>

                    </article>
                    
                    </main>";
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