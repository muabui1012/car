<?php 
session_start();

	include("db.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];
		$email = $_POST['email'];

		$query = "select * from users where user_name = '$user_name' or email = '$email' limit 1";
		$result = mysqli_query($con, $query);

		
			if(!empty($user_name) && !empty($email) && !empty($password) && !is_numeric($user_name))
			{
				if (!$result || mysqli_num_rows($result) == 0 ) {
					//save to database
					$user_id = random_num(20);
					$query = "insert into users (user_id,user_name,email,password) values ('$user_id','$user_name','$email','$password')";

					mysqli_query($con, $query);

					echo "Signup successful!";

					header("Location: admin_user.php");
					die;
				} else {
					echo "This username or email is already used!";
				}
			}else
			{
				echo "Please enter some valid information!";
			}
		
		
	}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Signup</title>
</head>
<body>

	<style type="text/css">
	
	#text{

		height: 25px;
		border-radius: 5px;
		padding: 4px;
		border: solid thin #aaa;
		width: 100%;
	}

	#button{

		padding: 10px;
		width: 100px;
		color: white;
		background-color: lightblue;
		border: none;
	}

	#box{

		background-color: grey;
		margin: auto;
		width: 300px;
		padding: 20px;
	}

	</style>

	<div id="box">
		
		<form method="post">
			<div style="font-size: 20px;margin: 10px;color: white;">Signup</div>
			<p style="font-size: 20px;color: lightblue;">Username</p>
			<input id="text" type="text" name="user_name"><br>

			<p style="font-size: 20px;color: lightblue;">Email</p>
			<input id="text" type="text" name="email"><br>
			
			<p style="font-size: 20px;color: lightblue;">Password</p>
			<input id="text" type="password" name="password"><br><br>

			<input id="button" type="submit" value="Signup"><br><br>

			<a href="login.php">Click to Login</a><br><br>
		</form>
	</div>
</body>
</html>