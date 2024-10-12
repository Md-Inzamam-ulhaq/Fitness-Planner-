<?php
session_start();
if (isset($_SESSION['admin'])) {
    header("Location: admin_dashboard.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Connect to database
    $conn = new mysqli('localhost', 'root', '', 'fitness_planner');

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Handle admin login
    if (isset($_POST['action']) && $_POST['action'] == 'login') {
        // Sanitize input
        $username = $conn->real_escape_string(trim($_POST['username']));
        $password = trim($_POST['password']);

        // Query to check admin credentials
        $query = "SELECT * FROM admins WHERE username = '$username'";
        $result = $conn->query($query);
        
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            // Verify the password using password_hash
            if (password_verify($password, $row['password'])) {
                $_SESSION['admin'] = $username;
                header("Location: admin_dashboard.php");
                exit();
            } else {
                $error_message = "Invalid password!";
            }
        } else {
            $error_message = "Invalid username!";
        }
    }

    // Handle new admin registration
    if (isset($_POST['action']) && $_POST['action'] == 'add_admin') {
        // Sanitize input
        $new_username = $conn->real_escape_string(trim($_POST['new_username']));
        $new_password = trim($_POST['new_password']);

        // Hash the password for security
        $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

        // Check if username already exists
        $check_query = "SELECT * FROM admins WHERE username = '$new_username'";
        $check_result = $conn->query($check_query);
        
        if ($check_result->num_rows > 0) {
            $error_message = "Username already exists!";
        } else {
            // Insert new admin into database
            $insert_query = "INSERT INTO admins (username, password) VALUES ('$new_username', '$hashed_password')";
            if ($conn->query($insert_query) === TRUE) {
                $success_message = "New admin added successfully!";
            } else {
                $error_message = "Error: " . $conn->error;
            }
        }
    }
    
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        form {
            background-color: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            margin: 10px;
        }
        h2 {
            margin: 0 0 15px;
        }
        label {
            display: block;
            margin: 10px 0 5px;
        }
        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        input[type="submit"] {
            background-color: #291818; /* Your preferred button color */
            color: white;
            border: none;
            padding: 10px;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
        }
        input[type="submit"]:hover {
            background-color: #d79447; /* Your preferred hover color */
        }
        .error {
            color: red;
            margin-bottom: 15px;
        }
        .success {
            color: green;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
    <form action="admin_login.php" method="post">
        <h2>Admin Login</h2>
        
        <?php if (isset($error_message)): ?>
            <div class="error"><?php echo htmlspecialchars($error_message); ?></div>
        <?php endif; ?>
        <?php if (isset($success_message)): ?>
            <div class="success"><?php echo htmlspecialchars($success_message); ?></div>
        <?php endif; ?>

        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>

        <input type="hidden" name="action" value="login">
        <input type="submit" value="Login">
    </form>

    <form action="admin_login.php" method="post">
        <h2>Add New Admin</h2>

        <label for="new_username">New Username:</label>
        <input type="text" id="new_username" name="new_username" required>

        <label for="new_password">New Password:</label>
        <input type="password" id="new_password" name="new_password" required>

        <input type="hidden" name="action" value="add_admin">
        <input type="submit" value="Add Admin">
    </form>
</body>
</html>
