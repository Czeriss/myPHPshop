<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Shop</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php 
        include("header.html");
    ?>

    <div>
    <?php
        
        if(isset($_GET["Click"])){
        
            $name = $_GET["search"];
                    echo $name;}
        
    ?>
    </div>
    <?php
         include("footer.html"); 
    ?>
</body>


</html>