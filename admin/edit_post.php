<?php
include "../libs/config.php";
include "../libs/database.php";
include "../functions.php";

$db = new database();

$id = $_GET['id'];

$query = "SELECT * FROM posts WHERE id='$id'";
$post = $db->select($query);

$single = $post->fetch_array();

//selecting categories
$query = "SELECT * FROM categories";
$cats = $db->select($query);

//updating a post
if(isset($_POST['update']))
{
    //creating variables for inserting into database
    $title = $_POST['title'];
    $content = $_POST['content'];
    $category = $_POST['category'];
    $author = $_POST['author'];
    $tags = $_POST['tags'];
    //creating image variable
    $image = $_FILES['image']['name'];
    $image_tmp = $_FILES['image']['tmp_name'];

    if($title == '' || $category == '' || $content == '' || $author == '' || $tags == '' || $image == '')
    {
        echo "Please fill in all the fields";
    }

    else
    {
        move_uploaded_file($image_tmp, "../images/$image");
        $query = "UPDATE posts SET category_id = '$id', title = '$title', content = '$content', author = '$author', image = '$image', tags = '$tags' WHERE id = $id";
        $run =$db->update($query);
        unlink("../images/".$single['image']);

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
                <a class="blog-nav-item active" href="index.php">Dash Board</a>
                <a class="blog-nav-item" href="add_post.php">Add New Post</a>
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
        <form action="edit_post.php?id=<?php echo $id; ?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label>Post Title</label>
                <input type="text" name="title" class="form-control" placeholder="The title of your post" value="<?php echo $single['title']?>">
            </div>
            <div class="form-group">
                <label>Post Content</label>
                <textarea name="content" class="form-control" rows="3" placeholder="Your post's content goes here"><?php echo $single['content']; ?></textarea>
            </div>
            <select name="category" class="form-control">
                <option>Select a Category</option>
                <?php while ($row = $cats->fetch_array()) : ?>
                    <option value="<?php echo $row['id']; ?>"><?php echo $row['title']; ?></option>
                <?php endwhile; ?>
            </select>
            <div class="form-group">
                <label>Author Name</label>
                <input type="text" name="author" class="form-control" placeholder="Your name" value="<?php echo $single['author']?>">
            </div>
            <div class="form-group">
                <label>Post Image</label>
                <input type="file" name="image">
                <img src="../images/<?php echo $single['image']; ?>" width="100px" height="100px"/>
            </div>
            <div class="form-group">
                <label>Tags</label>
                <input type="text" name="tags" class="form-control" placeholder="Pick good tags for better search ranking" value="<?php echo $single['tags']?>">
            </div>
            <button type="submit" name="update" class="btn btn-warning">Update</button>
            <a href="index.php" class="btn btn-success">Cancel</a>
            <a href="delete_post.php?id=<?php echo $id;?>" class="btn btn-danger">Delete</a>
        </form>
    </div><!-- /.blog-main -->

<?php include "includes/footer.php"; ?>