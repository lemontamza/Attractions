<?php
require('include/config.inc.php');
$conn = mysqli_connect($server,$username,$password,$dbname);
$sql = "SELECT * FROM slide ORDER BY slide_id ASC";
$query = mysqli_query($conn,$sql);

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>แนะนำการท่องเที่ยวฤ</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/starter-template.css" rel="stylesheet">
  </head>


  <body>

    <nav class="navbar fixed-bottom navbar-expand-sm navbar-dark bg-dark">
      <a class="navbar-brand" href="#">Attractions</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="data.php?c=dhamm&p=list">ธรรมมะ</a>
            </li>
          <li class="nav-item">
            <a class="nav-link" href="data.php?c=nature&p=list">ธรรมชาติ</a>
            </li>
          <li class="nav-item">
            <a class="nav-link" href="data.php?c=culture&p=list">วัฒนธรรม</a>
          </li>

        </ul>
      </div>
    </nav>

    <main role="main" class="container">

      <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
      <?php
      while ($obj=mysqli_fetch_array($query,MYSQLI_ASSOC)){
      ?>
      <div class="carousel-item <?php if($obj['slide_active']=='active'){ echo "active";}?>">
        <img class="d-block w-100" src="slide/<?php echo $obj['slide_pic']?>" alt="<?php echo $obj['slide_pic']?>">
      </div>
      <?php
      }
      ?>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>

    </main><!-- /.container -->

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery.slim.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
