<?php
session_start();
require_once('db_credentials.php');
require_once('database.php');
$conn = db_connect();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $author = $_SESSION['username']; 
    $content = $_POST['blogContent'];
    $keyword = $_POST['keyword'];
    $time = date('Y-m-d H:i:s'); 


    $sql = "INSERT INTO blog_content (author, content, keyword, time) VALUES (?, ?, ?, ?)";

    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("ssss", $author, $content, $keyword, $time);
        
        if ($stmt->execute()) {
            echo "Blog posted successfully!";
        } else {
            echo "Error: " . $stmt->error;
        }
        $stmt->close();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <title>Publish Blog</title>
    <script src="post.js" defer></script>
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
    </head>
<body>
    <div class="topnav">
        <ul>
            <li><a href="./index.php">Home</a></li>
            <li><a href="./discovery.php">Discover</a></li>
            <li><a href="./profile.php">MyProfile</a></li>
            <li><a class="active">Publish Blog</a></li>
        </ul>
    </div>    
    <div class="toppicture">
        <p>JavaScript Community</p>
        <br>
    </div>
        <h1>Publish Blog</h1>
    
    <div class="container">
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" id="myForm" name="myForm" onsubmit="return validate();">>
    <label for="blogContent">Blog Content:</label>
    <textarea id="blogContent" name="blogContent" rows=50 colums=150 required></textarea>

    <label for="keyword">Keyword:</label>
    <select id="keyword" name="keyword">
        <option value="Control Structures">Control Structures</option>
        <option value="Functions and Methods">Functions and Methods</option>
        <option value="DOM Manipulation">DOM Manipulation</option>
        <option value="Story with JS">Story with JS</option>
    </select>

    <button type="submit">Submit</button>
</form>
</div>
<?php include('footer.php')?>
</body>
</html>

