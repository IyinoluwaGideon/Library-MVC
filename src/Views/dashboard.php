<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.phptutorial.net/app/css/style.css">
    <title>Dashboard</title>

    <style>
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
            /* position: relative; */
            height: 100vh;
            /* width: 500px; */
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
    </style>
</head>

<body>
    <main>
        <?php if (isset($_SESSION['error'])): ?>
            <div class="alert alert-error"><?= $_SESSION['error'] ?></div>
            <?php unset($_SESSION['error']) ?>
        <?php endif ?>
        <?php if (isset($_SESSION['success'])): ?>
            <div class="alert alert-success"><?= $_SESSION['success'] ?></div>
            <?php unset($_SESSION['success']) ?>
        <?php endif ?>

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
                    <th>Author</th>
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
                                <p style="display: inline;"class="buttons">Returned</p>
                            <?php endif ?>

                        </td>
                    </tr>
                    <?php $count += 1 ?>
                <?php endforeach ?>

            </table>
        <?php endif ?>

        <p style="display: inline;"><a href="/userprofile" class="top-right-btn"><img src="./profile-icon-design-free-vector.jpg" width="25" height="25">
            </a></p>
                <!-- <p style="display: inline;"><a href="/userrecord" class="round-button">All User's Record</a></p> -->
    </main>
</body>

</html>