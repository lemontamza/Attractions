<?php
session_start();
require('../include/config.inc.php');
if($_SESSION['UserID'] == "")
	{
		header("location:login.php");
	}
$dataname = $_POST['dataname'];
$datadetail = $_POST['datadetail'];
$datacategory = $_POST['datacategory'];
$picstatus = '';
$datastatus = '';
$target_dir = SRV_ROOT."images/";
if(move_uploaded_file($_FILES["fileToUpload"]["tmp_name"],$target_dir.$_FILES["fileToUpload"]["name"]))
{
	$picstatus = 'OK';
}
else {
	$picstatus = 'Failed';
}
/* Mysql Insert */
$conn = mysqli_connect($server,$username,$password,$dbname);
$sql = "INSERT INTO data (data_name, data_detail, data_pic, data_category) VALUES ('".$dataname."','".$datadetail."','".$_FILES["fileToUpload"]["name"]."','".$datacategory."')";
$query = mysqli_query($conn,$sql);
if($query) {
	$datastatus = 'OK';
}else {
	$datastatus = 'Failed';
}
echo "บันทึกข้อมูล ".$datastatus."</br>";
echo "บันทึกรูปภาพ ".$picstatus."</br>";
header('Refresh: 2; URL=datamanage.php');
mysqli_close($conn);

?>
