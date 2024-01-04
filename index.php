<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>A-forums</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

<body bgcolor="grey">
  <?php require 'comps/header.php' ?>
  <?php require 'comps/connect.php' ?>
  <!-- slider -->
  <div id="carouselExampleIndicators" class="carousel slide">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
        aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
        aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
        aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner ">
      <div class="carousel-item active">
        <img src="http://source.unsplash.com/2400x700/?alphabets,capital" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="http://source.unsplash.com/2400x700/?sexy,capital" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="http://source.unsplash.com/2400x700/?nude,girl" class="d-block w-100" alt="...">
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
      data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
      data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>

  <!-- container -->
  <div class="container my-3 mx-auto">
    <h2 class="text-center">Welcome to A-Forums</h2>
    <h2 class="text-center">Categories</h2>
    <div class="row">
      <?php
      $sql = "SELECT * FROM `catagories`";
      $result = mysqli_query($con, $sql);
      while ($row = mysqli_fetch_assoc($result)) { ///get each row as an associative array
        // echo $row['c_id'];
        $img = $row['c_name'];
        echo '
      <div class="col-md-3">
        <div class="card my-3" style="width: 18rem;">
          <img src="http://source.unsplash.com/500x400/?$img,capital" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">' . $img . '</h5>
            <p class="card-text">' . substr($row['c_description'], 0, 100) . '</p>
            <button class="btn btn-primary mx-0"  data-bs-toggle="modal" data-bs-target="#loginModal">View Threads</button>
          </div>
        </div>
      </div>';
      }
      ?>



    </div>
  </div>
  <?php require 'comps/footer.php' ?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
    crossorigin="anonymous"></script>
</body>

</html>