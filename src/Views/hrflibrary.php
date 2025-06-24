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
    </style>
</head>

<body>
    <main>
        <p>
        <h1><strong>HRF LIB</strong></h1>
        </p>
        <p><strong>Welcome To HRF Library </strong></p>

        <h4>HRF Library Books</h4>
        <table>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Author</th>
                <th>Book Details</th>
                <th>Borrow Book</th>
            </tr>
            <?php foreach ($books as $key => $book) : ?>
                <tr>
                    <td><?= $book['book_id'] ?></td>
                    <td><?= $book['title'] ?></td>
                    <td><?= $book['author'] ?></td>
                    <td><p style="display: inline;"><a href="/login" class="buttons">View Details</a></p></td>
                    <td><p style="display: inline;"><a href="/login" class="round-button">Borrow</a></p></td>
                </tr>
            <?php endforeach ?>
        </table>

        <p style="display: inline;"><a href="/register" class="round-button">Register</a></p>

    </main>
</body>

</html>