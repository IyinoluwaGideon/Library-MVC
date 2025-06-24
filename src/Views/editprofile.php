<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.phptutorial.net/app/css/style.css">
    <title>Addbook</title>
</head>

<body>
    <main>
        <form action="/editprofile" method="post">
            <h1>Edit Profile</h1>
            <div>
                <label for="username">Username:</label>
                <input type="text" name="username" id="username" value="<?= $_SESSION['inputs']['username'] ?? '' ?>">
            </div>
            <section>
                <button type="submit">Edit</button>
                <a href="/dashboard">Dashboard</a>
            </section>
        </form>
    </main>
</body>

</html>