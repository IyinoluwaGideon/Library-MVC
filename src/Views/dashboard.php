<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.phptutorial.net/app/css/style.css">
    <title>Register</title>
    <style>
            table {
                width: 100%;
                border-collapse: collapse;
                margin: 20px 0;
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
                border: 1px solid #ddd; /* Ensure border around the table */
            }

            th, td {
                padding: 12px 15px;
                text-align: left;
                border: 1px solid #ddd; /* Ensure borders around cells */
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
                background-color: #6f42c1;
                color: white;
            }
        </style>
</head>
<body>
<main>

<p><strong>Welcome, <?= "Ade" ?></strong></p>

<?php if (true): ?>
    <p style="display: inline;"><a href="edit_users.php" class="round-button">Edit Users</a></p>
    <p style="display: inline;"><a href="add-book.php" class="round-button">Add Book</a></p>

<?php else: ?>
    <p style="display: inline;"><a href="edit_profile.php" class="round-button">Edit Profile</a></p>

<?php endif ?>I9KK9I

<p style="display: inline;"><a href="logout.php" class="round-button">Logout</a></p>

<?php require __DIR__ . '/view_library.php' ?>

</main>
</body>
</html>