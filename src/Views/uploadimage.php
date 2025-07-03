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
        <form enctype="multipart/form-data" action="/uploadimage" method="post">
            <h1>Upload Image</h1>
            <div>
                <label for="image">Image:</label>
                <input type="file" name="uploaded-image" id="image">
            </div>
            <section>
                <button type="submit">Upload</button>
                <a href="/dashbord">Dashboard</a>
            </section>
        </form>
    </main>
</body>

</html>