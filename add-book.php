<form method="POST">
        <input  type="text" 
            name="isbn" 
            placeholder="ISBN kód"
            value="<?= htmlspecialchars($isbn)  ?>"
            required
    ><br>

    <input  type="text" 
            name="first_name" 
            placeholder="Křestní jméno autora" 
            value="<?= htmlspecialchars($first_name)  ?>"
            required
    ><br>

    <input  type="text" 
            name="second_name" 
            placeholder="Příjmení autora"
            value="<?= htmlspecialchars($second_name) ?>" 
            required
    ><br>

    <input  type="text" 
            name="book_name" 
            placeholder="Název knihy"
            value="<?= htmlspecialchars($book_name) ?>" 
            required
    ><br>

    <textarea   name="description" 
                placeholder="Popis knihy..." 
                required><?= htmlspecialchars($description) ?></textarea><br>

    <input type="submit" value="Uložit">
</form>