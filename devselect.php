<html lang="en">
<head>
  <title>Bug Tracker</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/css/bootstrap-select.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/js/bootstrap-select.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/js/i18n/defaults-*.min.js"></script>

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
							<li class="single"><a href="devview.php">Back</a></li>
							
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
				
				echo "<tr>
				<td>".$bid."</td>
				<td>".$title."</td>
				
				<td>".$timestamp."</td>
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
				<td class='bg-success'>Attachment</td>
				<td colspan='9'>".$filename."
				<form method = 'post' action = 'filedownload.php'>
				<input type = 'hidden' name = 'fileAttachment' value = '$filename'>
				<input type = 'submit' value = 'Download attachment'>
				</form>
				</td>
				</tr>
				<tr>
				<td class='bg-success'>Description</td>
				<td colspan='9'>".$des."</td>
				</tr>";
				?>
			</tbody>
		</table>
				
				<form name = 'reviewchanges' id = 'reviewchanges' method = 'POST' action = 'devreview.php'> 
				<span   style="width: 20% !important;">Severity</span>	
				
				
				<select style="width: 20% !important;" class="btn btn-info" name = 'severity'>
					 <option value = 'low' selected>Low </option>
					 <option value = 'moderate'>Moderate</option>
					 <option value = 'high'>High</option>
	
				</select>
				
				&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp
				<span  style="width: 20% !important;">Status</span>
				
				<select  style="width: 20% !important;" class="btn btn-info" name = 'status'>
				<option value = 'Under Review' selected>Under Review</option>
				<option value = 'Under Process'>Under Process</option>
				<option value = 'Resolved'>Resolved</option>
				<option value = 'Invalid'>Invalid</option>
				</select>
				&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp
				
				<input type = 'submit' style="width: 20% !important;" name = 'submit' value = 'Submit'/>
				
				</form>
				
			
		
		
	</div>
	</div>
</div>	
</body>
</html>