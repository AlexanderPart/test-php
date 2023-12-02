<?php

    require "./database.php";
    require "./book.php";

    session_start();

    $connection = connectionDB();
    $books = getAllBooks($connection, "id, first_name, second_name, book_name");

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
            <h1 class="dddd">Přehled knih</h1>
        </section>

        <section class="books-list">
            <?php if(empty($books)): ?>
                <p>Žádné knihy nebyly nalezeny</p>
            <?php else: ?>
                <div class="allBooks">
                    <?php foreach($books as $one_book): ?>
                        <div class="one-book">
                            <h3 class="book-autor"><?php echo " <span class='spanAutor'>Autor:</span> " .htmlspecialchars($one_book["first_name"]). " " .htmlspecialchars($one_book["second_name"]) ?></h3>
                            <h3 class="book-name"><?php echo " <span class='spanBook'>Název knihy:</span> " .htmlspecialchars($one_book["book_name"])?> </h3>
                        </div>
                    <?php endforeach ?>
                </div>
            <?php endif ?>
        </section>
    </main>

    <?php require "./footer.php"; ?>
</body>
</html>