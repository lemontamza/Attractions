<?php
session_start();
require('../include/config.inc.php');
if($_SESSION['UserID'] == "")
	{
		header("location:login.php");
	}
$picstatus = '';
$target_dir = SRV_ROOT."slide/";
if(move_uploaded_file($_FILES["fileToUpload"]["tmp_name"],$target_dir.$_FILES["fileToUpload"]["name"]))
{
	$picstatus = 'OK';
}
else {
	$picstatus = 'Failed';
}
/* Mysql Insert */
$conn = mysqli_connect($server,$username,$password,$dbname);
$sql = "INSERT INTO slide (slide_pic) VALUES ('".$_FILES["fileToUpload"]["name"]."')";
$query = mysqli_query($conn,$sql);
if($query) {
	$datastatus = 'OK';
}else {
	$datastatus = 'Failed';
}
echo "บันทึกรูปภาพ ".$picstatus."</br>";
header('Refresh: 2; URL=slidemanage.php');
mysqli_close($conn);

?>
