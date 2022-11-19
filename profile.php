<?php
    
    session_start();
    include("db.php");
    include("functions.php");

     $user_data = check_login($con);

	$user_name = $user_data['user_name']; 
    $user_id = $user_data['user_id']; 
    $user_date = $user_data['date'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <a> Username:  </a> 
    <p> <?php echo $user_name ?>  </p>
    <p> ID: </p>
    <p> <?php echo $user_id ?>  </p>
    <p> Signup date:  </p>
    <p> <?php echo $user_date ?>  </p>
    

</head>
<body>
    
</body>
</html>
