
<?php
ini_set('display_errors', 1);


session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php");
    exit;
}

$username = $_SESSION['username'];
require_once('db_credentials.php');
require_once('database.php');
$conn = db_connect();

$sql = "SELECT email, gender, detail FROM user_login WHERE username = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();
$userData = $result->fetch_assoc();

if (!empty($username)) {
    $sql = "SELECT * FROM blog_content WHERE author = '$username'";
}
$htmlOutput = "";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $htmlOutput .= "<div class='card'>";
        $htmlOutput .= "<h2>" . htmlspecialchars($row["author"]) . "</h2>";
        $htmlOutput .= "<p>" . htmlspecialchars($row["content"]) . "</p>";
        $htmlOutput .= "<p><b>Keyword:</b> " . htmlspecialchars($row["keyword"]) . "</p>";
        $htmlOutput .= "</div>";
    }
} else {
    $htmlOutput = "<p>No results found</p>";
}
// Close the connection
$stmt->close();
$conn->close();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Profile</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
    <div class="topnav">
        <ul>
            <li><a href="./index.php">Home</a></li>
            <li><a href="./discovery.php">Discover</a></li>
            <li><a class="active">MyProfile</a></li>
            <li><a href="./post.php">Publish Blog</a></li>
        </ul>
    </div>    
    <div class="toppicture">
        <p>JavaScript Community</p>
    </div>
    <div class="container1">
     <div class="left">
        <div class="card">
            <h2>User Profile</h2>
            <h1>Welcome, <?php echo htmlspecialchars($username); ?>!</h1>
            <p><strong>UserName:</strong> <?php echo htmlspecialchars($username); ?></p>
            <p><strong>Email:</strong> <?php echo htmlspecialchars($userData['email'] ?? 'Not available'); ?></p>
            <p><strong>Gender:</strong> <?php echo htmlspecialchars($userData['gender'] ?? 'Not available'); ?></p>
            <p><strong>Detail:</strong> <?php echo htmlspecialchars($userData['detail'] ?? 'Not available'); ?></p>

        </card>
    </div>
    <div class="right">
        <?php echo $htmlOutput; ?>
    </div>
    <button><a href="logout.php">Logout</a></button>
    </div>
    <?php include('footer.php')?>
    <script src="profile.js"></script> 
</body>
</html>






