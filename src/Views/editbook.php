<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.phptutorial.net/app/css/style.css">
    <title>Book</title>
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
        <?php if (isset($_SESSION['success'])): ?>
            <div class="alert alert-success"><?= $_SESSION['success'] ?></div>
            <?php unset($_SESSION['success']) ?>
        <?php endif ?>

        <?php if (isset($_SESSION['error'])): ?>
            <div class="alert alert-error"><?= $_SESSION['error'] ?></div>
            <?php unset($_SESSION['error']) ?>
        <?php endif ?>

        <form action="/editbook?book_id=<?= $_GET['book_id'] ?>" method="post">
            <h1>Edit Book</h1>
            <div>
                <label for="author">Author:</label>
                <input type="text" name="author" id="author" value="<?= $_GET['author'] ?? '' ?>">
            </div>
            <div>
                <label for="genre">Genre:</label>
                <input type="text" name="genre" id="genre" value="<?= $_GET['genre'] ?? '' ?>">
            </div>
            <div>
                <label for="copies">Copies:</label>
                <input type="number" name="copies" id="copies" value="<?= $_GET['copies'] ?? '' ?>">
            </div>
            <div>
                <label for="description">Description:</label>
                <input type="text" name="description" id="description" value="<?= $_GET['description'] ?? '' ?>">
            </div>
            <section>
                <button type="submit">Edit</button>
                <a href="/booklist">Booklist</a>
            </section>
        </form>
    </main>
</body>
<!-- Footer -->
<footer class="footer">
    &copy; 2025 Library Management System. All rights reserved.
</footer>

</html>