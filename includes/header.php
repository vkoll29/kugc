<?php
session_start();
include "libs/config.php";
include "libs/database.php";
include "functions.php";

$db = new database();

$query = "SELECT * FROM posts ORDER BY id DESC ";

$posts = $db->select($query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="KU Forum Students Blog">
    <meta name="author" content="vkoll29">
    <link rel="icon" href="../../favicon.ico">

    <title>KU Gossip Corner</title>

    <!-- Bootstrap core CSS -->
    <link href="styles/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="styles/custom.css" rel="stylesheet">
</head>

<body>

<div class="blog-masthead">
    <div class="container">
        <nav class="blog-nav">
            <a class="blog-nav-item active" href="index.php">Home</a>
            <a class="blog-nav-item" href="#">All Posts</a>
            <a class="blog-nav-item" href="#">Services</a>
            <a class="blog-nav-item" href="#">About</a>
            <a class="blog-nav-item" href="#">Contact</a>
            <?php if (isset($_SESSION['email'])): ?>
            <a class="blog-nav-item pull-right" href="admin/index.php">Go to Admin Panel</a>
            <?php endif; ?>
        </nav>
    </div>
</div>

<div class="container">

    <div class="blog-header">
        <h1 class="blog-title">KU Gossip Corner</h1>
        <p class="lead blog-description">KU Events, News and Celebs</p>
    </div>

    <div class="row">

        <div class="col-sm-8 blog-main">

            <?php
             if(!$posts){
                 echo "There are no posts yet";
             }
             else{
            while ($row = $posts->fetch_array()) : ?>
            <div class="blog-post">
                <h2 class="blog-post-title"><?php echo $row['title']; ?></h2>
                <p class="blog-post-meta">On <?php echo formatDate($row['date']). " by " ?><a href="#"><?php echo $row['author']; ?></a></p>
                <img style="float: left; margin-right: 20px; margin-bottom: 10px" src="images/<?php echo $row['image']; ?>" width="200" height="200">
                <p style="text-align: justify"><?php echo substr($row['content'], 0 ,300); ?></p>
                <a id="readmore" href="single_post.php?id=<?php echo $row['id']; ?>">Read more</a><br><br><br><br>

            </div><!-- /.blog-post -->
            <?php endwhile; }?>


        </div><!-- /.blog-main -->