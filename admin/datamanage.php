<?php
session_start();
require('../include/config.inc.php');
if($_SESSION['UserID'] == "")
	{
		header("location:login.php");
	}
$conn = mysqli_connect($server,$username,$password,$dbname);
$sql = "SELECT * FROM data ORDER BY data_id ASC";
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
      <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">เพิ่มข้อมูล</button>
</br></br>
      <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">สถานที่</th>
      <th scope="col">ข้อมูล</th>
      <th scope="col">รูปภาพ</th>
      <th scope="col">Process</th>
    </tr>
  </thead>
  <tbody>
<?php
while ($obj=mysqli_fetch_array($query,MYSQLI_ASSOC)){
?>
    <tr>
      <td><?php echo $obj['data_id']?></td>
      <td><?php echo $obj['data_name']?></td>
      <td><?php echo $obj['data_detail']?></td>
      <td><?php echo $obj['data_pic']?></td>
      <td>
				<a href="edit.data.php?id=<?php echo $obj['data_id']?>" class="btn btn-warning" ><i class="far fa-edit"></i></a>
				<a href="?id=<?php echo $obj['data_id']?>" class="btn btn-danger" onClick="javascript:return confirm('คุณต้องการลบ <?php echo $obj['data_name']?> ใช่หรือไม่');"><i class="far fa-trash-alt"></i></a>
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
            <h5 class="modal-title" id="exampleModalLabel">เพิ่มข้อมูล</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="insert.data.php" method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label for="exampleInputEmail1">ชื่อสถานที่</label>
    <input type="text" class="form-control" name="dataname" placeholder="กรุณากรอกข้อมูล">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">ข้อมูล</label>
    <textarea rows="4" cols="50" name="datadetail" class="form-control">
</textarea>
  </div>
	<div class="form-group">
    <label for="exampleInputEmail1">หมวดหมู่</label>
    <select class="form-control" name="datacategory">
    	<option selected="selected">=== กรุณาเลือกหมวดหมู่ ==</option>
			<option value="dhamm">ธรรมะ</option>
			<option value="nature">ธรรมชาติ</option>
			<option value="culture">วัฒนธรรม</option>
    </select>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">รูปภาพ</label>
    <input type="file" name="fileToUpload" class="form-control" accept="image/*">
  </div>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">ยกเลิก</button>
            <button type="submit" class="btn btn-primary">บันทึก</button>
            </form>
          </div>
        </div>
      </div>
    </div>
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
