<?php
session_start();
$er = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'comps/connect.php';
    $username = $_POST["user"];
    $pass = $_POST["pass"];
    $sql = "SELECT * FROM `user_600` WHERE name='$username' AND password='$pass' ";
    $result = mysqli_query($con, $sql);
    $num = mysqli_num_rows($result);
    if ($num > 0) {
        $row = mysqli_fetch_assoc($result);
        $id = $row['Sno'];
        $_SESSION['user_id'] = $id; 
        $result = mysqli_query($con,$sql);
        header("location: /learn/forum/index1.php?uid=$id");
        exit();
    } else {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Wrong username or password</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }
}
?>

<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="loginModalLabel">Login please</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" method="post">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Name</label>
                        <input name="user" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input name="pass" type="password" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="mb-3">
                    <a class="nav-link active btn btn-primary" aria-current="page" href="comps/signup.php">click here to sign up</a>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
