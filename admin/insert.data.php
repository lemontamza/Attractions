<?php
session_start();
require('../include/config.inc.php');
if($_SESSION['UserID'] == "")
	{
		header("location:login.php");
	}
$target_dir = SRV_ROOT."images/";
if(move_uploaded_file($_FILES["fileToUpload"]["tmp_name"],$target_dir.$_FILES["fileToUpload"]["name"]))
{
	echo "Copy/Upload Complete";
}
$sql = "INSERT INTO customer (data_name, data_detail, data_pic, data_category) VALUES ('".$_POST["txtCustomerID"]."','".$_POST["txtName"]."')";
$query = mysqli_query($conn,$sql);
if($query) {
	echo "Record add successfully";
}
mysqli_close($conn);

?>
