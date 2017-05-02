<?php

include "libs/config.php";
include "libs/database.php";
include "functions.php";

$db = new database();
$author = $_POST['author'];
$query = "SELECT FROM admin WHERE author IS $author";
$user = $db->select($query);

$query1 = "SELECT FROM posts WHERE author IS $author";
$posts = $db->select($query1);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title><?php echo $author; ?> | KU Gossip Corner</title>
</head>
<body>
<div class="user">
    <php echo

</div>

</body>
</html>

