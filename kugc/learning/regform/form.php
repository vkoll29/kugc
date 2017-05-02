<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registration Form</title>
    <style>
        body{
            padding: 0;
            margin: 0;
            background: silver;
        }

        #form{
            width: 30%;
            height: 400px;
            background: white;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid black;
        }

        input{
            width: 200px;
            height: 30px;
            margin: 5px;
            display: block;
        }

        label{
            margin: 5px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div id="form">
        <h2>Register Here</h2>
        <form action="form.php" method="post">
            <label for="name">Username:</label>
            <input type="text" name="name" placeholder="Enter your preferred username" required="required">
            <label for="email">UserEmail:</label>
            <input type="text" name="email" placeholder="Enter a valid email address" required="required">
            <label for="pass">UserPass:</label>
            <input type="password" name="pass" placeholder="Choose a password" required="required">
            <input type="submit" name="signUp" value="Sign Up">
        </form>
    </div>
</body>
</html>
<?php
include "process.php";

$db = new db();
if(isset($_POST['signUp']))
{
    $user = $_POST['name'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];

    $query = "INSERT INTO users(user_name, user_email, user_pass) VALUES('$user', '$email', '$pass')";
    $run = $db->insert($query);
}


















