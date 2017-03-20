<?php
@SESSION_START();
include_once("connect.php");
$_SESSION['bid'] = $_GET['id'];
$bid = $_SESSION['bid'];
$uid = $_SESSION['user_id'];
$q1 = "INSERT INTO `volunteer` (bid,uid) values ('$bid', '$uid')";
$res1 = mysqli_query($conn, $q1);
if($res1)
{
	echo "You have been added the Volunteer List<br><br>";
}
else die(mysqli_error($conn));
$q2 = "SELECT * FROM bug where bid = '$bid'";
$res2 = mysqli_query($conn, $q2);
$row = mysqli_fetch_array($res2);
$pid = $row['pid'];

$q3 = "SELECT * FROM developer where pid = '$pid'";
$res3 = mysqli_query($conn, $q3);
$row1 = mysqli_fetch_array($res3);
$dname = $row1['dname'];
$demail = $row1['demail'];

echo "You can mail Developer ".$dname." at ".$demail. "";
?>