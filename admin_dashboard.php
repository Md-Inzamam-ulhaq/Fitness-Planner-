<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: admin_login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        header {
            background-color: #291818; /* Your preferred header color */
            color: #ffffff;
            padding: 10px 20px;
            text-align: center;
        }
        nav {
            margin: 20px 0;
        }
        nav a {
            margin: 0 15px;
            text-decoration: none;
            color: #291818; /* Your preferred link color */
        }
        main {
            padding: 20px;
        }
        footer {
            margin-top: 20px;
            text-align: center;
            padding: 10px;
            background-color: #291818;
            color: #ffffff;
        }
    </style>
</head>
<body>
    <header>
        <h1>Admin Dashboard</h1>
    </header>
    
    <nav>
        <a href="manage_users.php">Manage Users</a>
        <a href="manage_content.php">Manage Content</a>
        <a href="logout.php">Logout</a>
    </nav>

    <main>
        <h2>Welcome, <?php echo htmlspecialchars($_SESSION['admin']); ?>!</h2>
        <p>This is your admin dashboard. You can manage users and content from here.</p>
        
        <!-- You can add more dashboard features here -->
    </main>

    <footer>
        <p>&copy; 2024 Your Website Name. All rights reserved.</p>
    </footer>
</body>
</html>
