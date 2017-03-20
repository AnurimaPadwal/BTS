<?php
include_once("connect.php");
$did=$_POST['did'];
$password=$_POST['password'];
$sql="SELECT * FROM developer where did='$did' and dpassword='$password' ";
$result=mysqli_query($conn,$sql);
if($result)
{
	$row=mysqli_fetch_array($result);
	@session_start();
	$_SESSION['user_status']='logged in';
	$_SESSION['user_id']=$row['did'];
	$_SESSION['user_name']=$row['dname'];
	$_SESSION['proj_id'] = $row['pid'];
	//echo" ".$_SESSION['user_name']."<br/>";
	include_once("devbugview.php");
	


}
else
{
echo "invalid";
}
?>