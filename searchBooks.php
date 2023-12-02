<?php

    require "./database.php";
    require "./book.php";

    session_start();

    $author = "";
    $one_book = "";
    $message = "";
    $message_two = "";

    if($_SERVER["REQUEST_METHOD"] === "POST") {

        $connection = connectionDB();

        $isbn = $_POST["isbn"];
        $first_name = $_POST["first_name"];
        $second_name = $_POST["second_name"];
        $book_name = $_POST["book_name"];

        $book = getBook($connection, $isbn, $first_name, $second_name, $book_name);

        if(empty($book)) {
            $message_two = "Žádné knihy nebyly nalezeny...";
        } else {

            $author = " <span class='spanAutor'>Autor:</span> " .htmlspecialchars($book["first_name"]). " " .htmlspecialchars($book["second_name"]);
            $one_book = " <span class='spanBook'>Název knihy:</span> " .htmlspecialchars($book["book_name"]);

            $message = "Nalezené knihy:";
        }
    } 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php 
        require "menu.php";
    ?>

    <main>
        <section class="main-heading">
            <h1>Hledání knih...</h1>
            <form action="" method="POST">
                <input type="text" name="isbn" class="isbn" placeholder="ISBN kód"><br>
                <input type="text" name="first_name"  class="first_name" placeholder="Křestní jméno autora"><br>
                <input type="text" name="second_name" class="second_name" placeholder="Příjmení autora"><br>
                <input type="text" name="book_name" class="book_name" placeholder="Název knihy"><br>
                <input type="submit" class="searchBookBtn" value="Vyhledat knihu">
            </form>
        </section>

        <section class="main-heading1">
            <h1><?php echo $message ?></h1>
            <h1><?php echo $message_two ?></h1>
        </section>

        <section class="books-list one-book">

                <h3 class="book-autor"><?php echo $author ?></h3>
                <h3 class="book-name"><?php echo $one_book ?></h3>

        </section>

    </main>

    <?php require "./footer.php"; ?>
</body>
</html>

