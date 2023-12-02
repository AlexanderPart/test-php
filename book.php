<?php 

/**
 * 
 * Vrátí všechny knihy z databáze
 * 
 * @param object $connection - připojení do databáze
 * 
 * @return array pole objektů, kde každý objekt je jedna kniha 
 */
function getAllBooks($connection, $columns = "*"){
    $sql = "SELECT $columns 
            FROM books";

    $result = mysqli_query($connection, $sql);
    
    if ($result === false) {
        echo mysqli_error($connection);
    } else {
        $allStudents = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $allStudents;    
    }
}

/**
 * 
 * Přidání knihy do databáze
 * 
 * @param object $connection - připojení do databáze
 * @param string $isbn - isbn kód
 * @param string $first_name - křestní jméno autora
 * @param string $second_name - příjmení autora
 * @param string $book_name - jméno knihy
 * 
 */
function createBook($connection, $isbn, $first_name, $second_name, $book_name, $description) {

    $sql = "INSERT INTO books (isbn, first_name, second_name, book_name, description) 
    VALUES (?, ?, ?, ?, ?)";

    $statement = mysqli_prepare($connection, $sql);

    if ($statement === false) {
        echo mysqli_error($connection);
    } else {
        mysqli_stmt_bind_param($statement, "issss", $isbn, $first_name, $second_name, $book_name, $description);

        if(mysqli_stmt_execute($statement)) {
            $id = mysqli_insert_id($connection);
            return $id;
        } else {
            echo mysqli_stmt_error($statement);
        }
    }
}

/**
 * 
 * Vrátí hledanou knihu z databáze
 * 
 * @param object $connection - připojení do databáze
 * @param string $isbn - isbn kód
 * @param string $first_name - křestní jméno autora
 * @param string $second_name - příjmení autora
 * @param string $book_name - jméno knihy
 * 
 * @return array pole objektů
 */
function getBook($connection, $isbn, $first_name, $second_name, $book_name){
    $sql = "SELECT *
            FROM books
            WHERE isbn = ? AND first_name = ? AND second_name = ? AND book_name = ?";

    $stmt = mysqli_prepare($connection, $sql);

    if ($stmt === false) {
        echo mysqli_error($connection);
    } else {
        mysqli_stmt_bind_param($stmt, "isss", $isbn, $first_name, $second_name, $book_name);

        if(mysqli_stmt_execute($stmt)) {
            $book = mysqli_stmt_get_result($stmt);
            return mysqli_fetch_array($book, MYSQLI_ASSOC);
        }
    }


}

