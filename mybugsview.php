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

#heading{
color:green
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
	<h3 id="heading">My Bugs</h3>
	<div class="all-bugs">
		<div class="row">
			<div class="col-md-12">
				<div class="table-responsive">
					<table class="table table-bordered table-condensed table-striped table-hover">
						<tbody>
							<tr>
								<td>Bug Id</td>
								<td>Bug Description</td>
								<td>Timestamp</td>
							</tr>
							<?php
							@SESSION_START();
							include_once("connect.php");
							$uid = $_SESSION['user_id'];
							$uname = $_SESSION['user_name'];
							$q1 = "SELECT * FROM bug WHERE uid = '$uid' order by timestamp DESC";
							$res1 = mysqli_query($conn, $q1);
							$numRow = mysqli_num_rows($res1);
							$count = 1;
							//echo "All submitted bugs<BR><BR>";
							if($numRow>0)
							{
								while($count<=$numRow)
							{
								$row = mysqli_fetch_array($res1);
								echo "<tr>";
								echo "<td><a href= 'viewbug.php?id= ".$row['bid']."'>".$row['bid']."</a></td>";
								echo "<td>".$row['btitle']."</td>";
								echo "<td>".$row['timestamp']."</td>";
								echo "</tr>";
								$count++;
								//echo "<br><br><hr>";
					
							}

							}
							//echo "<a href = 'userhome.php'>Back</a>";
							?>
						</tbody>
					</table>	
				</div>
			</div>	
		</div>
	</div>
	
	
</div>	
</body>
</html>