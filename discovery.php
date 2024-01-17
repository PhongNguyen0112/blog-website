<?php
require_once('db_credentials.php');
require_once('database.php');
$db = db_connect();

$keyword = isset($_GET['keyword']) ? $_GET['keyword'] : '';
$userAuthor = isset($_GET['username']) ? $_GET['username'] : '';

$htmlOutput = "";

if (!empty($userAuthor)) {
    $sql = "SELECT * FROM blog_content WHERE author = '$userAuthor'";
} else {
    $sql = $keyword === 'all' ? "SELECT * FROM blog_content" : "SELECT * FROM blog_content WHERE keyword = '$keyword'";
}

$result = $db->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $postId = $row["id"];

        // Fetch and display comments for the post
        $commentQuery = "SELECT * FROM comments WHERE post_id = '$postId'";
        $commentResult = $db->query($commentQuery);

        $htmlOutput .= "<div class='card'>";
        $htmlOutput .= "<h2>" . htmlspecialchars($row["author"]) . "</h2>";
        $htmlOutput .= "<p>" . htmlspecialchars($row["content"]) . "</p>";
        $htmlOutput .= "<p><b>Keyword:</b> " . htmlspecialchars($row["keyword"]) . "</p>";

        // Comment Form
        $htmlOutput .= "<form action='process_comment.php' method='post'>";
        $htmlOutput .= "<label for='comment'>Add your comment:</label>";
        $htmlOutput .= "<textarea name='comment' rows='4' cols='50'></textarea>";
        $htmlOutput .= "<input type='hidden' name='post_id' value='$postId'>";
        $htmlOutput .= "<input type='submit' value='Post Comment'>";
        $htmlOutput .= "</form>";

        // Display Comments
        if ($commentResult->num_rows > 0) {
            $htmlOutput .= "<div class='comments'>";
            $htmlOutput .= "<h4>Comments:</h4>";
            while ($commentRow = $commentResult->fetch_assoc()) {
                $htmlOutput .= "<p>" . htmlspecialchars($commentRow["comment_text"]) . "</p>";
            }
            $htmlOutput .= "</div>";
        }

        $htmlOutput .= "</div>";
    }
} else {
    $htmlOutput = "<p>No results found</p>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <title>Blog Website</title>
</head>
<body>
    <div class="topnav">
        <ul>
            <li><a href="./index.php">Home</a></li>
            <li><a class="active">Discover</a></li>
            <li><a href="./profile.php">MyProfile</a></li>
            <li><a href="./post.php">Publish Blog</a></li>
        </ul>
    </div>    
    <div class="toppicture">
        <p>JavaScript Community</p>
    </div>
    <header>
        <h1>Blog Website</h1>
        <div class="container">
        
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="get">
            <label for="keyword">Choose a category:</label>
            <select id="keyword" name="keyword">
                <option value="all">All</option>
                <option value="Control Structures">Control Structures</option>
                <option value="Functions and Methods">Functions and Methods</option>
                <option value="DOM Manipulation">DOM Manipulation</option>
                <option value="Story with JS">Story with JS</option>
            </select>

            <label for="username">search by username:</label>
            <input type="text" id="username" name="username">

            <button type="submit">Search</button>
        </form>
        </div>
    </header>
    <div class="container">
        <section class="blog-list">
            <div class="search-right">
                <?php echo $htmlOutput; ?>
            </div>
        </section>
    </div>
    <?php include('footer.php')?>
</body>
</html>