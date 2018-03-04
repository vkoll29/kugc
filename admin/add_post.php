<?php
session_start();
include "../libs/config.php";
include "../libs/database.php";
include "../functions.php";
/*if(!isset($_SESSION['signed_in']))
{
    header("location: login.php");
}*/
$db = new database();

$query = "SELECT * FROM categories";
$cats = $db->select($query);

//Inserting a post
if(isset($_POST['submit']))
{
    //creating variables for inserting into database
    $title = $_POST['title'];
    $content = $_POST['content'];
    $category = $_POST['category'];
    $author = $_SESSION['author'];
    $tags = $_POST['tags'];
    //creating image variable
    $image = $_FILES['image']['name'];
    $image_tmp = $_FILES['image']['tmp_name'];

    if($title == '' || $category == '' || $content == '' || $tags == '' || $image == '')
    {
        echo "Please fill in all the fields";
    }

    else
    {
        move_uploaded_file($image_tmp, "../images/$image");
        $query = "INSERT INTO posts (category_id, title, content, author, image, tags) VALUES ('$category', '$title', '$content', '$author', '$image', '$tags')";
        $run =$db->insert($query);

    }
}

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
                <a class="blog-nav-item" href="index.php">Dash Board</a>
                <a class="blog-nav-item active" href="add_post.php">Add New Post</a>
                <a class="blog-nav-item" href="add_category.php">Add New Category</a>
                <a class="blog-nav-item pull-right" href="../index.php">View Blog</a>
                <a class="blog-nav-item pull-right" href="logout.php">Logout</a>
            </nav>
        </div>
    </div>

<div class="container">

    <div class="row">
    <div class="col-sm-12 blog-main">
        <br />
        <form action="add_post.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label>Post Title</label>
                <input type="text" name="title" class="form-control" placeholder="The title of your post">
            </div>
            <div class="form-group">
                <label>Post Content</label>
                <textarea name="content" class="form-control" rows="3" placeholder="Your post's content goes here"></textarea>
            </div>
            <select name="category" class="form-control">
                <option>Select a Category</option>
                <?php while ($row = $cats->fetch_array()) : ?>
                    <option value="<?php echo $row['id']; ?>"><?php echo $row['title']; ?></option>
                <?php endwhile; ?>
            </select>

            <div class="form-group">
                <label>Post Image</label>
                <input type="file" name="image">
            </div>
            <div class="form-group">
                <label>Tags</label>
                <input type="text" name="tags" class="form-control" placeholder="Pick good tags for better search ranking">
            </div>
            <button type="submit" name="submit" class="btn btn-success">Submit</button>
            <a href="index.php" class="btn btn-danger">Cancel</a>
        </form>
    </div><!-- /.blog-main -->

<?php include "includes/footer.php"; ?>