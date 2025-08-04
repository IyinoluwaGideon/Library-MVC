<!-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.phptutorial.net/app/css/style.css">
    <title>Book</title>
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

        .buttons {
            color: rgba(102, 97, 240, 0.67);
        }

        .buttons:hover {
            color: rgb(93, 41, 190)
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border: 1px solid #ddd;
            /* Ensure border around the table */
        }

        th,
        td {
            padding: 12px 15px;
            text-align: left;
            border: 1px solid #ddd;
            /* Ensure borders around cells */
        }

        th {
            background-color: #6f42c1;
            color: white;
            font-weight: bold;
        }

        td {
            background-color: #f9f9f9;
        }

        tr:nth-child(even) td {
            background-color: #f1f1f1;
        }

        tr:hover td {
            background-color: #eaeaea;
        }

        .round-button {
            display: inline-block;
            padding: 4px 10px;
            background-color: transparent;
            color: #6f42c1;
            text-decoration: none;
            border: 2px solid #6f42c1;
            border-radius: 25px;
            font-weight: bold;
            transition: 0.3s;
        }

        .round-button:hover {
            background-color: #6f42c1;
            color: white;
        }

        .small-round-button {
            display: inline-block;
            margin: 4px;
            padding: 4px 8px;
            background-color: transparent;
            color: #6f42c1;
            text-decoration: none;
            border: 1px solid #6f42c1;
            border-radius: 15px;
            font-weight: bold;
            font-size: small;
            transition: 0.3s;
        }

        .small-round-button:hover {
            background-color: rgb(201, 145, 60);
            color: white;
        }

        .booklist {
            display: flex;
            flex-wrap: wrap;
            max-width: 70%;
        }

        .booklist>div {
            width: 30%;
            margin: 1%;
            box-sizing: border-box;
        }

        .booklist p {
            color: #111111;
            font-weight: bold;
        }

        .image-item {
            display: flex;
            justify-content: space-between;
        }

        .book-image {
            width: 100%;
            height: 80%;
        }

        .container {
            display: flex;
            align-items: center;
            justify-content: center;
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
</head>

<body>
    <header class="navbar">
        <div class="logo">LibrarySystem</div>
        <nav>
            <a href="#"></a>
            <a href="#"></a>
            <a href="/dashboard">Home</a>
        </nav>
    </header>
    <main>
        <?php if (isset($_SESSION['success'])): ?>
            <div class="alert alert-success"><?= $_SESSION['success'] ?></div>
           
        <?php endif ?>

        <?php if (isset($_SESSION['error'])): ?>
            <div class="alert alert-error"><?= $_SESSION['error'] ?></div>
            
        <?php endif ?>
         <?php if (isset($_SESSION['warning'])): ?>
            <div class="alert alert-warning"><?= $_SESSION['warning'] ?></div>
           
        <?php endif ?>




        <div class="container">
            <div>
                <p>
                <h1><strong>LIB</strong></h1>
                </p>
                <p><strong>Welcome To HRF Library </strong></p>

                <h4>List of Books in the Library</h4>
                <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin'): ?>
                    <p style="display: inline;"><a href="/addbook" class="round-button">Addbook</a></p>
                <?php endif; ?>

                <p style="display: inline;"><a href="/dashboard" class="round-button">Back</a></p>

            </div>
        </div>

       
        <table>
            <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'user'): ?>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Book Details</th>
                    <th>Borrow Book</th>
                    <th>Cancle Borrow</th>
                </tr>
            <?php endif ?>
            <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin'): ?>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Book Details</th>
                    <th>Edit Book</th>
                    <th>Delete Book</th>
                </tr>
            <?php endif ?>
            <?php foreach ($books as $key => $book) : ?>
                <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'user'): ?>
                    <tr>
                        <td><?= $book['book_id'] ?></td>
                        <td><?= $book['title'] ?></td>
                        <td><?= $book['author'] ?></td>
                        <td>
                            <p style="display: inline;"><a href="/bookdetail?book_id=<?= $book['book_id'] ?>" class="buttons">View Details</a></p>
                        </td>
                        <td>
                            <p style="display: inline;"><a href="/borrow?user_id=<?= $_SESSION["user_id"] ?>&book_id=<?= $book['book_id'] ?>" class="round-button">Borrow</a></p>
                        </td>
                        <td>
                            <p style="display: inline;"><a href="/deleteBookBorrowDetails?book_id=<?= $book['book_id'] ?>&user_id=<?= $_SESSION["user_id"] ?>" class="round-button">Cancle Borrow</a></p>
                        </td>
                    </tr>
                <?php endif ?>

            <?php endforeach ?>
            <?php foreach ($books as $key => $book) : ?>
                <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin'): ?>
                    <tr>
                        <td><?= $book['book_id'] ?></td>
                        <td><?= $book['title'] ?></td>
                        <td><?= $book['author'] ?></td>
                        <td>
                            <p style="display: inline;"><a href="/bookdetail?book_id=<?= $book['book_id'] ?>" class="buttons">View Details</a></p>
                        </td>
                        <td>

                            <p style="display: inline;"><a href="/editbook?book_id=<?= $book['book_id'] ?>&author=<?= $book['author'] ?>&genre=<?= $book['genre'] ?>&copies=<?= $book['copies'] ?>&description=<?= $book['description'] ?>" class="round-button">Edit Book</a></p>
                        </td>
                        <td>
                            <p style="display: inline;"><a href="/deletebook?book_id=<?= $book['book_id'] ?>&user_id=<?= $_SESSION["user_id"] ?>" class="round-button">Delete Book</a></p>
                        </td>
                    </tr>
                <?php endif ?>
            <?php endforeach ?>

        </table>
    </main>
    <footer class="footer">
        &copy; 2025 Library Management System. All rights reserved.
    </footer>
</body>
</html> -->



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.phptutorial.net/app/css/style.css">
    <title>Book</title>
    <style>
        .alert {
            padding: 12px 20px;
            margin-bottom: 15px;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 500;
            width: 90%;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
            text-align: center;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        /* Error = red */
        .alert-error {
            background-color: #f8d7da;
            color: #842029;
            border: 1px solid #f5c2c7;
        }

        /* Success = green */
        .alert-success {
            background-color: #d1e7dd;
            color: #0f5132;
            border: 1px solid #badbcc;
        }

        /* Warning = yellow/orange */
        .alert-warning {
            background-color: #fff3cd;
            color: #664d03;
            border: 1px solid #ffecb5;
        }


        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(to right, #f0f4ff, #e9efff);
            margin: 0;
            padding: 0;
        }

        .top-buttons {
            display: flex;
            justify-content: space-between;
            padding: 20px 30px 0 30px;
            align-items: center;
        }

        .addbook-btn,
        .back-btn {
            background-color: #4a90e2;
            color: white;
            padding: 10px 20px;
            border-radius: 25px;
            text-decoration: none;
            font-size: 16px;
            font-weight: 500;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        .addbook-btn:hover,
        .back-btn:hover {
            background-color: #3c7fd4;
            transform: translateY(-2px);
        }


        .search-container {
            display: flex;
            justify-content: center;
            /* centers it horizontally */
            margin-bottom: 20px;
        }

        .search-form {
            display: flex;
            gap: 8px;
        }

        .search-form input {
            padding: 8px;
            border-radius: 15px;
            border: 1px solid #ccc;
            width: 300px;
        }

        .search-form button {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 8px 12px;
            border-radius: 15px;
            cursor: pointer;
        }


        body {
            margin: 0;
            font-family: 'Segoe UI', sans-serif;
            background-color: #f5f7fa;
        }

        .navbar {
            background-color: #4a90e2;
            color: #fff;
            padding: 15px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navbar .logo {
            font-weight: bold;
            font-size: 20px;
        }

        .navbar nav a {
            color: white;
            margin-left: 20px;
            text-decoration: none;
        }

        .book-section {
            padding: 20px 30px;
        }

        .book-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            /* allows more books per row */
            gap: 40px;
            /* relaxed space between books */
            padding: 10px 40px;
            /* space around the grid */
            justify-items: center;
        }


        .book-card {
            width: 100%;
            max-width: 200px;
            padding: 15px;
            border-radius: 15px;
            background-color: rgba(254, 253, 253, 1);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .book-image {
            width: 100%;
            /* Fit the container */
            max-height: 250px;
            /* Prevent it from becoming too tall */
            object-fit: cover;
            /* Crop the image to fill without distortion */
            border-radius: 10px;
            /* Rounded corners for nice aesthetics */
            display: block;
            /* Prevent inline image spacing issues */
        }


        .edit-btn,
        .delete-btn {
            margin: 5px;
            padding: 5px 10px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
        }

        .edit-btn {
            background-color: #007bff;
            color: #fff;
        }

        .delete-btn {
            background-color: #dc3545;
            color: #fff;
            text-decoration: none;
        }



        .book-title {
            font-weight: bold;
            font-size: 18px;
            color: #333;
            margin-bottom: 8px;
        }

        .book-author {
            color: #666;
            font-size: 14px;
            margin-bottom: 15px;
        }

        .book-buttons {
            display: flex;
            justify-content: center;
            gap: 10px;
        }

        .book-buttons button {
            padding: 8px 12px;
            border: none;
            border-radius: 6px;
            font-size: 14px;
            cursor: pointer;
            transition: 0.3s ease;
        }

        .edit-btn {
            display: inline-block;
            background-color: #4a90e2;
            color: white;
            padding: 8px 14px;
            border-radius: 6px;
            text-decoration: none;
            font-size: 14px;
            transition: background-color 0.3s ease;
        }

        .edit-btn:hover {
            background-color: #3c7fd4;
        }


        .edit-btn {
            background-color: #4a90e2;
            color: white;
        }

        /* .delete-btn {
            background-color: #e24a4a;
            color: white;
        } */

        .footer {
            background-color: #4a90e2;
            color: white;
            text-align: center;
            padding: 15px;
            font-size: 14px;
            margin-top: 40px;
        }

        @media (max-width: 600px) {
            .book-grid {
                grid-template-columns: repeat(auto-fill, minmax(140px, 1fr));
                gap: 12px;
            }

            .book-image {
                height: 180px;
            }

            .book-card {
                max-width: 160px;
            }
        }
    </style>


</head>

<body>



    <!-- Navbar -->
    <header class="navbar">
        <div class="logo">LibrarySystem</div>
        <nav>
            <!-- <a href="/dashboard">Home</a> -->
        </nav>
    </header>

    <!-- Book List Section -->
    <section class="book-section">
        <?php if (isset($_SESSION['success'])): ?>
            <div class="alert alert-success"><?= $_SESSION['success'] ?></div>
            <?php unset($_SESSION['success']) ?>
        <?php endif ?>
        <?php if (isset($_SESSION['error'])): ?>
            <div class="alert alert-error"><?= $_SESSION['error'] ?></div>
            <?php unset($_SESSION['error']) ?>
        <?php endif ?>
        <?php if (isset($_SESSION['warning'])): ?>
            <div class="alert alert-warning"><?= $_SESSION['warning'] ?></div>
            <?php unset($_SESSION['warning']) ?>
        <?php endif ?>
        <h2 style="text-align:center; margin-bottom: 30px;">📚 List of Books</h2>


        <div class="search-container">
            <form method="GET" action="/searchbooks" style="display: flex; gap: 8px; margin-bottom: 20px;">
                <input
                    type="text"
                    name="search"
                    placeholder="Search by Title or Author"
                    value="<?= isset($_GET['search']) ? htmlspecialchars($_GET['search']) : '' ?>"
                    style="padding: 8px; border-radius: 15px; border: 1px solid #ccc; width: 300px;">

                <button type="submit" style="background-color: #007bff; color: white; border: none; padding: 8px 12px; border-radius: 15px; cursor: pointer;">
                    🔍 Search
                </button>
            </form>

        </div>
        <?php
        $books = $_SESSION['search_results'] ?? $this->book->fetchAllBooks();
        unset($_SESSION['search_results']);
        ?>


        <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin'): ?>
            <div class="top-buttons">
                <a href="/addbook" class="addbook-btn">➕ Add Book</a>
                <a href="/dashboard" class="back-btn">🔙 Back</a>
            </div>
        <?php endif ?>

        <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'user'): ?>
            <div class="top-buttons">
                <a href="/dashboard" class="addbook-btn">📚 Dashboard</a>
                <a href="/dashboard" class="back-btn">🔙 Back</a>
            </div>
        <?php endif ?>

    </section>

    <div class="book-grid">
        <?php foreach ($books as $key => $book) : ?>
            <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin'): ?>
                <div class="book-card">
                    <a href="/bookdetail?book_id=<?= $book['book_id'] ?>">
                        <img src="<?= $book['image'] ?? 'profile-icon-design-free-vector.jpg' ?>" alt="Book Cover" class="book-image" />
                    </a>
                    <div class="book-title"><?= $book['title'] ?></div>
                    <div class="book-author"><?= $book['author'] ?></div>
                    <a href="/editbook?book_id=<?= $book['book_id'] ?>&author=<?= $book['author'] ?>&genre=<?= $book['genre'] ?>&copies=<?= $book['copies'] ?>&description=<?= $book['description'] ?>" class="edit-btn"> Edit </a>
                    <a href="/deletebook?book_id=<?= $book['book_id'] ?>&user_id=<?= $_SESSION["user_id"] ?>" class="delete-btn">Delete</a>
                </div>
            <?php endif ?>
        <?php endforeach ?>
    </div>

    <div class="book-grid">
        <?php foreach ($books as $key => $book) : ?>
            <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'user'): ?>
                <div class="book-card">
                    <a href="/bookdetail?book_id=<?= $book['book_id'] ?>">
                        <img src="<?= $book['image'] ?? 'profile-icon-design-free-vector.jpg' ?>" alt="Book Cover" class="book-image" />
                    </a>
                    <div class="book-title"><?= $book['title'] ?></div>
                    <div class="book-author"><?= $book['author'] ?></div>
                    <a href="/borrow?user_id=<?= $_SESSION["user_id"] ?>&book_id=<?= $book['book_id'] ?>" class="edit-btn">Borrow</a>
                    <a href="/deleteBookBorrowDetails?book_id=<?= $book['book_id'] ?>&user_id=<?= $_SESSION["user_id"] ?>" class="delete-btn">Cancel</a></p>
                </div>
            <?php endif ?>
        <?php endforeach ?>
    </div>
</body>
<!-- Footer -->
<footer class="footer">
    &copy; 2025 Library Management System. All rights reserved.
</footer>

</html>