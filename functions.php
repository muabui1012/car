<?php

function check_login($con)
{

	if(isset($_SESSION['user_id']))
	{

		$id = $_SESSION['user_id'];
		$query = "select * from users where user_id = '$id' limit 1";

		$result = mysqli_query($con,$query);
		if($result && mysqli_num_rows($result) > 0)
		{

			$user_data = mysqli_fetch_array($result);
			return $user_data;
		}
	}

	//redirect to login
	header("Location: login.php");
	die;

}

function check_login_adm($con)
{

	if(isset($_SESSION['user_id']))
	{

		$id = $_SESSION['user_id'];
		$query = "select * from admin where admin_id = '$id' limit 1";

		$result = mysqli_query($con,$query);
		if($result && mysqli_num_rows($result) > 0)
		{

			$user_data = mysqli_fetch_array($result);
			return $user_data;
		}
	}

	//redirect to login
	header("Location: login.php");
	die;

}




function get_user_name($con) {
	
		$uid = $_SESSION['user_id'];
		$u_query = "select * from users where '$uid' = user_id";
		$u_run_query = mysqli_query($con, $u_query);
		$u_row = mysqli_fetch_array($u_run_query);
		$user_name = $u_row['user_name']; 
		echo $user_name;
		return $user_name;
		
	
}

function random_num($length)
{

	$text = "";
	if($length < 5)
	{
		$length = 5;
	}

	$len = rand(4,$length);

	for ($i=0; $i < $len; $i++) { 
		# code...

		$text .= rand(0,9);
	}

	return $text;
}

