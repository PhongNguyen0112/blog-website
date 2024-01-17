<?php
require_once('db_credentials.php');
require_once('database.php');
$db = db_connect();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="">
    <link rel="stylesheet" href="index.css">
    <title>Login</title>
</head>
<body>   
    <div class="toppicture">
        <p>JavaScript Community</p>
    </div>
    <header>
        <h3 id="loginheader">Welcome to JavaScript Community</h3>
    </header>
    <div class="login-container">
        <form action="login_process.php" method="post">
            <h2>Login</h2>
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            

            <button type="submit">Login</button>
            <a href="register.php" class="register">Register</a>
        </form>
    </div>

</body>
</html>