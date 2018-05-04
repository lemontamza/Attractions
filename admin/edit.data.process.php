<?php
session_start();
require('../include/config.inc.php');
if($_SESSION['UserID'] == "")
	{
		header("location:login.php");
	}
$conn = mysqli_connect($server,$username,$password,$dbname);

$picstatus = '';
$datastatus = '';
$picname = '';
$target_dir = SRV_ROOT."images/";
if(move_uploaded_file($_FILES["fileToUpload"]["tmp_name"],$target_dir.$_FILES["fileToUpload"]["name"]))
{
  $picstatus = 'OK';
  $picname = $_FILES["fileToUpload"]["name"];
}
else {
  $picname = $_POST['datapic'];
}

$sql = "UPDATE data SET
			data_name = '".$_POST["dataname"]."' ,
			data_detail = '".$_POST["datadetail"]."' ,
			data_category = '".$_POST["datacategory"]."' ,
			data_pic = '".$picname."'
			WHERE data_id = '".$_POST["id"]."' ";

	$query = mysqli_query($conn,$sql);
  if($query) {
  	$datastatus = 'OK';
  }else {
  	$datastatus = 'Failed';
  }
echo "อัพเดข้อมูล ".$datastatus."</br>";
header('Refresh: 2; URL=datamanage.php');
	mysqli_close($conn);
?>
