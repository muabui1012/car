<?php
require "config/constants.php";
session_start();
include("db.php");
	if(isset($_GET['user_id'])) 
		{
		$pid = $_GET['user_id']; 
		}
      
      $sql="SELECT * FROM products WHERE product_id = $pid ";
      $query= mysqli_query($con,$sql);

      while($row = mysqli_fetch_assoc($query))
        {
			$cat = $row['product_cat'];
			$brand = $row['product_brand'];
			$plates = $row['product_plates'];
			$title = $row['product_title'];
			$price = $row['product_price'];
			$image = $row['product_image'];
			$year = $row['product_year'];
			$sold = $row['sold'];
        }
 
    
    if(isset($_POST['update'])) 
    {
	  $pid = $_GET['user_id']; 
      
	  echo $pid;
	  $cat = $_POST['cat'];
	  $brand = $_POST['brand'];
	  $plates = $_POST['plates'];
	  $title = $_POST['name'];
	  $price = $_POST['price'];
	  $image = $_POST['image'];
	  $year = $_POST['year'];
	  $sold = $_POST['sold'];
      $sql = "UPDATE products 
	  			SET product_cat = '{$cat}' , product_brand = '{$brand}' , product_plates = '{$plates}', 
				  product_title = '{$title}' , product_price = '{$price}' , product_year = '{$year}',
				  sold = '{$sold}'
				WHERE product_id = $pid";
      $query = mysqli_query($con, $sql);

       echo "<script type='text/javascript'>alert('User data updated successfully!')</script>";

	   header("Location: admin_product.php");
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
                                <input type="int" name="cat"  class="form-control" value="<?php echo $cat  ?>">
                            </div>

                            <div class="form-group">
                                <label for="brand" class="form-label">Brand</label>
                                <input type="int" name="brand"  class="form-control" value="<?php echo $brand  ?>">
                            </div>
                            
                            <div class="form-group">
                                <label for="plates" class="form-label">Plates</label>
                                <input type="text" name="plates"  class="form-control" value="<?php echo $plates  ?>">
                            </div> 
                            <div class="form-group">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" name="name"  class="form-control" value="<?php echo $title  ?>">
                            </div>  
                            <div class="form-group">
                                <label for="price" class="form-label">Price</label>
                                <input type="int" name="price"  class="form-control" value="<?php echo $price ?>">
                            </div> 
                            <div class="form-group">
                                <label for="image" class="form-label">Image</label>
                                <input type="text" name="image"  class="form-control" value="<?php echo $image  ?>">
                            </div> 
                            <div class="form-group">
                                <label for="year" class="form-label">Year</label>
                                <input type="int" name="year"  class="form-control" value="<?php echo $year  ?>">
                            </div> 
							<div class="form-group">
                                <label for="sold" class="form-label">Sold</label>
                                <input type="int" name="sold"  class="form-control" value="<?php echo $sold  ?>">
                            </div> 

                            <div class="form-group">
         						<input type="submit"  name="update" class="btn btn-primary mt-2" value="update">
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
















































