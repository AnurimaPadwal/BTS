<html lang="en">
<head>
  <title>Sign Up</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<style>
/*.back{
background-color:gray;
opacity:0.5;
}*/
.centered-form{
	margin-top: 60px;
}

.centered-form .panel{
	background: rgba(255, 255, 255, 0.8);
	box-shadow: rgba(0, 0, 0, 0.3) 20px 20px 20px;
}
</style>
<body>
<div class="container">
        <div class="row centered-form">
        <div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
        	<div class="panel panel-default">
        		<div class="panel-heading">
			    		<h3 class="panel-title">Please Register<small></small></h3>
			 			</div>
			 			<div class="panel-body">
			    		<form method = "POST">
			    			<div class="row">
			    				<div class="col-xs-6 col-sm-6 col-md-12">
			    					<div class="form-group">
			                <input type="text" name="username" id="username" class="form-control input-sm" placeholder="Username">
			    					</div>
			    				</div>
			    				
			    			</div>

			    			<div class="form-group">
			    				<input type="email" name="email" id="email" class="form-control input-sm" placeholder="Email Address">
			    			</div>
							
							<div class="row">
			    				<div class="col-xs-6 col-sm-6 col-md-12">
			    					<div class="form-group">
			                <input type="text" name="companyname" id="companyname" class="form-control input-sm" placeholder="Company Name">
			    					</div>
			    				</div>
			    				
			    			</div>
							
							<div class="row">
			    				<div class="col-xs-6 col-sm-6 col-md-12">
			    					<div class="form-group">
			                <input type="text" name="projectname" id="projectname" class="form-control input-sm" placeholder="Project Name">
			    					</div>
			    				</div>
			    				
			    			</div>

			    			<div class="row">
			    				<div class="col-xs-6 col-sm-6 col-md-12">
			    					<div class="form-group">
			    						<input type="password" name="password" id="password" class="form-control input-sm" placeholder="Password">
			    					</div>
			    				</div>
			    				
								</div>
			    			
			    			<input type="submit" value="Register" class="btn btn-info btn-block">
			    		
			    		</form>
						<a href = "bugtrack.php">Proceed to Login</a>
			    	</div>
	    		</div>
    		</div>
    	</div>
    </div>
	
	</body>
	</html>
	
	<?php
	@session_start();
	require('connect.php');
    if (isset($_POST['username']) && isset($_POST['password']) && (isset($_POST['companyname'])) && (isset($_POST['projectname'])))
	{
        $username = $_POST['username'];
		//echo $username;
	    $email = $_POST['email'];
		//echo $email;
        $password = $_POST['password'];
		//echo $password;
		$companyname = $_POST['companyname'];
		//echo $companyname;
		$projectname = $_POST['projectname'];
		//echo $projectname;
		$q1 = "INSERT INTO project (pname) values ('$projectname')";
		$res1 = mysqli_query($conn, $q1);
		$q2 = "SELECT * FROM project WHERE pname = '$projectname';";
		$res2 = mysqli_query($conn, $q2);
		/*if (!$res2) {
            printf("Error: %s\n", mysqli_error($conn));
            exit(); } */
		$row1 = mysqli_fetch_array($res2);
		$prid = $row1['pid'];
		echo "project is:".$prid."";
		$q3 = "INSERT INTO developer (dname, demail, dpassword, dcompany, pid) values ('$username', '$email','$password','$companyname','$prid')";
		$res3 = mysqli_query($conn, $q3);
		
		
		if($res1 && $res2 && $res3)
		{
            $_SESSION['msg'] = "User Created Successfully."; 
			echo $_SESSION['msg'];
			header('Location: dsignup.php');
        }else
		{
            $_SESSION['msg'] = "User Registration Failed";
			echo $_SESSION['msg'];
			header('Location: dsignup.php');
        }
		if(isset($_SESSION['msg']))
		{
			echo $_SESSION['msg'];
			unset($_SESSIOn['msg']);
			
		}
        
		
    }
    ?>