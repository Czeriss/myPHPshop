<?php

    session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Shop</title>
    <link rel="stylesheet" type="text/css" href="style.css">

</head>

<body>
    

        
<header>

<link rel="stylesheet" href="header.css">

<nav>

    <img src="https://cdn.pixabay.com/photo/2013/07/12/18/36/pencil-153561_1280.png" alt="There should be my logo" class="icon" title="This is my logo">
    
    <form action="index.php" method="get" class="form_search">
        
        <input type="text" name="search" placeholder="Write here anything what you are looking" maxlength="100" class="text_search">
        <input type="submit" value="Search" name="Click" class="submit_search"> 
        
    </form>
    
    <a href="checkout.php"><img src="https://cdn.pixabay.com/photo/2021/11/05/00/19/shopping-6769726_1280.png" alt="checkout" class="icon"></a>
    
</nav>

</header>
        
        <main>
           <?php
        $question = "SELECT `books`.`ID`, `books`.`Name`, `categoty`.`Name`, `Author`, `Price`,  `Number`, `Img_Name` FROM `books` INNER JOIN `categoty` ON `Category` = `categoty`.`ID` LIMIT 8";
        $db = mysqli_connect("localhost", "root", "", "shop");

        $query = mysqli_query($db, $question);

        while($answer =  mysqli_fetch_row($query)) {

            echo "
            
                <div class=\"book\">

                    <h3> {$answer[1]} </h3>
                    <h3> {$answer[2]} </h3>
                    <img src = \"image\\{$answer[6]}\" alt=\"{$answer[1]}\" class=\"book_image\">
                    <p class=\"little\"> {$answer[3]} </p>
                    
            ";
            
            if($answer[5] > 0) {

                echo "
                
                    <div class=\"inline\">
                    
                        <span class=\"price\"> {$answer[4]}$ </span>

                        <form method=\"post\">

                            <button type=\"submit\" value=\"{$answer[0]}\" name=\"checkout\" class=\"add_checkout\"> Add product to checkout </button>

                        </form>

                    </div>
                ";
            }
            else {
                
                echo '<p class="no_product"> This product is no available </p>';
            }
            
            echo "</div>";
        }
        
        if(isset($_POST["checkout"])){

            hi($_POST["checkout"]);

            array_push($_SESSION["checkout"], $_POST["checkout"]);
        }
        
        function hi($value){

            echo "<script>
                alert(\"You add somethig to checkout {$value}\");
                </script>
            ";
        }

        

    echo "</main>";

        include("footer.html");
        
        foreach ($_SESSION["checkout"] as $x)
            echo $x;
    ?>

</body>

</html>