<!-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.phptutorial.net/app/css/style.css">
    <title>Dashboard</title>

    <style>
        body {
            margin: 0; 
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f6f9;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
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
            font-size: 20px;
            font-weight: bold;
        }

        .navbar nav a {
            color: #fff;
            margin-left: 20px;
            text-decoration: none;
            font-size: 16px;
        }

        .top-right-btn {
            position: absolute;
            top: 10px;
            right: 10px;
            padding: 10px 10px;
            background-color: transparent;
            color: #6f42c1;
            border: 1px solid #6f42c1;
            border-radius: 80px;
            cursor: pointer;
            margin-right: 500px;
        }

        body {
            position: relative;
            height: 100vh;
            width: 500px;
        }

        .top-right-btn:hover {
            background-color: #6f42c1;
            color: white;
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

        .info {
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
            <a href="/booklist">Books</a>
        </nav>
    </header>
    <main>

    

        <p>
        <h1><strong>DASHBOARD</strong></h1>
        </p>
        <p><strong>Welcome, <?= $_SESSION["username"] ?></strong></p>
        <p style="display: inline;"><a href="/booklist" class="round-button">Borrow/Return Book</a></p>



        <?php if (!empty($books)) : ?>
            <h4>My borrowed book list</h4>

            <table>
                <tr>
                    <th>S/N</th>
                    <th>Book_id</th>
                    <th>Title</th>
              ~      <th>Author</th>
                    <th>Book Details</th>
                    <th>Return Book</th>
                </tr>
                <?php foreach ($books as $book) : ?>
                    <tr>
                        <td><?= $count ?></td>
                        <td><?= $book['book_id'] ?></td>
                        <td><?= $book['title'] ?></td>
                        <td><?= $book['author'] ?></td>
                        <td>
                            <p style="display: inline;"><a href="/bookdetail?book_id=<?= $book['book_id'] ?>" class="buttons">View Details</a></p>
                        </td>
                        <td>
                            <?php if ($book['return_date'] === null) : ?>
                                <p style="display: inline;"><a href="/return?book_id=<?= $book['book_id'] ?>&user_id=<?= $_SESSION["user_id"] ?>" class="round-button">Return</a></p>
                            <?php else : ?>
                                <p style="display: inline;" class="buttons">Returned</p>
                            <?php endif ?>
                        </td>
                    </tr>
                    <?php $count += 1 ?>
                <?php endforeach ?>

            </table>
        <?php endif ?>

        <p style="display: inline;"><a href="/userprofile" class="top-right-btn"><img src="./profile-icon-design-free-vector.jpg" width="20" height="20">
            </a></p>
    </main>
     Footer
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
            margin-top: 20px;
            z-index: 999;
            position: relative;
        }

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

        .dashboard-header {
            text-align: center;
            margin-top: 20px;
            margin-bottom: 10px;
        }

        .borrow-btn {
            display: inline-block;
            background-color: #4a90e2;
            color: white;
            padding: 10px 25px;
            border-radius: 25px;
            text-decoration: none;
            font-size: 16px;
            font-weight: bold;
            margin-top: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        .borrow-btn:hover {
            background-color: #3c7fd4;
            transform: translateY(-2px);
        }

        .profile-icon {
            position: absolute;
            top: 20px;
            right: 20px;
            z-index: 100;
        }

        .profile-icon img {
            border-radius: 50%;
            cursor: pointer;
            transition: transform 0.2s ease-in-out;
        }

        .profile-icon img:hover {
            transform: scale(1.1);
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

        body {
            margin: 0;
            font-family: 'Segoe UI', sans-serif;
            background-color: #f5f7fa;
        }

        .navbar {
            background-color: #61a2ecff;
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
            padding: 0% 0%;
        }

        .book-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            /* allows more books per row */
            gap: 40px;
            /* relaxed space between books */
            padding: 40px 40px;
            /* space around the grid */
            justify-items: center;
        }


        .book-card {
            width: 100%;
            max-width: 200px;
            padding: 15px;
            border-radius: 15px;
            background-color: #fff;
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

        /* Make body and html take full height */
        html,
        body {
            height: 100%;
            margin: 0;
        }

        /* Flex container for full-page layout */
        .page-wrapper {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        /* Push footer to the bottom */
        main {
            flex: 1;
        }

        /* Optional: Footer styling */
        .footer {
            background-color: #56a2f3eb;
            color: white;
            text-align: center;
            padding: 15px;
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
    <div class="page-wrapper">
        <!-- Navbar -->
        <header class="navbar">
            <div class="logo">LibrarySystem</div>
            <nav>
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
            <?php if (isset($_SESSION['warning'])): ?>
                <div class="alert alert-warning"><?= $_SESSION['warning'] ?></div>
                <?php unset($_SESSION['warning']) ?>
            <?php endif ?>

            <a href="/userprofile" class="profile-icon">
                <img src="./profile-icon-design-free-vector.jpg" width="28" height="28" alt="Profile">
            </a>

            <div class="dashboard-header">
                <h1><strong>DASHBOARD</strong></h1>
                <p><strong>Welcome, <?= $_SESSION["username"] ?></strong></p>
                <a href="/booklist" class="borrow-btn"><strong>📚 Borrow Book</strong></a>
            </div>

            <!-- Book List Section -->
            <section class="book-section">
                <h2 style="text-align:center; margin-bottom: 30px;">📚 User Borrow List</h2>

                <?php if (!empty($books)) : ?>
                    <div class="book-grid">
                        <?php foreach ($books as $key => $book) : ?>
                            <div class="book-card">
                                <a href="/bookdetail?book_id=<?= $book['book_id'] ?>">
                                    <img src="<?= $book['image'] ?? 'profile-icon-design-free-vector.jpg' ?>" alt="Book Cover" class="book-image" />
                                </a>
                                <div class="book-title"><?= $book['title'] ?></div>
                                <div class="book-author"><?= $book['author'] ?></div>
                                <?php if ($book['return_date'] === null) : ?>
                                    <a href="/return?book_id=<?= $book['book_id'] ?>&user_id=<?= $_SESSION["user_id"] ?>" class="borrow-btn">Return</a>
                                <?php else : ?>
                                    <p style="display: inline;" class="buttons">Returned</p>
                                <?php endif ?>
                            </div>
                        <?php endforeach ?>
                    </div>
                <?php endif; ?>
        </main>
        <footer class="footer">© 2025 Library Management System. All rights reserved.</footer>
    </div>
</body>

</html>