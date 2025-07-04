<!-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.phptutorial.net/app/css/style.css">
    <title>Addbook</title>
</head>

<body>
    <main>
        <form action="/editprofile" method="post" enctype="multipart/form-data">

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

</html> -->


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Edit Profile - Library System</title>
  <style>
    body {
      margin: 0;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background-color: #f4f6f9;
      display: flex;
      flex-direction: column;
      min-height: 100vh;
    }

    /* Navbar */
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

    /* Main Section */
    .main-content {
      flex: 1;
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 40px 20px;
    }

    .edit-form {
      background: #fff;
      padding: 30px 40px;
      border-radius: 15px;
      box-shadow: 0 4px 20px rgba(0,0,0,0.1);
      width: 100%;
      max-width: 400px;
    }

    .edit-form h2 {
      text-align: center;
      color: #333;
      margin-bottom: 25px;
    }

    .form-group {
      margin-bottom: 20px;
    }

    .form-group label {
      display: block;
      margin-bottom: 8px;
      font-weight: bold;
      color: #555;
    }

    .form-group input[type="text"],
    .form-group input[type="file"] {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 8px;
      font-size: 16px;
    }

    .form-group input[type="file"] {
      padding: 5px;
    }

    .submit-btn {
      width: 100%;
      background-color: #4a90e2;
      color: #fff;
      padding: 12px;
      border: none;
      border-radius: 8px;
      font-size: 16px;
      cursor: pointer;
      transition: background 0.3s ease;
    }

    .submit-btn:hover {
      background-color: #3b7ac7;
    }

    /* Footer */
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

  <!-- Navbar -->
  <header class="navbar">
    <div class="logo">LibrarySystem</div>
    <nav>
      <a href="#">Home</a>
      <a href="#">Books</a>
      <a href="#">Profile</a>
      <a href="#">Logout</a>
    </nav>
  </header>

  <!-- Edit Profile Form -->
  <div class="main-content">
    <form class="edit-form" action="/editprofile" method="POST" enctype="multipart/form-data">
      <h2>Edit Profile</h2>

      <div class="form-group">
        <label for="username">Username</label>
        <input type="text" id="username" name="username" value="<?= $user["username"]?>" required>
      </div>

      <div class="form-group">
        <label for="profileImage">Profile Picture</label>
        <input type="file" id="profileImage" name="uploaded-image" accept="image/*">
      </div>

      <button type="submit" class="submit-btn">Save Changes</button>
    </form>
  </div>

  <!-- Footer -->
  <footer class="footer">
    &copy; 2025 Library Management System. All rights reserved.
  </footer>

</body>
</html>
