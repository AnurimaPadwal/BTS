<html lang="en">
<head>
  <title>Bug Tracker</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<style>
.img-responsive{
width:70px;
height:50px;
}

#des{
color:green
}
body {
    background-color: #eee;
}

*[role="form"] {
    max-width: 530px;
    padding: 15px;
    margin: 0 auto;
    background-color: #fff;
    border-radius: 0.3em;
}

*[role="form"] h2 {
    margin-left: 5em;
    margin-bottom: 1em;
}
</style>
<body>
<div class="container-fluid">
	<div class="navbar navbar-default navbar-collapse navbar-fixed-top">
		<div id="navbar-container" class="navbar-container">
			<div class="navbar-header"><a href="bugview.php"><img alt="logo"  src="bug.png" class="img-responsive" /> </a></div>
				<div class="navbar-collapse pull-right">
				<ul class="nav nav-pills navbar-nav">
							<!--<li class="single"><a href="#">LOGOUT</a></li>-->
				</ul>			
				</div>
		
		</div>
		
</div>
</div><br><br><br><br>


<div>
<?php
include_once("connect.php");
@SESSION_START();
$title = $_POST['title'];
$des = $_POST['descr'];
$proj = $_POST['projname'];
$filename=$_FILES["file"]["name"];
echo "Title: ".$title."<br/><br/>";
echo "Description: ".$des."<br/><br/>";
$q1 = "SELECT pname FROM project WHERE pid = '$proj'";
$res1 = mysqli_query($conn, $q1);
$row = mysqli_fetch_array($res1);
echo "Project Name: ".$row['pname']."<br/><br/>";
echo "Project Id: ".$proj."<br/><br/>";
echo "Uploaded on: ";
$date = date("Y-m-d H:i:s");
echo $date;
echo "<br/><br/>";
if($_FILES["file"]["error"]>0)
{
echo "error:".$_FILES["file"]["error"]."<br/>";
}
else
{
$name = $_FILES["file"]["name"];
echo "Uploaded: ".$_FILES["file"]["name"]."<br/>";
echo "Type: ".$_FILES["file"]["type"]."<br/>";
echo "Size: ".$_FILES["file"]["size"]."bytes<br/>";
move_uploaded_file($_FILES["file"]["tmp_name"],"buglogs/".$_FILES["file"]["name"]);
}
$uid = $_SESSION['user_id'];
$query = "INSERT INTO `bug` (btitle, description, timestamp, pid, uid, files) values ('$title', '$des', '$date', '$proj', '$uid', '$name');";
$result = mysqli_query($conn, $query); 
if($result) {
$q2 = "SELECT * FROM bug WHERE btitle = '$title'";
$res2 = mysqli_query($conn, $q2);
$row = mysqli_fetch_array($res2);
$iniSt = "Pending";
$bid = $row['bid'];
$q3 = "INSERT INTO bugdev (bid, status) VALUES ('$bid', '$iniSt')";
$res3 = mysqli_query($conn, $q3); } else die(mysqli_error($conn));
if($result && $res3)
{
	echo"<br><br><br><h2> Bug Submitted<h2>";
	echo"<br><br><a href='bugview.php' >Go Back</a>";
	//echo"<br><br><a href='logout.php' >LOGOUT</a>";
}

?>
</div>