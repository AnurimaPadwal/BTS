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
  .carousel-inner > .item > img,
  .carousel-inner > .item > a > img {
      width: 50%;
	  height:40%;
      margin: auto;
  }
  .myCar {
  width:200px;
  height:200px;
}
	


	.myCar-text{
	color:#777;
	}
	.modal-content{
	text-align:center;
	}
  </style>
 
<body>
		
<div class="container">
	<div class="row">
		<div class="col-xs-12 col-sm-4 col-md-3 logo">
			
			<img alt="logo"  src="bug.png" class="img-responsive" />
             
		</div>

		<div class="col-xs-12 col-sm-8 col-md-9">
			
				<div class="navbar-header"></div>
					<div class="buttons-container"></div>
						
						
							
						<div class="btn-group pull-right" style = "border-radius: 5px;">
							<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal" >Login as User</button>
							<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#my_Modal">Login as Developer</button>
							<button type="button" class="btn btn-info btn-lg" data-toggle="modal" style="border" data-target="#my_Modal1">Register</button>

							
						</div>	

							<!-- Modal -->
							<div class="modal fade" id="myModal" role="dialog">
								<div class="modal-dialog">
    
							<!-- Modal content-->
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal">&times;</button>
											<h4 class="modal-title">Login as User</h4>
										</div>
										<div class="modal-body">
											<form method="post" action="ulog.php" name="login_form">
												<p><input type="text" class="span3" name="uid" id="uid" placeholder="User Id"></p>
												<p><input type="password" class="span3" name="password" placeholder="Password"></p>
												<p><button type="submit" class="btn btn-primary">Login</button>
												<br><br>
												<a href = "usignup.php">Not an Existing User? Sign up here</a>
												</p>
											</form>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
										</div>
									</div>
      
								</div>
							</div>
  		
							
							<!-- Modal -->
							<div class="modal fade" id="my_Modal" role="dialog">
								<div class="modal-dialog">
    
							<!-- Modal content-->
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal">&times;</button>
											<h4 class="modal-title">Login as Developer</h4>
										</div>
										<div class="modal-body">
											<form method="post" action="dlog.php" name="login_form">
												<p><input type="text" class="span3" name="did" id="did" placeholder="Developer Id"></p>
												<p><input type="password" class="span3" name="password" placeholder="Password"></p>
												<p><button type="submit" class="btn btn-primary">Login</button>
												<br><br>
                                                <a href = "Dsignup.php">Not an Existing User? Sign up here</a>
												</p>
											</form>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
										</div>
									</div>
      
								</div>
							</div>
							
							
							<!-- Modal -->
							<div class="modal fade" id="my_Modal1" role="dialog">
								<div class="modal-dialog">
    
							<!-- Modal content-->
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal">&times;</button>
											<h4 class="modal-title">Registration</h4>
										</div>
										<div class="modal-body">
											
												<p><button type="submit" class="btn btn-primary" onclick="window.location='usignup.php'">User</button>
												<br><br>
												<p><button type="submit" class="btn btn-primary" onclick="window.location='dsignup.php'">Developer</button>
												<br><br>
                                                </p>
											
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
										</div>
									</div>
      
								</div>
							</div>
							
							
							
						
						
				
		</div>
	</div>
		
	
	<br><br>
	
	
	
	<h3 style="color:green;"><center>We provide a platform for Users of Open Source Software to report various bugs encountered directly to the Developers</center></h3>
	<div class="row" style="text-align:center;">
		<a href="#">
		<div class="col-sm-4">
			<h3>About Bug Tracker</h3>
			<p><a href = "aboutus.php">Features of our BTS</a></p>
		</div>
		</a>
		<a href="Anonview.php">
		<div class="col-sm-4">
			<h3>View Bugs</h3>
			<p>Browse our Bug Tracker</p>
			
		</div>
		</a>
		<a href="#">
		<div class="col-sm-4">
			<h3>Developer Team</h3>        
			<p><a href = "aboutus.php">Curiuos enough to know about our team?</a></p>
			<p></p>
		</div>
		</a>
  </div>
  
  <br><br>
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
			<ol class="carousel-indicators">
				<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
				<li data-target="#myCarousel" data-slide-to="1"></li>
				<li data-target="#myCarousel" data-slide-to="2"></li>
				<li data-target="#myCarousel" data-slide-to="3"></li>
			</ol>
				 <div class="carousel-inner" role="listbox">
					
					<div class="item active"><br>
						<img src="issue-tracking.png" class="myCar" width="200" height="100"><br><br><br>
							<div class="carousel-caption">
								<p class="myCar-text">Create and submit you bug.</p>
							</div>
					</div>

					<div class="item ">
						<img src="dashboard-2-fixed.png" class="myCar" width="200" height="100"><br><br><br><br><br>
							<div class="carousel-caption">
								<p class="myCar-text">Get information about each and every bug that is reported</p>
							</div>
					</div>
					
					<div class="item ">
						<img src="details.png" class="myCar" width="200" height="100"><br><br><br><br><br>
							<div class="carousel-caption">
								<p class="myCar-text">Get a view of the detailed information about bug reports</p>
							</div>
					</div>
					
					
					
  
					<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
						<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
							<span class="sr-only">Next</span>
					</a>
					<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
						<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
							<span class="sr-only">Next</span>
					</a>
	
		</div>
</div>
</body>
</html>
