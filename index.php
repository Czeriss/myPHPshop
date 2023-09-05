<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Shop</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>

    <div>
        <?php 
            include("header.html");
        ?>
    </div>

    <main>

    <?php
        
        $question = "SELECT `books`.`ID`, `books`.`Name`, `categoty`.`Name`, `Author`, `Price`,  `Number`, `Img_Name` FROM `books` INNER JOIN `categoty` ON `Category` = `categoty`.`ID` LIMIT 8";
        $db = mysqli_connect("localhost", "root", "", "shop");

        $query = mysqli_query($db, $question);

        while($answer =  mysqli_fetch_row($query)){

            echo "
            
                <div class=\"book\">

                    <h3> {$answer[1]} </h3>
                    <h3> {$answer[2]} </h3>
                    <img src = \"image\\{$answer[6]}\" alt=\"{$answer[1]}\" class=\"book_image\">
                    <p class=\"little\"> {$answer[3]} </p>
                    
            ";

            if($answer[5] > 0){

                echo "
                
                    <div class=\"inline\">
                    
                        <span class=\"price\"> {$answer[4]}$ </span>

                        <form action=\"index.php\" method=\"post\">

                            <button type=\"submit\" value=\"{$answer[0]}\" name=\"checkout\" class=\"add_checkout\" > Add product to checkout </button>

                        </form>

                    </div>
                ";
            }

            else{
                
                echo "<p class=\"no_product\"> This product is no available </p>";
            }
            
            echo "</div>";
        }

        if(isset($_POST["checkout"])){

            hi($_POST["checkout"]);
        }
        
        function hi($value){

            echo "<script>
                alert(\"You add somethig to checkout {$value}\");
                </script>
            ";
        }

        
    ?>

    </main>
    <div>
        <?php
            include("footer.html"); 
        ?>
    </div>
</body>


</html>