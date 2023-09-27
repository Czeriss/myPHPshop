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

            if(isset($_GET["search_click"])) {

                $search = filter_var($_GET["search"], FILTER_SANITIZE_STRING);
                $question = "SELECT `books`.`ID`, `books`.`Name`, `categoty`.`Name`, `Author`, `Price`, `Number`, `Img_Name` FROM `books` INNER JOIN `categoty` ON `Category` = `categoty`.`ID` WHERE `books`.`Name` LIKE \"%$search%\" OR `categoty`.`Name` LIKE \"%$search%\" OR `Author` LIKE \"%$search%\" ORDER BY `books`.`ID` ASC";
                $query = mysqli_query($db, $question);

                if($query -> num_rows > 0){

                    while($answer =  mysqli_fetch_row($query)) {

                        bulidSection($answer);
                    }
                }

                else {

                    SelectAll($db);
                }
            }

            else {
                
                SelectAll($db);
            }

            mysqli_close($db);


            function SelectAll($database) {

                $question = "SELECT `books`.`ID`, `books`.`Name`, `categoty`.`Name`, `Author`, `Price`, `Number`, `Img_Name` FROM `books` INNER JOIN `categoty` ON `Category` = `categoty`.`ID` ORDER BY `books`.`ID` ASC";
                $query = mysqli_query($database, $question);
    
                while($answer =  mysqli_fetch_row($query)) {
    
                    bulidSection($answer);
                }
            }

            function bulidSection($array) {

                $book = new Book($array[0], $array[1], $array[2], $array[3], $array[4], $array[5], $array[6]);
                $book -> bulidBookSection();
            }

        ?>

    </main>
    
    <footer>
        <?php include_once("footer.php"); ?>
    </footer>

</body>
</html>