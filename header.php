<?php 

    echo '
    
        <link rel="stylesheet" type="text/css" href="css/header.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@1,300&display=swap" rel="stylesheet">

        <nav>

            <a href="http://localhost/web/" class="main_site"><h1>BookShop</h1></a>
            
            <form action="search.php" method="get" class="form_search">
                
                <input type="text" name="search" placeholder="Write here anything what you are looking" maxlength="100" class="search text_search">
                <input type="submit" value="Search" name="search_click" class="search submit_search"> 
                
            </form>
            
            <a href="checkout.php"><img src="https://cdn.pixabay.com/photo/2021/11/05/00/19/shopping-6769726_1280.png" alt="checkout" class="icon"></a>

        </nav>
    
    ';

?>