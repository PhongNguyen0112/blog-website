<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once('db_credentials.php');
    require_once('database.php');
    $db = db_connect();

    // Sanitize and validate input (you can add more validation)
    $comment = htmlspecialchars($_POST["comment"]);
    $post_id = $_POST["post_id"];

    // Insert the comment into the database (This is a simplified example)
    $query = "INSERT INTO comments (post_id, comment_text) VALUES ('$post_id', '$comment')";
    $result = mysqli_query($db, $query);

    // Redirect back to the page with the posts
    header("Location: " . $_SERVER["HTTP_REFERER"]);
    exit();
} else {
    // Redirect to an error page or handle the error accordingly
    header("Location: error.php");
    exit();
}
?>