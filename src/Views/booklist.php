<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.phptutorial.net/app/css/style.css">
    <title>Book</title>
    <style>
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
    </style>
</head>

<body>
    <main>
        <?php if (isset($_SESSION['success'])): ?>
            <div class="alert alert-success"><?= $_SESSION['success'] ?></div>
            <?php unset($_SESSION['success']) ?>
        <?php endif ?>

        <?php if (isset($_SESSION['error'])): ?>
            <div class="alert alert-error"><?= $_SESSION['error'] ?></div>
            <?php unset($_SESSION['error']) ?>
        <?php endif ?>



        <div class="container">
            <div>
                <p>
                <h1><strong>LIB</strong></h1>
                </p>
                <p><strong>Welcome To HRF Library </strong></p>

                <h4>List of Books in the Library</h4>

                <p style="display: inline;"><a href="/addbook" class="round-button">Addbook</a></p>
                <p style="display: inline;"><a href="/dashboard" class="round-button">Back</a></p>

            </div>
        </div>

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




        <table>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Author</th>
                <th>Book Details</th>
                <th>Borrow Book</th>
                <th>Edit Book</th>
                <th>Delete Book</th>
                <th>Cancle Borrow</th>
            </tr>
            <?php foreach ($books as $key => $book) : ?>
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
                        <p style="display: inline;"><a href="/editbook?book_id=<?= $book['book_id'] ?>&author=<?= $book['author'] ?>&genre=<?= $book['genre'] ?>&copies=<?= $book['copies'] ?>&description=<?= $book['description'] ?>" class="round-button">Edit Book</a></p>
                    </td>
                    <td>
                        <p style="display: inline;"><a href="/deleteBookBorrowDetails?book_id=<?= $book['book_id'] ?>&user_id=<?= $_SESSION["user_id"] ?>" class="round-button">Cancle Borrow</a></p>
                    </td>
                    <td>
                        <p style="display: inline;"><a href="/deletebook?book_id=<?= $book['book_id'] ?>&user_id=<?= $_SESSION["user_id"] ?>" class="round-button">Delete Book</a></p>
                    </td>

                </tr>
            <?php endforeach ?>
        </table>




    </main>
</body>

</html>