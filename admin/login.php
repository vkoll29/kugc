<?php
session_start();
?>
<!DOCTYPE html>
<html >
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Login | KU Gossip Corner</title>


    <link rel="stylesheet" href="css/reset.css">


    <link rel="stylesheet" href="css/style.css">




</head>

<body>

<div class="wrap">
    <div class="avatar">
        <img src="images/kings.png">
    </div>
    <form action="login.php" method="post">
    <input name="email" type="email" placeholder="email" required>
    <div class="bar">
        <i></i>
    </div>
    <input name="password" type="password" placeholder="password" required>
    <!--a href="" class="forgot_link">forgot ?</a-->
    <button type="submit" name="login">Sign in</button>
    </form>
</div>

<script src="js/index.js"></script>




</body>
</html>
<?php
if (isset($_SESSION['signed_in']) && $_SESSION['signed_in'])
{
    header("location: index.php?msg= You are already signed in");
}
include "../libs/config.php";
include "../libs/database.php";

$db = new database();

if(isset($_POST['login']))
{
    $email = $_POST['email'];
    $password = $_POST['password'];
    $query = "SELECT * FROM admin WHERE email = '$email' AND password = '$password'";
    $user = $db->select($query);
    if ($user === FALSE)
    {
        echo "You entered the wrong username/password. Please try again";
    }
    //TODO: find a way to make this if block meaningful without the redundancy
    else {
        $check = $user->num_rows;

        if ($check > 0) {
            //$_SESSION['email'] = $email;
            $_SESSION['signed_in'] = TRUE;
            while ($row = $user->fetch_assoc())
            {
                $_SESSION['author'] = $row['username'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['user_id'] = $row['id'];
            }
            header("location: index.php?msg= successfully logged in as ". $_SESSION['author']);
        }
        else
        {
            echo "You entered the wrong username/password. Please try again";
        }
    }
}
?>