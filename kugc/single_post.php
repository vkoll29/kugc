<?php
include "libs/config.php";
include "libs/database.php";
include "functions.php";

/** @var TYPE_NAME $id */
$id = $_GET['id'];

$db = new database();

$query = "SELECT * FROM posts WHERE id ='$id'";

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

            <?php $row = $posts->fetch_array(); ?>
                <div class="blog-post">
                    <h2 class="blog-post-title"><?php echo $row['title']; ?></h2>
                    <p class="blog-post-meta">On <?php echo formatDate($row['date']). " by " ?><a href="#"><?php echo $row['author']; ?></a></p>
                    <img style="float: left; margin-right: 20px; margin-bottom: 10px" src="images/<?php echo $row['image']; ?>" width="400" height="300">
                    <p style="text-align: justify"><?php echo $row['content']; ?></p>

                </div><!-- /.blog-post -->


        </div><!-- /.blog-main -->

<?php
include "includes/sidebar.php";
include "includes/footer.php";
?>