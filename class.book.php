<?php

class Book {

    private $bookID;
    private $bookName;
    private $bookCategoryName;
    private $bookAuthor;
    private $bookprice;
    private $booksNumber;
    private  $bookImgName;

    public function __construct($ID, $name, $categoryName, $author, $price, $number, $imgName) {

        $this -> bookID = $ID;
        $this -> bookName = $name;
        $this -> bookCategoryName = $categoryName;
        $this -> bookAuthor = $author;
        $this -> bookprice = $price;
        $this -> booksNumber = $number;
        $this -> bookImgName = $imgName;
    }

    public function getID() {
        return $this -> bookID;
    }

    public function getBookName() {
        return $this -> bookName;
    }

    public function getBookCategoryName() {
        return $this -> bookCategoryName;
    }

    public function getBookAuthor() {
        return $this -> bookAuthor;
    }

    public function getBookPirce() {
        return $this -> bookprice;
    }

    public function getBooksNumber() {
        return $this -> booksNumber;
    }

    public function getBookNameImg() {
        return $this -> bookImgName;
    }

    public function bulidBookSection() {

        echo "
            
            <section class=\"book\">

                <h3> {$this -> getBookName()} </h3>
                <h3> {$this -> getBookCategoryName()} </h3>
                <img src = \"image\\{$this -> getBookNameImg()}\" alt=\"{$this -> getBookName()}\" class=\"book_image\">
                <p class=\"little\"> {$this -> getBookAuthor()} </p>
                
        ";

        if($this -> getBooksNumber() > 0){

            echo "
                
                <div class=\"inline\">
                
                    <span class=\"price\"> {$this -> getBookPirce()} </span>

                    <form method=\"post\">

                        <button type=\"submit\" value=\"{$this -> getID()}\" name=\"checkout\" class=\"add_checkout\">Add product to checkout</button>

                    </form>

                </div>

            </section>
            ";
        }

        else {

            echo '

                <p class="no_product">This product is no available</p>

            </section>
            ';
        }
    }

    public function bulidCheckoutSection() {

        echo "
            
            <section class=\"book_chekout\">

                <div class=\"picture\">
                
                    <img src = \"image\\{$this -> getBookNameImg()}\" alt=\"{$this -> getBookName()}\" class=\"book_image_checkout\">
                
                </div>

                <div class=\"header_checkout\">

                    <h3 class=\"title\"> {$this -> getBookName()} </h3>

                    <form method=\"post\">
                        <button type=\"submit\" value=\"{$this -> getID()}\" name=\"delete\" class=\"delete_button\"> <img src=\"https://cdn.pixabay.com/photo/2014/03/24/13/41/trashcan-293989_1280.png\" alt=\"Delete\" class=\"delete_icon\"> </button>
                    </form>

                </div>


                <div class=\"text\">

                    <span class=\"little_checkout\"> {$this -> getBookCategoryName()} </span>
                    <span class=\"little_checkout\"> {$this -> getBookAuthor()} </span>
                    <span class=\"price\">{$this -> getBookPirce()}</span>

                </div>

            </section>
        ";
    }

}

?>