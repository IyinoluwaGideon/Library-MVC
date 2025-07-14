<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.phptutorial.net/app/css/style.css">
    <title>Addbook</title>
</head>
<style>
    .navbar {
        background-color: #4a90e2;
        color: #fff;
        padding: 15px 30px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .navbar .logo {
        font-size: 20px;
        font-weight: bold;
    }

    .navbar nav a {
        color: #fff;
        margin-left: 20px;
        text-decoration: none;
        font-size: 16px;
    }


    .footer {
        background-color: #4a90e2;
        color: #fff;
        text-align: center;
        padding: 15px 10px;
        font-size: 14px;
    }

    @media (max-width: 500px) {
        .navbar nav a {
            font-size: 14px;
            margin-left: 10px;
        }
    }
</style>

<body>
    <header class="navbar">
        <div class="logo">LibrarySystem</div>
        <nav>
            <a href="/dashboard">Home</a>
            <a href="/booklist">Books</a>
            <a href="logout">Logout</a>
        </nav>
    </header>
    <main>


        <?php if (isset($_SESSION['error'])): ?>
            <div class="alert alert-error"><?php echo $_SESSION['error'] ?></div>
            <?php unset($_SESSION['error']) ?>
        <?php endif ?>


        <form action="/addbook" method="post">
            <h1>Addbook</h1>
            <div>
                <label for="title">Title:</label>
                <input type="text" name="title" id="title" value="<?= $_SESSION['inputs']['title'] ?? '' ?>">
            </div>
            <div>
                <label for="author">Author:</label>
                <input type="text" name="author" id="author" value="<?= $_SESSION['inputs']['author'] ?? '' ?>">
            </div>
            <div>
                <label for="isbn">Isbn:</label>
                <input type="text" name="isbn" id="isbn" value="<?= $_SESSION['inputs']['isbn'] ?? '' ?>">
            </div>
            <div>
                <label for="publication_year">Publication_Year:</label>
                <input type="number" name="publication_year" id="publication_year" value="<?= $_SESSION['inputs']['publication_year'] ?? '' ?>">
            </div>
            <div>
                <label for="genre">Genre:</label>
                <input type="text" name="genre" id="genre" value="<?= $_SESSION['inputs']['genre'] ?? '' ?>">
            </div>
            <div>
                <label for="copies">Copies:</label>
                <input type="number" name="copies" id="copies" value="<?= $_SESSION['inputs']['copies'] ?? '' ?>">
            </div>
            <div>
                <label for="description">Description:</label>
                <input type="text" name="description" id="description" value="<?= $_SESSION['inputs']['description'] ?? '' ?>">
            </div>
            <section>
                <button type="submit">Addbook</button>
                <a href="/dashboard">Dashboard</a>
            </section>
        </form>
    </main>
</body>
<!-- Footer -->
<footer class="footer">
    &copy; 2025 Library Management System. All rights reserved.
</footer>

</html>