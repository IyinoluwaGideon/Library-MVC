<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.phptutorial.net/app/css/style.css">
    <title>Dashboard</title>

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
            background-color: rgb(155, 116, 229);
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

        <p><strong>Profile</strong></p>

        <h4>My Library Info</h4>

        <table>
            <tr>
                <th>Library ID</th>
                <td><?= $user['id'] ?></td>
            </tr>
            <tr>
                <th>Username</th>
                <td><?= $user['username'] ?></td>
            </tr>

            <tr>
                <th>Email</th>
                <td><?= $user['email'] ?></td>
            </tr>
            <tr>
                <th>Role</th>
                <td><?= $user['role'] ?></td>
            </tr>
        </table>

        <p style="display: inline;"><a href="/logout" class="round-button">Logout</a></p>
        <p style="display: inline;"><a href="/editprofile" class="round-button">Edit</a></p>
        <p style="display: inline;"><a href="/uploadimage" class="round-button">Upload Image</a></p>
        <p style="display: inline;"><a href="/dashboard" class="round-button">Back</a></p>
        <p style="display: inline;"><a href="/deleteuser?user_id=<?= $_SESSION["user_id"] ?>&book_id=<? $book['book_id'] ?>" class="round-button">Delete User</a></p>


    </main>
</body>

</html>