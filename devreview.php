<?php
@SESSION_START();
include_once("connect.php");
$bid = $_SESSION['bid'];
/*while( list($var, $value) = each($_POST)){
	echo "$var = $value <br>";
}
*/
$status = $_POST['status'];
$severity =$_POST['severity'];


$query = "UPDATE bugdev SET status = '$status', severity = '$severity' WHERE bid = '$bid'";
$result = mysqli_query($conn, $query);
if($result)
{
	echo "Success";
}
echo "<br><br>";

echo "<a href=\"javascript:history.go(-1)\">Go Back</a>";
?>