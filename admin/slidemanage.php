<?php
session_start();
require('../include/config.inc.php');
if($_SESSION['UserID'] == "")
	{
		header("location:login.php");
	}
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
            <li class="nav-item">
              <a class="nav-link" href="datamanage.php">จัดการข้อมูล</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="slidemanage.php">จัดการสไลด์</a>
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
      <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">เพิ่มสไลด์</button>
</br></br>
      <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">รูปภาพ</th>
      <th scope="col">Process</th>
    </tr>
  </thead>
  <tbody>
<?php
while ($obj=mysqli_fetch_array($query,MYSQLI_ASSOC)){
?>
    <tr>
      <td><?php echo $obj['slide_id']?></td>
      <td><?php echo "<img src='../slide/".$obj['slide_pic']."' width='200px'>"?></td>
      <td>
				<a href="delete.slide.php?id=<?php echo $obj['slide_id']?>&p=<?php echo $obj['slide_pic']?>" class="btn btn-danger" onClick="javascript:return confirm('คุณต้องการลบ <?php echo $obj['data_name']?> ใช่หรือไม่');"><i class="far fa-trash-alt"></i></a>
			</td>
    </tr>
<?php
}
?>
  </tbody>
</table>
    </main>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">เพิ่มสไลด์</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="insert.slide.php" method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label for="exampleInputEmail1">รูปภาพ</label>
    <input type="file" name="fileToUpload" class="form-control" accept="image/*">
  </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times"></i> ยกเลิก</button>
            <button type="submit" class="btn btn-success"><i class="far fa-save"></i> บันทึก</button>
            </form>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../js/jquery.slim.js"></script>
    <script src="../js/bootstrap.min.js"></script>
  </body>
</html>
