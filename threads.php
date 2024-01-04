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
    $id = $_GET['catid'];
    $uid = $_GET['uid'];
    $sql = "SELECT * FROM `catagories` WHERE c_id = $id;";
    $result = mysqli_query($con, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        $cname = $row['c_name'];
        $cdesc = $row['c_description'];
    }

    ?>
    <?php
    $alert = false;
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $title = $_POST['title'];
        $desc = $_POST['desc'];
        $sql1 = "SELECT `name` FROM `user_600` WHERE `Sno` = '$uid' " ;
        $selectResult = mysqli_query($con, $sql1);
        $row = mysqli_fetch_assoc($selectResult);
        $nameValue = $row['name'];
        $sql = "INSERT INTO `threads` (`t_id`, `t_title`, `t_desc`, `t_cid`, `name`,`t_uid`)
        VALUES (NULL, '$title', '$desc', '$id', '$nameValue','$uid')";        
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

    <div class="container my-3">
        <div class="jumbotron">
            <h1 class="display-4">Welcome to this
                <?php echo $cname ?> foroum
            </h1>
            <p class="lead">
                <?php echo $cdesc ?>
            </p>
            <hr class="my-4">
            <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
            <p class="lead">
                <a class="btn btn-success btn-lg" href="#" role="button">Learn more</a>
            </p>
        </div>
    </div>
    <hr>

    <div class="container">
        <h1 class="py-2">Ask A Question</h1>
        <form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Problem Title</label>
                <input class="form-control" id="title" name="title" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <textarea class="form-control" placeholder="Your problem" id="desc" name="desc"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    </div>

    <div class="container " id="q">
        <h1 class="text-center py-3">Browse Questions</h1>
        <?php
        
        $sql = "SELECT * FROM `threads` WHERE t_cid = $id;";
        
        $result = mysqli_query($con, $sql);
        $noresult = true;
        while ($row = mysqli_fetch_assoc($result)) {
            $noresult = false;
            $id = $row['t_id'];
            $tile = $row['t_title'];
            $tdesc = $row['t_desc'];
            $name = $row['name'];
            echo '
        <div class="media d-flex my-3">
            <img class="mr-3" src="http://source.unsplash.com/80x80/?$img,capital" alt="Generic placeholder image">
            <div class="media-body mx-3">
            <p>'.$name.'</p>
            <h5 class="mt-0"><a class="text-dark" href="threadlist.php?threadid=' . $id . '&uid=' . $uid . '" style="text-decoration: none;">' . $tile . '</a></h5>
                ' . $tdesc . '
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

        <?php require 'comps/footer.php' ?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
            crossorigin="anonymous"></script>
</body>

</html>