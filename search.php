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
    <title>Book Shop</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">

</head>
<body>
    
    <header>
        <?php include_once("header.php"); ?>
    </header>
        
    <main>

        <?php

            $db = mysqli_connect("localhost", "root", "", "shop");

            if(isset($_GET["search_click"])){

                $search = filter_var($_GET["search"], FILTER_SANITIZE_STRING);
                $question = "SELECT `books`.`ID`, `books`.`Name`, `categoty`.`Name`, `Author`, `Price`, `Number`, `Img_Name` FROM `books` INNER JOIN `categoty` ON `Category` = `categoty`.`ID` WHERE `books`.`Name` LIKE \"%$search%\" OR `categoty`.`Name` LIKE \"%$search%\" OR `Author` LIKE \"%$search%\" ORDER BY `books`.`ID` ASC";
                $query = mysqli_query($db, $question);

                if($query -> num_rows){

                    while($answer =  mysqli_fetch_row($query)) {

                        $book = new Book($answer[0], $answer[1], $answer[2], $answer[3], $answer[4], $answer[5], $answer[6]);
                        $book -> bulidBookSection();
                    }
                    
                    return;
                }
                
                $question = "SELECT `books`.`ID`, `books`.`Name`, `categoty`.`Name`, `Author`, `Price`, `Number`, `Img_Name` FROM `books` INNER JOIN `categoty` ON `Category` = `categoty`.`ID` ORDER BY `books`.`ID` ASC";
                $query = mysqli_query($db, $question);

                while($answer =  mysqli_fetch_row($query)) {

                    $book = new Book($answer[0], $answer[1], $answer[2], $answer[3], $answer[4], $answer[5], $answer[6]);
                    $book -> bulidBookSection();
                }
            }

            mysqli_close($db);

        ?>

    </main>
    
    <footer>
        <?php include_once("footer.php"); ?>
    </footer>

</body>
</html>