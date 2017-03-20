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
		
	</div><br><br><br>
<h3 id="des"><center>Report a Bug</center></h3>
	
	            <form action="submitBug.php" class="form-horizontal" role="form" method = "POST" enctype="multipart/form-data">
               
                <div class="form-group">
                    <label for="firstName" class="col-sm-3 control-label">Bug Title</label>
                    <div class="col-sm-9">
                        <input type="text" id="title" name = "title" placeholder="Bug Title" class="form-control" autofocus>
                        
                    </div>
                </div>
               
                
                <div class="form-group">
                    <label for="software" class="col-sm-3 control-label">Software</label>
                    <div class="col-sm-9">
                        <?php
							@SESSION_START();
							include_once("connect.php");
							$q1 = "SELECT * FROM project";
							$res1 = mysqli_query($conn, $q1);
							//echo "Select Software<br><br>";
							echo "<select name = 'projname' value = 'Product Name' >";
							foreach($res1 as $row)
							{
	
								echo "<option value = $row[pid]>$row[pname]</option>";
			
							}
                            echo "</select><br><br>";
						?>
                    </div>
                </div> <!-- /.form-group -->
                
					<div class="form-group">
					 <label for="descr" class="col-sm-3 control-label">Description</label>
						<div class="col-md-9">
							<textarea class="form-control" rows="10" cols="50" name ="descr" id ="descr" placeholder="Enter a detailed description of your Bug here. Please follow standard bug formats." required></textarea>
						</div>
					</div>
                
				<div class="form-group">
                     <label for="file" class="col-sm-3 control-label">Attach log files/screenshots</label><br>
					 <input type="file" id="file" name="file">
					<!-- <div class="col-md-9">
                        <button class="btn btn-danger ">Choose</button>
                    </div> -->
                </div>	
				
                <div class="form-group">
                    <div class="col-sm-9 col-sm-offset-3"><br><br><br>
                        <button type="submit" class="btn btn-primary btn-block" onclick="submitBug.php">Submit Bug Report</button>
                    </div>
                </div>
				<a href = "bugview.php">Back to home</a>
            </form> 
			
</div>
</body>
</html>
