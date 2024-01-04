<?php
$e = false;
$server = "localhost";
$username = "root";
$password = "";
$data = "foroums";
//create database connection
$con = mysqli_connect($server, $username, $password, $data);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $pass = $_POST["password"];
    $cpass = $_POST["cpass"];
    if ($pass == $cpass) {
        $sql = "INSERT INTO `user_600` (`name`, `password`) VALUES ('$username', '$pass')";
        $result = mysqli_query($con, $sql);
        if ($result) {
            $e = true;
        }
    } else {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Failed</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }
}

if ($e == true) {
    header("Location: /learn/forum/index.php");
    exit;
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign Up</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body>
<div class="container my-4">
    <h1 class="text-center">Sign up</h1>
    <form action="/learn/forum/comps/signup.php" method="post" class="mx-auto" style="max-width: 50%;">
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input name="username" id="user" class="form-control" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" name="password" id="pass" class="form-control">
        </div>
        <div class="mb-3">
            <label for="cpassword" class="form-label">Confirm Password</label>
            <input type="password" class="form-control" name="cpass" id="cpassword">
        </div>
        <button type="submit" class="btn btn-primary">Sign up</button>
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>
