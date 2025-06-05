<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.phptutorial.net/app/css/style.css">
    <title>Addbook</title>
</head>
<body>
<main>


<?php if (isset($_SESSION['error'])): ?>
        <div class="alert alert-error"><?php echo $_SESSION['error'] ?></div>
        <?php unset($_SESSION['error']) ?>
    <?php endif ?>

    
    <form action="/addbook" method="post">
        <h1>Addbook</h1>
        <div>
            <label for="title">Title:</label>
            <input type="text" name="title" id="title"  value="<?= $_SESSION['inputs']['title'] ?? ''?>">
        </div>
        <div>
            <label for="author">Author:</label>
            <input type="text" name="author" id="author" value="<?= $_SESSION['inputs']['author'] ?? ''?>">
        </div>
         <div>
            <label for="isbn">Isbn:</label>
            <input type="text" name="isbn" id="isbn" value="<?= $_SESSION['inputs']['isbn'] ?? ''?>">
        </div>
         <div>
            <label for="publication_year">Publication_Year:</label>
            <input type="number" name="publication_year" id="publication_year" value="<?= $_SESSION['inputs']['publication_year'] ?? ''?>">
        </div>
         <div>
            <label for="genre">Genre:</label>
            <input type="text" name="genre" id="genre"  value="<?= $_SESSION['inputs']['genre'] ?? ''?>">
        </div>
         <div>
            <label for="copies">Copies:</label>
            <input type="number" name="copies" id="copies"  value="<?= $_SESSION['inputs']['copies'] ?? ''?>">
        </div>
         <div>
            <label for="description">Description:</label>
            <input type="text" name="description" id="description"  value="<?= $_SESSION['inputs']['description'] ?? ''?>">
        </div>
        <section>
            <button type="submit">Addbook</button>
            <a href="/dashboard">Dashboard</a>
        </section>
    </form>
</main>
</body>
</html>

