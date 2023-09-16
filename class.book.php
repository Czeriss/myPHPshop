<?php

class Book {

    public $bookID;
    public $bookName;
    public $bookCategoryName;
    public $bookAuthor;
    public $bookprice;
    public $booksNumber;
    public $bookImgName;
    public $bookAvailable;

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

                <h3> {} </h3>
                <h3> {} </h3>
                <img src = \"image\\{}\" alt=\"{}\" class=\"book_image\">
                <p class=\"little\"> {} </p>
                
        ";

        if($this -> booksNumber > 0){

            echo "
                
                <div class=\"inline\">
                
                    <span class=\"price\"> {} </span>

                    <form method=\"post\">

                        <button value=\"{}\" name=\"checkout\" class=\"add_checkout\">Add product to checkout</button>

                    </form>

                </div>

            </section>
            ";
        }

        else {

            echo "

                <p class=\"no_product\">This product is no available</p>

            </section>
            ";
        }
    }


}

?>