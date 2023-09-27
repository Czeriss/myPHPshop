Hi!

This is my first shop page. 

Using technology:

    -HTML;
    -CSS;
    -JavaScript (not much);
    -PHP;
    -MySQL;

class.book.php:

    constructor take: book ID, book name, book author, book price, books number, and name of a img file;
    all variables are private, to get value I use getFunction;
    function bulidBookSection -> result in the "main page book section"
    function bulidCheckoutSection -> result in the "checkout page book section"

index.php:

    starting session;
    if session->checkout is empty, it create new empty array
    include class.book.php
    include header.php

    connect with database:
        hostname - localhost
        username - root
        password - ""
        databasename - shop

    Select statement with select all books from books table

    execute query and use loop while all rows in query are bulid by class.book function

    if button checkout is set, than selected book id is append to session->checkout array

    include footer.php

search.php:

    do almost this same like index.php, but:

        if search button is click and search textfield is diffrent from null and return minimum 1 row from database then display all rows selected from database
        else select all rows from database
    
checkout.php:

    starting session;
    if session->checkout is empty, it create new empty array
    include class.book.php
    include header.php
    create variable with storage price of all products

    if session->checkout is empty, then display link to index page

    otherwise:

        (left side of the page)
        take unique values form session->checkout and assign to variable
        connect to database
        do foreach loop through all values from session->checkout variable:

            select a book's row form database and display it
            addthe book's price to global variable
        
    if delete button is click:
        
        then search id in array by value
        if id is found:

            unset the value and refresh the page

    (right side of the page)
    post form, with input for firstname, surname, address and city, display full price and submit button

    if submit is click:

        all inputs value is filtering
        all product's ID from checkout have become a string with ',' separatr
        taking current date
        connect with database
        insert into a orders table all taken data

        foreach loop by porduct id's and update data about numbers of books   

    display confirmation of complete order