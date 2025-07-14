<!DOCTYPE html>
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
            <?php unset($_SESSION['success']) ?>
        <?php endif ?>

        <?php if (isset($_SESSION['error'])): ?>
            <div class="alert alert-error"><?= $_SESSION['error'] ?></div>
            <?php unset($_SESSION['error']) ?>
        <?php endif ?>



        <div class="container">
            <div>
                <p><strong>User Directory</strong></p>
                <p style="display: inline;"><a href="/userprofile" class="round-button">Profile</a></p>
            </div>
        </div>

        <table>
            <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin'): ?>
                <tr>
                    <th>S/N</th>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Delete User</th>
                </tr>
            <?php endif ?>
            <?php foreach ($users as $key => $user) : ?>
                <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin'): ?>
                    <tr>
                        <td><?= $count ?></td>
                        <td><?= $user['id'] ?></td>
                        <td><?= $user['username'] ?></td>
                        <td>
                            <p style="display: inline;"><a href="/deleteuser?user_id=<?= $user["id"] ?>" class="round-button">Delete User</a></p>
                        </td>
                    </tr>
                <?php endif ?>
                <?php $count += 1 ?>
            <?php endforeach ?>

        </table>




    </main>
    <footer class="footer">
        &copy; 2025 Library Management System. All rights reserved.
    </footer>
</body>

</html>