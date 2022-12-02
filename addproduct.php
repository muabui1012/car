<?php
require "config/constants.php";
session_start();
include("db.php");
if(isset($_POST['create'])) 
{
    $cat = $_POST['cat'];
    $brand = $_POST['brand'];
    $plates = $_POST['plates'];
    $title = $_POST['name'];
    $price = $_POST['price'];
    $image = $_POST['image'];
    $year = $_POST['year'];

    
    $sql= "INSERT INTO products(product_cat, product_brand, product_plates, product_title, product_price, product_image, product_year) 
            VALUES('{$cat}','{$brand}','{$plates}','{$title}','{$price}','{$image}','{$year}')";
    $query = mysqli_query($con,$sql);

    
      if (!$query) {
          echo "something went wrong ". mysqli_error($con);
      }

      else { echo "<script type='text/javascript'>alert('User added successfully!')</script>";
          }         
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
	
    <div class="container-fluid">
		<div class="row">
			<div class="col-md-1"></div>
			<div class="col-md-2 col-xs-12">
				<div id="get_category">
				</div>
				
				<div id="get_brand"> 
				</div>
			
			</div>
			<div class="col-md-8 col-xs-12">
				<div class="row">
					<div class="col-md-12 col-xs-12" id="product_msg">
					</div>
				</div>
				<div class="panel panel-info">
					<div class="panel-heading">Add products</div>
					<div class="panel-body">
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="cat" class="form-label">Categories</label>
                                <input type="int" name="cat"  class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="brand" class="form-label">Brand</label>
                                <input type="int" name="brand"  class="form-control">
                            </div>
                            
                            <div class="form-group">
                                <label for="plates" class="form-label">Plates</label>
                                <input type="text" name="plates"  class="form-control">
                            </div> 
                            <div class="form-group">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" name="name"  class="form-control">
                            </div>  
                            <div class="form-group">
                                <label for="price" class="form-label">Price</label>
                                <input type="int" name="price"  class="form-control">
                            </div> 
                            <div class="form-group">
                                <label for="image" class="form-label">Image</label>
                                <input type="text" name="image"  class="form-control">
                            </div> 
                            <div class="form-group">
                                <label for="year" class="form-label">Year</label>
                                <input type="int" name="year"  class="form-control">
                            </div> 
                            <div class="form-group">
                                <input type="submit"  name="create" class="btn btn-primary mt-2" value="submit">
                            </div>
                        
                        </form> 
                           
					</div>
					
				</div>
			</div>
			<div class="col-md-1"></div>
		</div>
	</div>

    
  



    <div class="container text-center mt-5">
      <a href="../index.php" class="btn btn-warning mt-5"> Back </a>
    <div>
</body>
</html>
















































