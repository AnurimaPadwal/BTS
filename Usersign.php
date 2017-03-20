<div class="container">
      <form method="POST">
        <h2>Please Register</h2>
        <div>
	    <label for="inputEmail">Username</label><br>
	    <input type="text" name="username"  placeholder="Username" required><br><br>
	    </div>
        <label for="inputEmail">Email address</label><br>
        <input type="email" name="email" id="inputEmail" placeholder="Email address" required autofocus><br><br>
        <label for="inputPassword">Password</label><br>
        <input type="password" name="password" id="inputPassword" placeholder="Password" required><br><br>
        <button type="submit">Register</button><br><br>
        <a href="Ulogin.php">Login</a>
      </form>
</div>

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
			header('Location: Usersign.php');
        }else{
            $_SESSION['msg'] = "User Registration Failed";
			echo $_SESSION['msg'];
			header('Location: Usersign.php');
        }
		if(isset($_SESSION['msg']))
		{
			echo $_SESSION['msg'];
			unset($_SESSIOn['msg']);
			
		}
    }
    ?>