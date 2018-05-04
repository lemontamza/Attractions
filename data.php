<?php
require('include/config.inc.php');
$conn = mysqli_connect($server,$username,$password,$dbname);
$sql = "SELECT * FROM data WHERE data_category = '".$_GET['c']."'";
$query = mysqli_query($conn,$sql);
if ($_GET['p'] == 'list') {
  switch ($_GET['c']) {
  	case 'dhamm':
  		$objtitle = "ธรรมะ";
  		break;
  	case 'nature':
  		$objtitle = "ธรรมชาติ";
  		break;
  	case 'culture':
  		$objtitle = "วัฒนธรรม";
  		break;
  }
}
else {
  $objt=mysqli_fetch_array($query,MYSQLI_ASSOC);
  $objtitle = $objt['data_name'];

}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title><?php echo $objtitle;?></title>

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
          <li class="nav-item <?php if($_GET['c']==''){ echo "active'";}?>">
            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item <?php if($_GET['c']=='dhamm'){ echo "active";}?>">
            <a class="nav-link" href="data.php?c=dhamm&p=list">ธรรมมะ</a>
            </li>
          <li class="nav-item <?php if($_GET['c']=='nature'){ echo "active";}?>">
            <a class="nav-link" href="data.php?c=nature&p=list">ธรรมชาติ</a>
            </li>
          <li class="nav-item <?php if($_GET['c']=='culture'){ echo "active";}?>">
            <a class="nav-link" href="data.php?c=culture&p=list">วัฒนธรรม</a>
          </li>

        </ul>
      </div>
    </nav>

    <main role="main" class="container">
      <?php
        if ($_GET['p'] == 'list') {
         while ($obj=mysqli_fetch_array($query,MYSQLI_ASSOC)) {
      ?>
      <div class="list-group">
        <a href="data.php?c=<?php echo $_GET['c'];?>&p=data&id=<?php echo $obj['data_id'];?>" class="list-group-item list-group-item-action"><?php echo $obj['data_name'];?></a>
      </div>
      <?php
      }}elseif ($_GET['p'] == 'data') {
        $sqlsel = "SELECT * FROM data WHERE data_id = '".$_GET['id']."' ";
        $querysel = mysqli_query($conn,$sqlsel);
        while ($objsel=mysqli_fetch_array($querysel,MYSQLI_ASSOC)) {
      ?>
      <p class="h1 text-center"><?php echo $objsel['data_name'];?></p>
      <div class="text-center">
        <img src="images/<?php echo $objsel['data_pic'];?>" class="rounded" width="800px" >
      </div>
      <p><?php echo $objsel['data_detail'];?></p>

      <?php
    }}
      ?>
    </main><!-- /.container -->

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery.slim.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
