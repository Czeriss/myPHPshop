<?php

    session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

    <?php

        include("header.html");


    echo "<main>";

    $db = mysqli_connect("localhost", "root", "", "shop");

    $checkoutProduct = array_unique($_SESSION["checkout"]);

    foreach ($checkoutProduct as $product) {
    

        $question = "SELECT `books`.`ID`, `books`.`Name`, `categoty`.`Name`, `Author`, `Price`,  `Number`, `Img_Name` FROM `books` INNER JOIN `categoty` ON `Category` = `categoty`.`ID` WHERE `books`.`ID` = {$product}";
        
        $query = mysqli_query($db, $question);

        $answer =  mysqli_fetch_row($query);
        echo "
            
        <section class=\"book_chekout\">

            <div class=\"picture\">

                <img src = \"image\\{$answer[6]}\" alt=\"{$answer[1]}\" class=\"book_image_checkout\">
            
            </div>
            
            <div class=\"header_checkout\">

                <h3 class=\"title\"> {$answer[1]} </h3>
                <button type=\"button\" value=\"{$answer[0]}\" onClick=\"delate()\" class=\"delate_button\"> <img src=\"https://cdn.pixabay.com/photo/2014/03/24/13/41/trashcan-293989_1280.png\" alt=\"Delete\" class=\"delate_icon\"> </button>
                
            </div> 

            <div class=\"text\">

                <span class=\"little_checkout\"> {$answer[2]} </span>
                <p class=\"little_checkout\"> {$answer[3]} </p>
                <span class=\"price\">{$answer[4]}</span>
            
            </div>

        </section>
            
    ";
    
    }

    echo "</main>";
   
        include("footer.html");

    ?>

</body>
</html>