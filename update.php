<?php
require "config/constants.php";
session_start();
include("db.php");
if(isset($_GET['user_id']))
    {
      $userid = $_GET['user_id']; 
    }
      
      $sql="SELECT * FROM users WHERE user_id = $userid ";
      $query= mysqli_query($con,$sql);

      while($row = mysqli_fetch_assoc($query))
        {
          $id = $row['user_id'];
          $user = $row['user_name'];
          $email = $row['email'];
          $pass = $row['password'];
        }
 
    
    if(isset($_POST['update'])) 
    {
      $user = $_POST['user'];
      $email = $_POST['email'];
      $pass = $_POST['pass'];
      
      
      $sql = "UPDATE users SET user_name = '{$user}' , email = '{$email}' , password = '{$pass}' WHERE user_id = $userid";
      $query = mysqli_query($con, $sql);
      echo "<script type='text/javascript'>alert('User data updated successfully!')</script>";
    }         


?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Manger</title>
		<link rel="stylesheet" href="css/bootstrap.min.css"/>
		<script src="js/jquery2.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="main.js"></script>
		<link rel="stylesheet" type="text/css" href="style.css">
		<style></style>
	</head>
<body>
<div class="wait overlay">
	<div class="loader"></div>
</div>
	<div class="navbar navbar-inverse navbar-fixed-top">
		<div class="container-fluid">	
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#collapse" aria-expanded="false">
					<span class="sr-only">navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a href="#" class="navbar-brand">Car Market</a>
			</div>
		<div class="collapse navbar-collapse" id="collapse">
			<ul class="nav navbar-nav navbar-left">				
				<li><a href="admin_user.php"><span class="glyphicon glyphicon-home"></span>User</a></li>
				<li><a href="admin_product.php"><span class="glyphicon glyphicon-modal-window"></span>Product</a></li>	
			</ul>
			<ul class="nav navbar-nav navbar-right">
			
				<li><a href="logout.php"><span class="glyphicon glyphicon-home"></span>	Logout</a></li>
				
				
				
			</ul>
		</div>
	</div>
</div>	
	<p><br/></p>
	<p><br/></p>
	<p><br/></p>

  <h1 class="text-center">Update User Details</h1>
  <div class="container ">
    <form action="" method="post">
      <div class="form-group">
        <label for="user" >Username</label>
        <input type="text" name="user" class="form-control" value="<?php echo $user  ?>">
      </div>

      <div class="form-group">
        <label for="email" >Email ID</label>
        <input type="text" name="email"  class="form-control" value="<?php echo $email  ?>">
      </div>
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    
      <div class="form-group">
        <label for="pass" >Password</label>
        <input type="password" name="pass"  class="form-control" value="<?php echo $pass  ?>">
      </div>    

      <div class="form-group">
         <input type="submit"  name="update" class="btn btn-primary mt-2" value="update">
      </div>
    </form>    
  </div>
  
  <div class="container text-center mt-5">
    <a href="home.php" class="btn btn-warning mt-5"> Back </a>
  <div>
	
</body>
</html>
















































