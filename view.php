

<?php
require "config/constants.php";
session_start();
include("db.php");



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
  <h1 class="text-center">User Details</h1>
  <div class="container">
    <table class="table table-striped table-bordered table-hover">
      <thead class="table-dark">
        <tr>
          <th  scope="col" >ID</th>
          <th  scope="col">Username</th>
          <th  scope="col">Email</th>
          <th  scope="col"> Password</th>
          <th  scope="col"> Start date</th>
        </tr>  
      </thead>
        <tbody>
          <tr>
               
            <?php
              //  first we check using 'isset() function if the variable is set or not'
              //Processing form data when form is submitted
              if (isset($_GET['user_id'])) {
                  $userid = $_GET['user_id']; 

                  // SQL query to fetch the data where id=$userid & storing data in view_user 
                  $sql="SELECT * FROM users WHERE user_id = {$userid} ";  
                  $query= mysqli_query($con,$sql);            

                  while($row = mysqli_fetch_array($query))
                  {
                      $id = $row['user_id'];
                      $user = $row['user_name'];
                      $email = $row['email'];
                      $pass = $row['password'];
                      $regis_date = $row['date'];
                        echo "<tr >";
                        echo " <td >{$id}</td>";
                        echo " <td > {$user}</td>";
                        echo " <td > {$email}</td>";
                        echo " <td >{$pass} </td>"; 
                        echo " <td >{$regis_date} </td>"; 
                        echo " </tr> ";
                  }
                }
            ?>
          </tr>  
        </tbody>
    </table>
  </div>

   <!-- a BACK Button to go to pervious page -->
  <div class="container text-center mt-5">
    <a href="home.php" class="btn btn-warning mt-5"> Back </a>
  <div>
</body>
</html>
















































