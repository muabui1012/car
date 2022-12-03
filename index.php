<?php
require "config/constants.php";
session_start();
include("db.php");
include("functions.php");

$user_data = check_login($con);


?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Car Market</title>
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
				<li><a href="index.php"><span class="glyphicon glyphicon-home"></span>Home</a></li>
				<li><a href="index.php"><span class="glyphicon glyphicon-modal-window"></span>Product</a></li>	
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li><a href="profile.php"><span class=""></span> <?php $username = get_user_name($con); ?> </a></li>
				<li><a href="logout.php"><span class="glyphicon glyphicon-home"></span>	Logout</a></li>
				<li><a href="cart.php"><span class="glyphicon glyphicon-home"></span>	Cart</a></li>
				
				
			</ul>
		</div>
	</div>
</div>	
	<p><br/></p>
	<p><br/></p>
	<p><br/></p>
	<div class="container">
    
    

        <table class="table table-striped table-bordered table-hover">
          <thead class="table-dark">
            <tr>
    
              <th  scope="col">Cat</th>
              <th  scope="col"> Brand</th>
              <th  scope="col">Name</th>
              <th  scope="col"> Price</th>
              <th  scope="col"> Image</th>
              <th  scope="col"> Year</th>
              <th  scope="col"> Sold</th>
              <th  scope="col" colspan="1" class="text-center">Function</th>
            </tr>  
          </thead>
            <tbody>
              <tr>
 
          <?php
            $sql="SELECT * FROM products";               // SQL query to fetch all table data
            $query= mysqli_query($con,$sql);    // sending the query to the database

            //  displaying all the data retrieved from the database using while loop
            while($row= mysqli_fetch_array($query)){
                $pro_id    = $row['product_id'];
                $pro_cat   = $row['product_cat'];
                $pro_brand = $row['product_brand'];
                $pro_title = $row['product_title'];
                $pro_price = $row['product_price'];
                $pro_image = $row['product_image'];
                $pro_year = $row['product_year'];
                $pro_sold = $row['sold'];
                if ($pro_sold == 0) {
                    $sold = "Available";
                } else {
                    $sold = "SOLD";
                }
    
                $brand_query = "SELECT * FROM brands where brand_id = '$pro_brand'";
                $run_query_1 = mysqli_query($con, $brand_query);
                $brand_row = mysqli_fetch_array($run_query_1);
                $brand_name = $brand_row['brand_title']; 
    
                $cat_query = "SELECT * FROM categories where cat_id = '$pro_cat'";
                $run_query_2 = mysqli_query($con, $cat_query);
                $cat_row = mysqli_fetch_array($run_query_2);
                $cat_name = $cat_row['cat_title'];      
            

              echo "<tr >";
              
              echo " <td > {$cat_name}</td>";
              echo " <td > {$brand_name}</td>";
              echo " <td > {$pro_title}</td>";
              echo " <td > {$pro_price}</td>";
              echo " <td > <img src='product_images/$pro_image' style='width:160px; height:250px;'/> </td>";
              echo " <td > {$pro_year}</td>";
              echo " <td > {$pro_sold}</td>";
             
              echo " <td class='text-center' > <button pid='$pro_id' style='float:right;' id='product' class='btn btn-danger btn-xs'>AddToCart</button></td>";

             
              echo " </tr> ";
            }      
         ?>
              </tr>  
            </tbody>
        </table>
  </div>
</body>
</html>
















































