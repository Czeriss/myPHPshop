<?php

    session_start();

    include "class.book.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">

</head>
<body>

    <header>
        <?php include_once 'header.php'; ?>
    </header>

    <main>

        <?php
        $db = mysqli_connect("localhost", "root", "", "shop");

        $checkoutProduct = array_unique($_SESSION["checkout"]);

        foreach ($checkoutProduct as $product) {
        

            $question = "SELECT `books`.`ID`, `books`.`Name`, `categoty`.`Name`, `Author`, `Price`,  `Number`, `Img_Name` FROM `books` INNER JOIN `categoty` ON `Category` = `categoty`.`ID` WHERE `books`.`ID` = {$product}";
            
            $query = mysqli_query($db, $question);

            $answer =  mysqli_fetch_row($query);

            $book = new Book($answer[0], $answer[1], $answer[2], $answer[3], $answer[4], $answer[5], $answer[6]);

            $book -> bulidCheckoutSection();
        
        }
        ?>
    </main>
  
    <footer>

        <?php include_once 'footer.php'; ?>

    </footer>

</body>
</html>