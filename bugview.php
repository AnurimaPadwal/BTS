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
.navbar {
  display: inline-block;
  float: none;
  vertical-align: top;
}
.navbar {
  text-align: center;
}

</style>
<body>
<div class="container-fluid">
	<div class="navbar navbar-default navbar-collapse navbar-fixed-top">
		<div id="navbar-container" class="navbar-container">
			<div class="navbar-header"><a href="#"><img alt="logo"  src="bug.png" class="img-responsive" /> </a></div>
				<div class="navbar-collapse pull-right">
				<ul class="nav nav-pills navbar-nav">
							<li class="single"><a href="mybugsview.php">View my bugs</a></li>
							<li class="single"><a href="all.php">View all bugs</a></li>
							<li class="single"><a href="create.php">Submit a Bug</a></li>
							<li class="single"><a href="logout.php">Logout</a></li>
				</ul>			
				</div>
		
		</div>
		
	</div><br><br><br><br>
	<div class="page-content">
	<div class="row">
		<div class="col-xs-12 col-md-8">
			<div id="unassigned" class="widget-box widget-color-blue2">
				<div class="widget-header widget-header-small">
				<h4 class="widget-title lighter">
				<i class="ace-icon fa fa-list-alt"></i>
					<a class="white" href="#">Pending</a>		</h4>
					<div class="widget-toolbar">
						<a data-action="collapse" href="#">
							<i class="1 ace-icon fa fa-chevron-up bigger-125"></i>
						</a>
					</div>
				

					<div class="widget-body">
						<div class="widget-main no-padding">
							<div class="table-responsive">
								<table class="table table-bordered table-condensed table-striped table-hover">
								<tbody>
					
						<tr class="table-active">
							<td >Bug Id</td>
							<td>Bug Description</td>
						</tr>	
						
						<?php
@SESSION_START();
include_once("connect.php");
$uid = $_SESSION['user_id'];
$uname = $_SESSION['user_name'];
$q1 = "SELECT bug.bid, bug.btitle, bug.timestamp FROM bug JOIN bugdev ON bug.bid = bugdev.bid WHERE bugdev.status = 'Pending' order by timestamp desc";
$res1 = mysqli_query($conn, $q1);

$numRow = mysqli_num_rows($res1);
$count = 1;
//echo "All submitted bugs<BR><BR>";
if($numRow>0)
{
	while($count<=$numRow)
{
	$row = mysqli_fetch_array($res1);
	                        echo "<tr class='bg-success'>
							      <td class='nowrap width-13 my-buglist-id'>
								  <a href= 'viewbug.php?id= ".$row['bid']."'>".$row['bid']."</a>
							</td>
							<td>
							<span>".$row['btitle']."</span><span class='small'> - <strong>".$row['timestamp']."</strong></span>	</td>
						</tr>";
	
	//echo "Bug Id:&nbsp;<a href= 'viewbug.php?id= ".$row['bid']."'>".$row['bid']."</a><br>";
	//echo "Bug Title: ".$row['btitle']."<br>";
	//echo "Timestamp: ".$row['timestamp']."<br>";
	
	$count++;
	//echo "<br><br>Click to volunteer:&nbsp;<a href= 'volunteer.php?id= ".$row['bid']."'>".$row['bid']."</a><br>";
	//echo "<br><br><hr>";
}
}
?>
			      
		
						
						</tbody>
					</table>
					</div>
					</div>
					</div>
				</div>
			</div>
		</div>
		
		
	</div>
	</div>
	<div class="page-content">
	<div class="row">
		<div class="col-xs-12 col-md-8">
			<div id="unassigned" class="widget-box widget-color-blue2">
				<div class="widget-header widget-header-small">
				<h4 class="widget-title lighter">
				<i class="ace-icon fa fa-list-alt"></i>
					<a class="white" href="#">Under Review</a>		</h4>
					<div class="widget-toolbar">
						<a data-action="collapse" href="#">
							<i class="1 ace-icon fa fa-chevron-up bigger-125"></i>
						</a>
					</div>
				

					<div class="widget-body">
						<div class="widget-main no-padding">
							<div class="table-responsive">
								<table class="table table-bordered table-condensed table-striped table-hover">
								<tbody>
					
						<tr class="table-active">
							<td >Bug Id</td>
							<td>Bug Description</td>
						</tr>	
						
						<?php
@SESSION_START();
include_once("connect.php");
$uid = $_SESSION['user_id'];
$uname = $_SESSION['user_name'];
$q1 = "SELECT bug.bid, bug.btitle, bug.timestamp FROM bug JOIN bugdev ON bug.bid = bugdev.bid WHERE bugdev.status = 'Under Review' order by timestamp desc";
$res1 = mysqli_query($conn, $q1);

$numRow = mysqli_num_rows($res1);
$count = 1;
//echo "All submitted bugs<BR><BR>";
if($numRow>0)
{
	while($count<=$numRow)
{
	$row = mysqli_fetch_array($res1);
	                        echo "<tr class='bg-success'>
							      <td class='nowrap width-13 my-buglist-id'>
								  <a href= 'viewbug.php?id= ".$row['bid']."'>".$row['bid']."</a>
							</td>
							<td>
							<span>".$row['btitle']."</span><span class='small'> - <strong>".$row['timestamp']."</strong></span>	</td>
						</tr>";
	
	//echo "Bug Id:&nbsp;<a href= 'viewbug.php?id= ".$row['bid']."'>".$row['bid']."</a><br>";
	//echo "Bug Title: ".$row['btitle']."<br>";
	//echo "Timestamp: ".$row['timestamp']."<br>";
	
	$count++;
	//echo "<br><br>Click to volunteer:&nbsp;<a href= 'volunteer.php?id= ".$row['bid']."'>".$row['bid']."</a><br>";
	//echo "<br><br><hr>";
}
}
?>
			      
		
						
						</tbody>
					</table>
					</div>
					</div>
					</div>
				</div>
			</div>
		</div>
		
		
	</div>
	</div><div class="page-content">
	<div class="row">
		<div class="col-xs-12 col-md-8">
			<div id="unassigned" class="widget-box widget-color-blue2">
				<div class="widget-header widget-header-small">
				<h4 class="widget-title lighter">
				<i class="ace-icon fa fa-list-alt"></i>
					<a class="white" href="#">Under Process</a>		</h4>
					<div class="widget-toolbar">
						<a data-action="collapse" href="#">
							<i class="1 ace-icon fa fa-chevron-up bigger-125"></i>
						</a>
					</div>
				

					<div class="widget-body">
						<div class="widget-main no-padding">
							<div class="table-responsive">
								<table class="table table-bordered table-condensed table-striped table-hover">
								<tbody>
					
						<tr class="table-active">
							<td >Bug Id</td>
							<td>Bug Description</td>
						</tr>	
						
						<?php
@SESSION_START();
include_once("connect.php");
$uid = $_SESSION['user_id'];
$uname = $_SESSION['user_name'];
$q1 = "SELECT bug.bid, bug.btitle, bug.timestamp FROM bug JOIN bugdev ON bug.bid = bugdev.bid WHERE bugdev.status = 'Under Process' order by timestamp desc";
$res1 = mysqli_query($conn, $q1);

$numRow = mysqli_num_rows($res1);
$count = 1;
//echo "All submitted bugs<BR><BR>";
if($numRow>0)
{
	while($count<=$numRow)
{
	$row = mysqli_fetch_array($res1);
	                        echo "<tr class='bg-success'>
							      <td class='nowrap width-13 my-buglist-id'>
								  <a href= 'viewbug.php?id= ".$row['bid']."'>".$row['bid']."</a>
							</td>
							<td>
							<span>".$row['btitle']."</span><span class='small'> - <strong>".$row['timestamp']."</strong></span>	</td>
						</tr>";
	
	//echo "Bug Id:&nbsp;<a href= 'viewbug.php?id= ".$row['bid']."'>".$row['bid']."</a><br>";
	//echo "Bug Title: ".$row['btitle']."<br>";
	//echo "Timestamp: ".$row['timestamp']."<br>";
	
	$count++;
	//echo "<br><br>Click to volunteer:&nbsp;<a href= 'volunteer.php?id= ".$row['bid']."'>".$row['bid']."</a><br>";
	//echo "<br><br><hr>";
}
}
?>
			      
		
						
						</tbody>
					</table>
					</div>
					</div>
					</div>
				</div>
			</div>
		</div>
		
		
	</div>
	</div><div class="page-content">
	<div class="row">
		<div class="col-xs-12 col-md-8">
			<div id="unassigned" class="widget-box widget-color-blue2">
				<div class="widget-header widget-header-small">
				<h4 class="widget-title lighter">
				<i class="ace-icon fa fa-list-alt"></i>
					<a class="white" href="#">Resolved</a>		</h4>
					<div class="widget-toolbar">
						<a data-action="collapse" href="#">
							<i class="1 ace-icon fa fa-chevron-up bigger-125"></i>
						</a>
					</div>
				

					<div class="widget-body">
						<div class="widget-main no-padding">
							<div class="table-responsive">
								<table class="table table-bordered table-condensed table-striped table-hover">
								<tbody>
					
						<tr class="table-active">
							<td >Bug Id</td>
							<td>Bug Description</td>
						</tr>	
						
						<?php
@SESSION_START();
include_once("connect.php");
$uid = $_SESSION['user_id'];
$uname = $_SESSION['user_name'];
$q1 = "SELECT bug.bid, bug.btitle, bug.timestamp FROM bug JOIN bugdev ON bug.bid = bugdev.bid WHERE bugdev.status = 'Resolved' order by timestamp desc";
$res1 = mysqli_query($conn, $q1);

$numRow = mysqli_num_rows($res1);
$count = 1;
//echo "All submitted bugs<BR><BR>";
if($numRow>0)
{
	while($count<=$numRow)
{
	$row = mysqli_fetch_array($res1);
	                        echo "<tr class='bg-success'>
							      <td class='nowrap width-13 my-buglist-id'>
								  <a href= 'viewbug.php?id= ".$row['bid']."'>".$row['bid']."</a>
							</td>
							<td>
							<span>".$row['btitle']."</span><span class='small'> - <strong>".$row['timestamp']."</strong></span>	</td>
						</tr>";
	
	//echo "Bug Id:&nbsp;<a href= 'viewbug.php?id= ".$row['bid']."'>".$row['bid']."</a><br>";
	//echo "Bug Title: ".$row['btitle']."<br>";
	//echo "Timestamp: ".$row['timestamp']."<br>";
	
	$count++;
	//echo "<br><br>Click to volunteer:&nbsp;<a href= 'volunteer.php?id= ".$row['bid']."'>".$row['bid']."</a><br>";
	//echo "<br><br><hr>";
}
}
?>
			      
		
						
						</tbody>
					</table>
					</div>
					</div>
					</div>
				</div>
			</div>
		</div>
		
		
	</div>
	</div>
	<div class="page-content">
	<div class="row">
		<div class="col-xs-12 col-md-8">
			<div id="unassigned" class="widget-box widget-color-blue2">
				<div class="widget-header widget-header-small">
				<h4 class="widget-title lighter">
				<i class="ace-icon fa fa-list-alt"></i>
					<a class="white" href="#">Invalid</a>		</h4>
					<div class="widget-toolbar">
						<a data-action="collapse" href="#">
							<i class="1 ace-icon fa fa-chevron-up bigger-125"></i>
						</a>
					</div>
				

					<div class="widget-body">
						<div class="widget-main no-padding">
							<div class="table-responsive">
								<table class="table table-bordered table-condensed table-striped table-hover">
								<tbody>
					
						<tr class="table-active">
							<td >Bug Id</td>
							<td>Bug Description</td>
						</tr>	
						
						<?php
@SESSION_START();
include_once("connect.php");
$uid = $_SESSION['user_id'];
$uname = $_SESSION['user_name'];
$q1 = "SELECT bug.bid, bug.btitle, bug.timestamp FROM bug JOIN bugdev ON bug.bid = bugdev.bid WHERE bugdev.status = 'Invalid' order by timestamp desc";
$res1 = mysqli_query($conn, $q1);

$numRow = mysqli_num_rows($res1);
$count = 1;
//echo "All submitted bugs<BR><BR>";
if($numRow>0)
{
	while($count<=$numRow)
{
	$row = mysqli_fetch_array($res1);
	                        echo "<tr class='bg-success'>
							      <td class='nowrap width-13 my-buglist-id'>
								  <a href= 'viewbug.php?id= ".$row['bid']."'>".$row['bid']."</a>
							</td>
							<td>
							<span>".$row['btitle']."</span><span class='small'> - <strong>".$row['timestamp']."</strong></span>	</td>
						</tr>";
	
	//echo "Bug Id:&nbsp;<a href= 'viewbug.php?id= ".$row['bid']."'>".$row['bid']."</a><br>";
	//echo "Bug Title: ".$row['btitle']."<br>";
	//echo "Timestamp: ".$row['timestamp']."<br>";
	
	$count++;
	//echo "<br><br>Click to volunteer:&nbsp;<a href= 'volunteer.php?id= ".$row['bid']."'>".$row['bid']."</a><br>";
	//echo "<br><br><hr>";
}
}
?>
			      
		
						
						</tbody>
					</table>
					</div>
					</div>
					</div>
				</div>
			</div>
		</div>
		
		
	</div>
	</div>	
</div>
</body>
</html>