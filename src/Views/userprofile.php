<!-- <!DOCTYPE html>
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

</html> -->


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>User Profile - Library System</title>
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

    /* Profile Card */
    .main-content {
      flex: 1;
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 40px 20px;
    }

    .profile-card {
      background: #fff;
      border-radius: 15px;
      padding: 30px 40px;
      box-shadow: 0 4px 20px rgba(0,0,0,0.1);
      text-align: center;
      max-width: 400px;
      width: 100%;
      position: relative;
    }

    .profile-pic {
      width: 120px;
      height: 120px;
      border-radius: 50%;
      object-fit: cover;
      border: 4px solid #4a90e2;
      margin-bottom: 15px;
    }

    h2 {
      margin: 10px 0 5px;
      color: #333;
    }

    .profile-info {
      font-size: 16px;
      color: #555;
      margin: 8px 0;
    }

    .label {
      font-weight: bold;
      color: #777;
    }

    /* Edit Button */
    .edit-btn {
      position: absolute;
      top: 20px;
      right: 20px;
      background-color: transparent;
      border: none;
      font-size: 20px;
      cursor: pointer;
      color: #4a90e2;
      transition: transform 0.2s ease;
    }

    .edit-btn:hover {
      transform: scale(1.1);
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

  <!-- Main Profile Section -->
  <div class="main-content">
    <div class="profile-card">
      <a href="/editprofile" class="round-button"><button class="edit-btn" title="Edit Profile">✏️</button></a>
      <img src="<?= __DIR__.$user['image'] ?? " https://i.pravatar.cc/150?img=12" ?> alt="Profile Picture" class="profile-pic" />
      <h2><?= $user['username'] ?></h2>
      <div class="profile-info"><span class="label">Library ID:</span><?= $user['id'] ?></div>
      <div class="profile-info"><span class="label">Email:</span><?= $user['email'] ?></div>
    </div>
  </div>

  <!-- Footer -->
  <footer class="footer">
    &copy; 2025 Library Management System. All rights reserved.
  </footer>

</body>
</html>
