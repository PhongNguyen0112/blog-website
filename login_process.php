<?php

require_once('db_credentials.php');
require_once('database.php');
$conn = db_connect();

$user = $_POST['username'];
$pass = $_POST['password'];


$user = mysqli_real_escape_string($conn, $user);
$pass = mysqli_real_escape_string($conn, $pass);


$sql = "SELECT * FROM user_login WHERE username='$user' AND password='$pass'";
$result = $conn->query($sql);

session_start();

if ($result->num_rows > 0) {

    $_SESSION['loggedin'] = true;
    $_SESSION['username'] = $user;

    header("Location: index.php");
    exit();
} else {

    echo "Invalid username or password";
}
?>
