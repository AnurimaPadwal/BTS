<?php
@SESSION_START();
include_once("connect.php");
$pid = $_SESSION['proj_id'];
$q1 = "SELECT * FROM bug WHERE pid = '$pid' order by timestamp desc";
$res1 = mysqli_query($conn, $q1);
$numRow = mysqli_num_rows($res1);
$count = 1;
if($numRow>0)
{
	while($count<=$numRow)
	{
		$row = mysqli_fetch_array($res1);
		echo "Bug Id:&nbsp;<a href= 'devselectbug.php?id= ".$row['bid']."'>".$row['bid']."</a><br>";
	    echo "Bug Title: ".$row['btitle']."<br>";
	    echo "Timestamp: ".$row['timestamp']."<br>";
	
	$count++;
	echo "<br><br><hr>";
	}
}

echo "<a href = 'devhome.php'>Go Back</a>";


?>

