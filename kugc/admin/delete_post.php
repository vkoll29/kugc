<?php
include "../libs/config.php";
include "../libs/database.php";
include "../functions.php";

$db = new database();

//deleting post
if(isset($_GET[id]))
{
    $id = $_GET['id'];

    $query = "DELETE FROM posts WHERE id = $id";
    $run = $db->delete($query);
}
