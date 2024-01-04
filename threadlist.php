<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        #q {
            min-height: 100vh;
        }
    </style>
    <title>A-forums</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

<body>
    <?php require 'comps/header1.php' ?>
    <?php require 'comps/connect.php' ?>
    <?php
    $id = $_GET['threadid'];
    $sql = "SELECT * FROM `threads` WHERE t_id = $id;";
    $result = mysqli_query($con, $sql);
    $noresult = true;
    while ($row = mysqli_fetch_assoc($result)) {
        $noresult = false;
        $title = $row['t_title'];
        $desc = $row['t_desc'];
    }
    ?>
    <?php
    $uid = $_GET['uid'];
    $id = $_GET['threadid'];
    $alert = false;
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $comment = $_POST['comment'];
        $sql1 = "SELECT `name` FROM `user_600` WHERE `Sno` = '$uid' " ;
        $selectResult = mysqli_query($con, $sql1);
        $row = mysqli_fetch_assoc($selectResult);
        $nameValue = $row['name'];
        $sql = "INSERT INTO `comments` ( `com_content`, `t_id`, `uid`,`name`) VALUES ('$comment','$id','$uid','$nameValue');";
        $result = mysqli_query($con, $sql);
        $alert = true;
        if ($alert) {
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> Added
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
        }
    }
    ?>
    <div class="container my-4 mx-auto">
        <div class="jumbotron">
            <h1 class="display-4">
                <?php echo $title ?>
            </h1>
            <p class="lead">
                <?php echo $desc ?>
            </p>
            <hr class="my-4">
            <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
            <p><b>Posted By me</b></p>
        </div>
    </div>
    <hr>

    <div class="container">
        <h1 class="py-2">Post a Comment</h1>
        <form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post">
            <div class="mb-3">
                <textarea class="form-control" placeholder="Your Comment" id="comment" name="comment"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Post Comment</button>
        </form>
    </div>
    </div>

    <div class="container " id="q">
        <h1 class="py-3">Discussion</h1>
        <?php
        $uid = $_GET['uid'];
        $id = $_GET['threadid'];
        $sql = "SELECT * FROM `comments` WHERE t_id = $id;";
        $result = mysqli_query($con, $sql);
        $noresult = true;
        while ($row = mysqli_fetch_assoc($result)) {
            $noresult = false;
            $desc = $row['com_content'];
            echo '
            <div class="media d-flex my-3">
            <img class="mr-3" src="http://source.unsplash.com/80x80/?$img,capital" alt="Generic placeholder image">
            <div class =""d-inline>
            <p class="mx-3">'.$row["name"].'</p>
            <div class="media-body mx-3">
               <h5 style="margin-top: 0;">' . $desc . '</h5>
            </div>
            </div>

        </div>';
        }
        if ($noresult) {
            echo '<div class="jumbotron jumbotron-fluid bg-dark text-white">
            <div class="container">
              <p class="display-4">No Question Yet</p>
              <p class="lead">Be the first one to ask a question.</p>
            </div>
          </div>';
        }
        ?>
    </div>

    <?php require 'comps/footer.php' ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>
</body>

</html>