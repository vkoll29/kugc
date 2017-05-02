<?php
session_start();
if(!isset($_SESSION['email']))
{
    header("location: login.php");
}
else
{
    include "includes/header.php";
    include "includes/footer.php";
}