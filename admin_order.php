<?php
require "config/constants.php";
session_start();
include("db.php");



?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>User Manager</title>
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
<div class="container">
    
      <a href="create.php" class='btn btn-outline-dark mb-2'> <i class="bi bi-person-plus"></i> Create New User</a>

        <table class="table table-striped table-bordered table-hover">
          <thead class="table-dark">
            <tr>
              <th  scope="col">ID</th>
              <th  scope="col">user_id</th>
              <th  scope="col">product_id</th>
              <th  scope="col" colspan="1" class="text-center">CRUD Operations</th>
            </tr>  
          </thead>
            <tbody>
              <tr>
 
          <?php
            $sql="SELECT * FROM orders";               // SQL query to fetch all table data
            $query= mysqli_query($con,$sql);    // sending the query to the database

            //  displaying all the data retrieved from the database using while loop
            while($row= mysqli_fetch_array($query)){
              $id = $row['order_id'];                
              $user = $row['user_id'];        
                    
              $product = $row['product_id'];  

              echo "<tr >";
              echo " <th scope='row' >{$id}</th>";
              echo " <td > {$id}</td>";
              echo " <td > {$user}</td>";
              echo " <td >{$product} </td>";



              echo " <td  class='text-center'>  <a href='deleteorder.php?delete={$id}' class='btn btn-danger'> <i class='bi bi-trash'></i> DELETE</a> </td>";
              echo " </tr> ";
                  }  
                ?>
              </tr>  
            </tbody>
        </table>
  </div>

<!-- a BACK button to go to the index page -->
<div class="container text-center mt-5">
      <a href="../index.php" class="btn btn-warning mt-5"> Back </a>
    <div>

	
</body>
</html>
















































