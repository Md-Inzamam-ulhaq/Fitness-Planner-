<?php
// $servername = "localhost";
// $username = "root";
// $password = "";
// $dbname = "fitness_planner";

// $conn = new mysqli($servername, $username, $password, $dbname);
$conn = mysqli_connect('localhost', 'root', '','fitness_planner');
echo"connectiom Successfull";

if (!$conn) {
    die("Connection failed: " . $conn->connect_error);
}
?>
