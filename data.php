<?php
require('include/config.inc.php');
$conn = mysqli_connect($server,$username,$password,$dbname);
$sql = "SELECT * FROM data WHERE data_category = 'main'";
$query = mysqli_query($conn,$sql);
$result=mysqli_fetch_array($query,MYSQLI_ASSOC);
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Starter Template for Bootstrap</title>

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
            <a class="nav-link" href="#">ธรรมมะ</a>
            </li>
          <li class="nav-item">
            <a class="nav-link" href="#">ธรรมชาติ</a>
            </li>
          <li class="nav-item">
            <a class="nav-link" href="#">วัฒนธรรม</a>
          </li>

        </ul>
        <form class="form-inline my-2 my-lg-0">
          <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
      </div>
    </nav>

    <main role="main" class="container">

      <h1><?php echo $result['data_name']?></h1>
      <h3><?php echo $result['data_detail']?></h3>
      <img src="images/<?php echo $result['data_pic']?>" />

    </main><!-- /.container -->

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery.slim.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
