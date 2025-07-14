<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.phptutorial.net/app/css/style.css">
    <title>Book Details</title>
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
    </style>

</head>

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
        <!-- <?php if (isset($_SESSION['book_detail'])): ?>
    <?php $book = $_SESSION['book_detail']; ?>
    <?php unset($_SESSION['book_detail']); ?>
<?php else: ?>
    <p>No book detail available.</p>
<?php endif; ?> -->

        <h2>Book Details</h2>
        <table>
            <tr>
                <th>Book_ID</th>
                <th>Title</th>
                <th>Author</th>
                <th>ISBN</th>
                <th>PUBLICATION YEAR</th>
                <th>GENRE</th>
                <th>COPIES</th>
                <th>DESCRIPTION</th>
            </tr>
            <tr>
                <td><?= $book['book_id'] ?></td>
                <td><?= $book['title'] ?></td>
                <td><?= $book['author'] ?></td>
                <td><?= $book['isbn'] ?></td>
                <td><?= $book['publication_year'] ?></td>
                <td><?= $book['genre'] ?></td>
                <td><?= $book['copies'] ?></td>
                <td><?= $book['description'] ?></td>
            </tr>
        </table>
        <p style="display: inline;"><a h`ref="/dashboard" class="round-button">Dashboard</a></p>
        <p style="display: inline;"><a href="/booklist" class="round-button">Back</a></p>

    </main>
</body>
<!-- Footer -->
<footer class="footer">
    &copy; 2025 Library Management System. All rights reserved.
</footer>

</html>