<?php
require_once('db_credentials.php');
require_once('database.php');
$db = db_connect();
?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
   <meta charset="UTF-8">
   <meta name="description" content="Assignment2 index page">
   <meta name="keywords" content="index page">
   <meta name="author" content="Group">
     <title>Assignment2 index page</title>
     <link rel="stylesheet" type="text/css" href="index.css">
     
 </head>
 
 <body>
    <div class="topnav">
        <ul>
            <li><a class="active">Home</a></li>
            <li><a href="./discovery.php">Discover</a></li>
            <li><a href="./profile.php">MyProfile</a></li>
            <li><a href="./post.php">Publish Blog</a></li>
        </ul>
    </div>    
    <div class="toppicture">
        <p>JavaScript Community</p>
    </div>
      
 <div class="container">
    <div class="left">
        <div class="card">
            <img src="JavaScript-Blog-Cover.png">
            <p class="italic-bold">JavaScript Community</p>
            <p class="italic-bold">Blog Manager:</p>
            <p>Tianyang Huang</p>
            <p>Anna</p>
            <p>Phong</p>
        </div>
        <div class="card">
            <h3>About us</h3>
            <p>Welcome to the JavaScript Community Blog, a vibrant platform dedicated to all things JavaScript. This platform is the brainchild of a passionate developer, crafted with the intention of creating a central hub for JavaScript enthusiasts, professionals, and beginners alike.</p>   
        </div>
        <div class="card">
            <h3>Category</h3>
            <p class="small-italic">clike and jump to Category</p>  
            <ul>
                <li><a href="http://localhost/Group2/discovery.php?keyword=Control+Structures&username=">Control Structures</a></li>
                <li><a href="http://localhost/Group2/discovery.php?keyword=Functions+and+Methods&username=">Functions and Methods</a></li>
                <li><a href="http://localhost/Group2/discovery.php?keyword=DOM+Manipulation&username=">DOM Manipulation</a></li>
                <li><a href="http://localhost/Group2/discovery.php?keyword=Story+with+JS&username=">Story with JS</a></li>
                

            </ul>
        </div>
    </div>    
    <div class="right">
        <div class="card">
            <header>
                <h3>Introduce to JavaScript</h3>
                <p>Blog Manager</p>
                <p class="small-italic">Welcome to our JavaScript Community</p>
            </header>
            <div class="description">
                <p>JavaScript is a dynamic programming language integral to web development. It emerged in the mid-1990s to add interactivity to web pages and has since evolved into a key tool for both front-end and back-end development, thanks to Node.js. JavaScript is interpreted, high-level, and compatible with all major web browsers, making it a staple for client-side scripting.</p>
                <p>It enables dynamic content updates, interactive features, and webpage manipulation through the Document Object Model (DOM). Supporting various programming paradigms, JavaScript adapts to diverse development needs. Its ecosystem, enriched with libraries like React and Angular, continuously evolves, offering tools that enhance development efficiency and capabilities.</p>

            </div>
        </div>
        <div class="card">
            <header>
                <h3>Quick Guide to Mastering JavaScript</h3>
                <p>Blog Manager</p>
                <p class="small-italic">Welcome to our JavaScript Community</p>
            </header>
            <div class="description">
                <p><strong>Start with the Fundamentals:</strong> Grasp the syntax and core concepts like variables, data types, functions, and control structures. Utilize resources like MDN Web Docs and W3Schools for structured learning.</p>
                <p><strong>Embrace Interactive Learning:</strong> Platforms like Codecademy or freeCodeCamp offer interactive exercises, allowing you to apply concepts in real-time. This hands-on approach solidifies your understanding and makes learning engaging.</p>
                <p><strong>Work on Small Projects:</strong> Apply your knowledge by building simple applications such as a calculator or a to-do list. These projects reinforce concepts and develop your problem-solving skills. Sharing your work on GitHub or CodePen can also provide valuable community feedback.</p>
                <p><strong>Understand DOM Manipulation:</strong> Learning to manipulate the Document Object Model (DOM) is crucial. It allows you to dynamically interact with and modify web pages, responding to user actions and events.</p>
                <p><strong>Explore JavaScript Frameworks:</strong> As you grow more confident, delve into frameworks like React, Angular, or Vue.js. These tools introduce you to modern development practices and greatly simplify building complex applications.</p>
                <p><strong>Regular Practice:</strong> Consistent coding is key to mastery. Set aside regular time for practice, experimentation, and staying updated with the latest JavaScript developments.</p>
                <p><strong>Join the Community:</strong> Engage with other developers through forums, social media, or local meetups. Platforms like Stack Overflow or GitHub Discussions are great for seeking help, sharing knowledge, and staying connected with the latest trends.</p>
            </div>
        </div>
        <div class="card">
            <header>
                <h3> Enjoy the Life</h3>
                <p>Blog Manager</p>
                <p class="small-italic">Welcome to our JavaScript Community</p>
            </header>
            <p>Enjoying life is a precious art, one that we should all strive to master. It's about finding joy in the little things, savoring every moment, and appreciating the beauty that surrounds us. Whether it's watching a sunrise, taking a leisurely walk in the park, or sharing laughter with loved ones, life is filled with opportunities for happiness.</p>
            <p>Embracing a positive outlook can make a world of difference. Gratitude for what we have, rather than dwelling on what we lack, is key to a fulfilling life. It's also about seeking new experiences, trying new cuisines, or exploring new destinations, expanding our horizons and creating lasting memories.</p>
            <P>Balance is essential; knowing when to work hard and when to relax is vital. Finding time for hobbies, relaxation, and self-care allows us to recharge and face challenges with renewed energy. Moreover, building meaningful connections with family and friends is a cornerstone of a joyful life. Sharing moments, supporting one another, and celebrating each other's achievements is immensely rewarding.</P>
            <P>Life is a journey, and how we choose to live it is a reflection of our choices and priorities. Enjoying life means embracing the present, cherishing relationships, pursuing passions, and creating a tapestry of beautiful moments that define our unique experience. It's about finding fulfillment in the ordinary and making every day an adventure.</P>
        </div>

    </div>


 </div>
 <?php include('footer.php')?>
</body>
 
 </html>
 