<?php
session_start();
require('../include/config.inc.php');
if($_SESSION['UserID'] == "")
	{
		header("location:login.php");
	}
$conn = mysqli_connect($server,$username,$password,$dbname);
$id = $_GET["id"];
if (isset($id)) {
	$sql = "DELETE FROM data WHERE data_id = '".$id."' ";
	$query = mysqli_query($conn,$sql);
	  	if(mysqli_affected_rows($conn)) {
	  		 echo "ลบข้อมูลสำเร็จ";
	       header('Refresh: 1; URL=datamanage.php');
	  	}
	  	mysqli_close($conn);
}else {
	header("location:datamanage.php");
}
?>
