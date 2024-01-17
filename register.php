<?php

require_once('db_credentials.php');
require_once('database.php');
$conn = db_connect();

if (($_SERVER["REQUEST_METHOD"] == "POST") && validate()) {
    $user = mysqli_real_escape_string($conn, $_POST['username']);
    $pass = mysqli_real_escape_string($conn, $_POST['password']);
    $email=mysqli_real_escape_string($conn, $_POST['email']);
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);
    $age = mysqli_real_escape_string($conn, $_POST['age']);
    $detail =mysqli_real_escape_string($conn, $_POST['detail']);

    $sql = "INSERT INTO user_login (username, password,email,gender,age,detail) VALUES ('$user', '$pass','$email','$gender','$age','$detail')";
    
    if ($conn->query($sql) === TRUE) {
        header("Location: login.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="">
    <link rel="stylesheet" href="index.css">
    <title>Login</title>
    <style>
    .warning {
        color: red;
        padding: 5px;
        font-size: 14px;
        }
    .error-border {
        border: 2px solid red !important;
        }
    </style>
    <script src="register.js" defer></script>
</head>
<body>   
    <div class="toppicture">
        <p>JavaScript Community</p>
    </div>
    <header>
        <h3 id="loginheader">Welcome to JavaScript Community</h3>
    </header>
    <div class="login-container">
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" id="myForm" name="myForm" onsubmit="return validate();">
            <h2>Sign up</h2>
            <div class="textfield">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username">
            </div>

            <div class="textfield">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password">
            </div>

            <div class="textfield">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email">
            </div>

            <label for="gender">Gender:</label>
            <select type="text" id="gender" name="gender" size="3">
            <option value="not_sure">Not Sure</option>
            <option value="male">Male</option>
            <option value="female">Female</option>
            </select>
            <label for="age">Age:</label>
            <input type="number" id="age" name="age">

            <label for="detail">Detail <em>(Optional)</em></label>
            <textarea name="detail" id="" cols="30" rows="10"></textarea><br>

            <button type="submit">Register</button>
            <a href="login.php" class="login">Log in</a>  
        </form>
    </div>
    <?php include('footer.php')?>
</body>
</html>