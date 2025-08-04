<!-- <!DOCTYPE html>
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
Footer
<footer class="footer">
    &copy; 2025 Library Management System. All rights reserved.
</footer>

</html> -->


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Details</title>
    <link rel="stylesheet" href="https://www.phptutorial.net/app/css/style.css">
    <style>
        body {
            margin: 0;
            font-family: 'Segoe UI', sans-serif;
            background-color: #f5f7fa;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(to right, #f0f4ff, #e9efff);
            margin: 0;
            padding: 0;
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

        .book-detail-container {
            display: flex;
            gap: 50px;
            padding: 50px;
            max-width: 1100px;
            margin: 40px auto;
            align-items: flex-start;
            background: white;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            border-radius: 20px;
            background: linear-gradient(to right, #f0f4ff, #e9efff);
        }

        .book-image img {
            width: 320px;
            height: auto;
            object-fit: cover;
            border-radius: 16px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
        }

        .book-info h1 {
            margin-top: 0;
            font-size: 32px;
            color: #333;
        }

        .book-info p {
            font-size: 18px;
            margin: 12px 0;
            line-height: 1.6;
        }

        .button-group {
            margin-top: 30px;
        }

        .btn {
            display: inline-block;
            padding: 12px 20px;
            margin-right: 15px;
            background: #4a00e0;
            color: white;
            text-decoration: none;
            font-weight: 600;
            border-radius: 10px;
            transition: 0.3s ease;
        }

        .btn:hover {
            background: #3d00b2;
        }

        .btn.secondary {
            background: #888;
        }

        .btn.secondary:hover {
            background: #555;
        }

        .book-description {
            max-width: 1100px;
            margin: 30px auto;
            background: white;
            padding: 30px;
            border-radius: 16px;
            box-shadow: 0 6px 24px rgba(0, 0, 0, 0.08);
            background: linear-gradient(to right, #f0f4ff, #e9efff);
        }

        .book-description h2 {
            font-size: 24px;
            margin-bottom: 15px;
            color: #333;
        }

        .book-description p {
            font-size: 17px;
            line-height: 1.8;
        }


        .book-info p {
            font-size: 16px;
            margin: 10px 0;
        }

        .button-group .btn {
            display: inline-block;
            padding: 10px 16px;
            margin: 15px 10px 0 0;
            background: #4a00e0;
            color: white;
            text-decoration: none;
            border-radius: 8px;
            transition: 0.3s ease;
        }

        .button-group .btn:hover {
            background: #3d00b2;
        }

        @media (max-width: 768px) {
            .book-detail-container {
                flex-direction: column;
                text-align: center;
            }

            .book-image img {
                width: 100%;
                max-width: 300px;
                margin: auto;
            }
        }

        .footer {
            background-color: #4a90e2;
            color: #fff;
            text-align: center;
            padding: 15px 10px;
            font-size: 14px;
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
    <main>
        <div class="book-detail-container">
            <div class="book-image">
                <img src="<?= htmlspecialchars($book['image']) ?>" alt="Book Cover">
            </div>

            <div class="book-info">
                <h1><?= htmlspecialchars($book['title']) ?></h1>
                <p><strong>Author:</strong> <?= htmlspecialchars($book['author']) ?></p>
                <p><strong>ISBN:</strong> <?= htmlspecialchars($book['isbn']) ?></p>
                <p><strong>Publication Year:</strong> <?= htmlspecialchars($book['publication_year']) ?></p>
                <p><strong>Genre:</strong> <?= htmlspecialchars($book['genre']) ?></p>
                <p><strong>Copies Available:</strong> <?= htmlspecialchars($book['copies']) ?></p>
                <div class="button-group">
                    <a href="/dashboard" class="btn">📚 Dashboard</a>
                    <a href="/booklist" class="btn secondary">← Back</a>
                </div>
            </div>
        </div>

        <div class="book-description">
            <h2>Description</h2>
            <p><?= nl2br(htmlspecialchars($book['description'])) ?></p>
        </div>

    </main>

    <footer class="footer">
        &copy; 2025 Library Management System. All rights reserved.
    </footer>
</body>

</html>