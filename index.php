<?php 

require "./database.php";
require "./url.php";
require "./book.php";

session_start();

$isbn = null;
$first_name = null;
$second_name = null;
$book_name = null;
$description = null;

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $isbn = $_POST["isbn"];
    $first_name = $_POST["first_name"];
    $second_name = $_POST["second_name"];
    $book_name = $_POST["book_name"];
    $description = $_POST["description"];

    $connection = connectionDB();
    
    $id = createBook($connection, $isbn, $first_name, $second_name, $book_name, $description);

    if($id){
        redirectUrl("/allBooks.php");
    } else {
        echo "Kniha nebyla vytvořena";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php 
        require "menu.php";
    ?>

    <main>
        <section class="add-form">

            <?php require "./add-book.php"; ?>

        </section>
    </main>

    <?php
        require "footer.php"
    ?>
</body>
</html>
