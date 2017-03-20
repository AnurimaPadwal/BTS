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
			    		<h3 class="panel-title">Please sign up for Bug Tracker <small>It's free!</small></h3>
			 			</div>
			 			<div class="panel-body">
			    		<form name ="form" method = "POST" action = "#">
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
    if (isset($_POST['username']) && isset($_POST['password'])){
        $username = $_POST['username'];
	    $email = $_POST['email'];
        $password = $_POST['password'];
 
        $query = "INSERT INTO `user` (uname, upassword, uemail) VALUES ('$username', '$password', '$email')";
        $result = mysqli_query($conn, $query);
        if($result){
            $_SESSION['msg'] = "User Created Successfully."; 
			echo $_SESSION['msg'];
			header('Location: usignup.php');
        }else{
            $_SESSION['msg'] = "User Registration Failed";
			echo $_SESSION['msg'];
			header('Location: usignup.php');
        }
		if(isset($_SESSION['msg']))
		{
			echo $_SESSION['msg'];
			unset($_SESSIOn['msg']);
			
		}
    }
    ?>