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
			
				
				
			</ul>
		</div>
	</div>
</div>	
	<p><br/></p>
	<p><br/></p>
	<p><br/></p>
	<div class="container-fluid">
		<div class="row">
			
			<div class="col-md-8 col-xs-12">
				<div class="row">
					<div class="col-md-12 col-xs-12" id="product_msg">
					</div>
				</div>
				<div class="panel panel-info">
					<div class="panel-heading">Your cart</div>
					<div class="panel-body">
						<div>
							<!--Here we get product jquery Ajax Request-->
                            <?php
                                $user_id = $user_data['user_id'];
                                // echo $user_id;

                                $sql = "SELECT * FROM orders";

                                $q = mysqli_query($con, $sql);

                                while ($row = mysqli_fetch_array($q))   {
                            
                                    $pro_id = $row['product_id'];
                                    $product_query = "SELECT * FROM products where product_id = '$pro_id'";
                                    $run_query = mysqli_query($con,$product_query);
                                    if(mysqli_num_rows($run_query) > 0){
                                        while($row = mysqli_fetch_array($run_query)){
                                            $pro_id    = $row['product_id'];
                                            $pro_cat   = $row['product_cat'];
                                            $pro_brand = $row['product_brand'];
                                            $pro_title = $row['product_title'];
                                            $pro_price = $row['product_price'];
                                            $pro_image = $row['product_image'];
                                            $pro_year = $row['product_year'];
                                            $pro_sold = $row['sold'];
                                          
                                
                                            $brand_query = "SELECT * FROM brands where brand_id = '$pro_brand'";
                                            $run_query_1 = mysqli_query($con, $brand_query);
                                            $brand_row = mysqli_fetch_array($run_query_1);
                                            $brand_name = $brand_row['brand_title']; 
                                
                                            $cat_query = "SELECT * FROM categories where cat_id = '$pro_cat'";
                                            $run_query_2 = mysqli_query($con, $cat_query);
                                            $cat_row = mysqli_fetch_array($run_query_2);
                                            $cat_name = $cat_row['cat_title']; 
                                
                                
                                            echo "
                                                <div class='col-md-4'>
                                                            <div class='panel panel-info'>
                                                                
                                                                <div class='panel-heading'> $brand_name  $pro_title ($cat_name)</div>
                                                                <div class='panel-body'>
                                                                    <img src='product_images/$pro_image' style='width:160px; height:250px;'/>
                                                                    <div class='panel-heading'> $pro_year </div>
                                                                
                                                                </div>
                                                                <div class='panel-heading'>".CURRENCY." $pro_price.00
                                                                    
                                                                    
                                                                </div>
                                                            </div>
                                                        </div>	
                                                        
                                            ";

                                            
                                        }                                    
                                    

                                    } 

                                }

                            ?>
						</div>
					
					</div>
					
				</div>
			</div>
			<div class="col-md-1"></div>
		</div>
        
        <?php
     
            if(array_key_exists('button1', $_POST)) {
                $user_id = $user_data['user_id'];
                // echo $user_id;

                $sql = "SELECT * FROM orders";

                $q = mysqli_query($con, $sql);

                while ($row = mysqli_fetch_array($q))   {
            
                    $pro_id = $row['product_id'];
                    $product_query = "SELECT * FROM products where product_id = '$pro_id'";
                    $run_query = mysqli_query($con,$product_query);
                    if(mysqli_num_rows($run_query) > 0){
                        while($row = mysqli_fetch_array($run_query)){
                            $pro_id    = $row['product_id'];
                            $delsql = "DELETE FROM products WHERE product_id = '$pro_id'";
                            $query = mysqli_query($con, $delsql);
                            echo "Check out success";
                        }                                    
                    

                    } 

                }
                echo "<meta http-equiv='refresh' content='0'>";
            }
        
        
        ?>

        <form method="post">
        <input type="submit" name="button1"
                value="CheckOut"/>
         
        </form>
        
	</div>

</body>
</html>
















































