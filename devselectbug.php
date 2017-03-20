<?php
@SESSION_START();
include_once("connect.php");
$_SESSION['bid'] = $_GET["id"];
$bid = $_SESSION['bid'];

$q1 = "SELECT * FROM bug WHERE bid = '$bid'";
$res1 = mysqli_query($conn, $q1);
$row = mysqli_fetch_array($res1);
$title = $row['btitle'];
$des = $row['description'];
$timestamp = $row['timestamp'];
$pid = $row['pid'];
$uid = $row['uid'];
$filename = $row['files'];
$q2 = "SELECT * FROM user WHERE uid = '$uid'";
$res2 = mysqli_query($conn, $q2);
$row2 = mysqli_fetch_array($res2);
$uname = $row2['uname'];

$q3 = "SELECT * FROM project WHERE pid = '$pid'";
$res3 = mysqli_query($conn, $q3);
$row3 = mysqli_fetch_array($res3);
$pname = $row3['pname'];


echo "Bug ID: ".$bid."<br>";
echo "Title: ".$title."<br>";
echo "Description: ".$des."<br>";
echo "Date Submitted: ".$timestamp."<br>";
echo "Reported By: ".$uname."<br>";
echo "Project Name: ".$pname."<br>";
echo "Files Attached: ".$filename."<br><form method = 'post' action = 'filedownload.php'>
<input type = 'hidden' name = 'fileAttachment' value = '$filename'>
<br>
<input type = 'submit' value = 'Download attachment'>
</form><br><br><br>";
//echo "<a href=\"javascript:history.go(-1)\">Go Back</a>";
?>

<form name = 'reviewchanges' id = 'reviewchanges' method = 'POST' action = 'devreview.php'> 
Set Severity:&nbsp;
<select name = 'severity'>
<option value = 'low'>low</option>
<option value = 'moderate'>moderate</option>
<option value = 'high'>high</option>
</select>
<br><br><br>
Set Status:&nbsp;
<select name = 'status'>
<option value = 'Under Review'>Under Review</option>
<option value = 'Under Process'>Under Process</option>
<option value = 'Resolved'>Resolved</option>
<option value = 'Invalid'>Invalid</option>
</select><br>
<br><input type = 'submit' name = 'submit' value = 'Submit'/>
<br><br><br>

</form>

<?php

echo "<a href=\"javascript:history.go(-1)\">Go Back</a>";
?>