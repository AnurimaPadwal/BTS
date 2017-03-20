<?php
@SESSION_START();
include_once("connect.php");
$uid = $_SESSION['user_id'];
$uname = $_SESSION['user_name'];
$q1 = "SELECT * FROM bug order by timestamp DESC";
$res1 = mysqli_query($conn, $q1);
$numRow = mysqli_num_rows($res1);
$count = 1;
echo "All submitted bugs<BR><BR>";
if($numRow>0)
{
	while($count<=$numRow)
{
	$row = mysqli_fetch_array($res1);
	
	echo "Bug Id:&nbsp;<a href= 'selectbug.php?id= ".$row['bid']."'>".$row['bid']."</a><br>";
	echo "Bug Title: ".$row['btitle']."<br>";
	echo "Timestamp: ".$row['timestamp']."<br>";
	
	$count++;
	echo "<br><br><hr>";
	
}

}

echo "<a href = 'userhome.php'>Back</a>";


?>