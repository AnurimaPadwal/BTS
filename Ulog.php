<?php
include_once("connect.php");
$id=$_POST['uid'];
$password=$_POST['password'];
$sql="SELECT * FROM user where uid='$id' and upassword='$password' ";
$result=mysqli_query($conn,$sql);
if($result)
{
	$row=mysqli_fetch_array($result);
	@session_start();
	$_SESSION['user_status']='logged in';
	$_SESSION['user_id']=$row['uid'];
	$_SESSION['user_name']=$row['uname'];
	//echo" ".$_SESSION['user_name']."<br/>";
	include_once("bugview.php");
	


}
else
{
echo "invalid";
}
?>