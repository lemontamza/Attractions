<?php
session_start();
require('../include/config.inc.php');
if($_SESSION['UserID'] == "")
	{
		header("location:login.php");
	}
$id = $_GET["id"];
$conn = mysqli_connect($server,$username,$password,$dbname);
$sql = "SELECT * FROM data WHERE data_id = '".$id."'";
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

    <title>จัดการข้อมูล</title>

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
		<link href="../css/fontawesome-all.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="../css/sticky-footer-navbar.css" rel="stylesheet">
  </head>

  <body>

    <header>
      <!-- Fixed navbar -->
      <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <a class="navbar-brand" href="#">Admin Page!!</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item ">
              <a class="nav-link" href="admin.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="datamanage.php">จัดการข้อมูล</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="logout.php">ออกจากระบบ</a>
            </li>
          </ul>
        </div>
      </nav>
    </header>

    <!-- Begin page content -->
    <main role="main" class="container">
      <?php
      while ($obj=mysqli_fetch_array($query,MYSQLI_ASSOC)){
      ?>
      <form action="edit.data.process.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $obj['data_id']?>" />
        <div class="form-group">
          <label for="exampleInputEmail1">ชื่อสถานที่</label>
            <input type="text" class="form-control" name="dataname" value="<?php echo $obj['data_name']?>">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">ข้อมูล</label>
            <textarea rows="4" cols="50" name="datadetail" class="form-control" ><?php echo $obj['data_detail']?></textarea>
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">หมวดหมู่</label>
          <select class="form-control" name="datacategory">
            <option>=== กรุณาเลือกหมวดหมู่ ==</option>
            <option value="dhamm" <?php if($obj['data_category']=='dhamm'){ echo "selected='selected'";}?>>ธรรมะ</option>
            <option value="nature" <?php if($obj['data_category']=='nature'){ echo "selected='selected'";}?>>ธรรมชาติ</option>
            <option value="culture" <?php if($obj['data_category']=='culture'){ echo "selected='selected'";}?>>วัฒนธรรม</option>
          </select>
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">รูปภาพ</label>
        </br><img src="../images/<?php echo $obj['data_pic']?>" width="200px" />
            <input type="hidden" name="datapic" value="<?php echo $obj['data_pic']?>" />
            <input type="file" name="fileToUpload" class="form-control" accept="image/*">
          </div>
          <a href="datamanage.php" class="btn btn-danger"><i class="fas fa-times"></i> ยกเลิก</a>
          <button type="submit" class="btn btn-success"><i class="far fa-save"></i> บันทึก</button>

        </form>
        <?php
      }
        ?>
      </main>
<footer class="footer">
  <div class="container">
    <span class="text-muted">Place sticky footer content here.</span>
  </div>
</footer>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../js/jquery.slim.js"></script>
    <script src="../js/bootstrap.min.js"></script>
  </body>
</html>
