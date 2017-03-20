<div class="container">
      <form method="POST">
        <h2>Please Register</h2>
        <div>
	  <label for="inputEmail">Username</label><br>
	  <input type="text" name="username" placeholder="Username" required><br><br>
	</div>
	    <label for ="companyName">Company Name</label><br>
		<input type = "text" name ="companyname"  id="companyName" placeholder="Company name" required><br><br>
		<label for ="projectName">Project Name</label><br>
		<input type = "text" name ="projectname"  id="projectName" placeholder="Project name" required><br><br>
        <label for="inputEmail">Email address</label><br>
        <input type="email" name="email" id="inputEmail" placeholder="Email address" required><br><br>
        <label for="inputPassword">Password</label><br>
        <input type="password" name="password" id="inputPassword" placeholder="Password" required><br><br>
        <button type="submit">Register</button><br><br>
        <a href="Dlogin.php">Login</a>
      </form>
</div>

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
			header('Location: Devsign.php');
        }else
		{
            $_SESSION['msg'] = "User Registration Failed";
			echo $_SESSION['msg'];
			header('Location: Devsign.php');
        }
		if(isset($_SESSION['msg']))
		{
			echo $_SESSION['msg'];
			unset($_SESSIOn['msg']);
			
		}
        
		
    }
    ?>