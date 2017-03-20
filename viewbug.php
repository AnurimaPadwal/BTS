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
#header{
color:green;
}
</style>
<body>
<div class="container-fluid">
	<div class="navbar navbar-default navbar-collapse navbar-fixed-top">
		<div id="navbar-container" class="navbar-container">
			<div class="navbar-header"><a href="bugtrack.html"><img alt="logo"  src="bug.png" class="img-responsive" /> </a></div>
				<div class="navbar-collapse pull-right">
				<ul class="nav nav-pills navbar-nav">
							<li class="single"><a href="bugview.php">Back</a></li>
							
				</ul>			
				</div>
		
		</div>
	</div><br><br><br>
	
	<h3 id="header">Issue Details</h3><br><br>
	<div class="col-xs-12 col-md-12">
	<div class="table-responsive">
		<table class="table table-bordered table-condensed ">
			<tbody>
				<tr class="bg-success">
				<td>ID </td>
				<td>Project</td>
				<td colspan = "6"> Date Submitted</td>
				</tr>
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

				$q4 = "SELECT * FROM bugdev WHERE bid = '$bid'";
				$res4 = mysqli_query($conn, $q4);
				$row4 = mysqli_fetch_array($res4);
				$status = $row4['status'];
				$severity = $row4['severity'];
				
				
				if ($status=="Pending")
				{
					$severity = "Bug is not reviewed yet";
					
				}
				
				echo "<tr>
				<td>".$bid."</td>
				<td>".$title."</td>
				<td colspan='6'>".$timestamp."</td>
				</tr>
				
				<tr>
				<td></td>
				</tr>
				<tr>
				<td class='bg-success'>Submitted By</td>
				<td>".$uname."</td>
				<td colspan='6'></td>
				</tr>
				<tr>
				<td class='bg-success'>Status</td>
				<td>".$status."</td>
				<td class='bg-success'>Severity</td>
				<td>".$severity."</td>
				</tr>
				<tr>
				<td class='bg-success'>Attachment</td>
				<td colspan='6'>".$filename."</td>
				<td><form method = 'post' action = 'filedownload.php'>
                <input type = 'hidden' name = 'fileAttachment' value = '$filename'>
				<input type = 'submit' value = 'Download attachment'></td>

               </form>
				</tr>
				<tr>
				<td class='bg-success'>Description</td>
				<td colspan='9'>".$des."</td>
				</tr>";
				?>
				
			</tbody>
		</table>
		
<!--<button type="button" class="btn btn-danger btn-lg">Download Attachment</button>-->		
</body>
</html>