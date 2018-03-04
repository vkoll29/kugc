<?php
include "../libs/config.php";
include "../libs/database.php";
include "../functions.php";

$db = new database();

$query = "SELECT * FROM posts ORDER BY id DESC ";
$posts = $db->select($query);

$query = "SELECT * FROM categories";
$cats = $db->select($query);

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

    <title>Admin Panel| KU Gossip Corner</title>

    <!-- Bootstrap core CSS -->
    <link href="../styles/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../styles/custom.css" rel="stylesheet">
</head>

<body>

<div class="blog-masthead">
    <div class="container">
        <nav class="blog-nav">
            <a class="blog-nav-item active" href="index.php">Dash Board</a>
            <a class="blog-nav-item" href="add_post.php">Add New Post</a>
            <a class="blog-nav-item" href="add_category.php">Add New Category</a>
            <a class="blog-nav-item pull-right" href="../index.php">View Blog</a>
            <a class="blog-nav-item pull-right" href="logout.php">Logout</a>
        </nav>
    </div>
</div>

<div class="container">

    <br />
    <?php
    if (isset($_GET['msg']))
    {
        echo "<div class='alert alert-success'>".$_GET['msg']."</div>";
    }
    ?>
    <div class="row">
        <div class="col-sm-12 blog-main">

            <table class="table table-striped">
                <tr align="center">
                    <td colspan="4"><h1>Manage Your Posts</h1></td>
                </tr>
                <tr>
                    <td>
                <?php
                if(!$posts){
                    echo "There are no posts made yet";
                }
                else{ ?>
                         </td>
                </tr>
                <tr>
                    <th>Post ID</th>
                    <th>Post Title</th>
                    <th>Post Author</th>
                    <th>Post Date</th>
                </tr>


                   <?php while ($row = $posts->fetch_array()) : ?>
                    <tr>
                        <td><?php echo $row['id'] ; ?></td>
                        <td><a href="edit_post.php?id=<?php echo $row['id']; ?>" ><?php echo $row['title'] ; ?></a></td>
                        <td><?php echo $row['author'] ; ?></td>
                        <td><?php echo formatDate($row['date']) ; ?></td>
                    </tr>
                <?php endwhile; } ?>
            </table>
            <br />


            <table class="table table-striped">
                <tr align="center">
                    <td colspan="2"><h1>Manage Your Categories</h1></td>
                </tr>
                <tr>
                    <td>
                        <?php
                        if(!$cats){
                            echo "There are no categories created yet.";
                        }else{ ?>

                    </td>
                </tr>
                <tr>
                    <th>Category ID</th>
                    <th>Category Title</th>
                </tr>
                <?php while ($row1 = $cats->fetch_array()) : ?>
                    <tr>
                        <td> <?php echo $row1['id'] ; ?></td>
                        <td><a href="edit_category.php?id=<?php echo $row1['id']; ?>" ><?php echo $row1['title'] ; ?></a></td>
                    </tr>
                <?php endwhile; }?>
            </table>
        </div><!-- /.blog-main -->