<?php
session_start();
$ip_add = getenv("REMOTE_ADDR");
include "db.php";

if(isset($_POST["category"])){
	$category_query = "SELECT * FROM categories";
	$run_query = mysqli_query($con,$category_query) or die(mysqli_error($con));
	echo "
		<div class='nav nav-pills nav-stacked'>
			<li class='active'><a href='#'><h4>Categories</h4></a></li>
	";
	if(mysqli_num_rows($run_query) > 0){
		while($row = mysqli_fetch_array($run_query)){
			$cid = $row["cat_id"];
			$cat_name = $row["cat_title"];
			echo "
					<li><a href='#' class='category' cid='$cid'>$cid $cat_name</a></li>
			";
		}
		echo "</div>";
	}
}
if(isset($_POST["brand"])){
	$brand_query = "SELECT * FROM brands";
	$run_query = mysqli_query($con,$brand_query);
	echo "
		<div class='nav nav-pills nav-stacked'>
			<li class='active'><a href='#'><h4>Brands</h4></a></li>
	";
	if(mysqli_num_rows($run_query) > 0){
		while($row = mysqli_fetch_array($run_query)){
			$bid = $row["brand_id"];
			$brand_name = $row["brand_title"];
			echo "
					<li><a href='#' class='selectBrand' bid='$bid'>$bid $brand_name</a></li>
			";
		}
		echo "</div>";
	}
}

if(isset($_POST["getProduct"])){

	$product_query = "SELECT * FROM products";
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


			echo "
				<div class='col-md-4'>
							<div class='panel panel-info'>
								
								<div class='panel-heading'> $brand_name  $pro_title ($cat_name)</div>
								<div class='panel-body'>
									<img src='product_images/$pro_image' style='width:160px; height:250px;'/>
									<div class='panel-heading'> $pro_year </div>
									<div class='panel-heading'> Status: $sold </div>
								</div>
								<div class='panel-heading'>".CURRENCY." $pro_price.00
									<button pid='$pro_id' style='float:right;' id='product' class='btn btn-danger btn-xs'>AddToCart</button>
								</div>
							</div>
						</div>	
			";
		}
	}
}


if(isset($_POST["get_seleted_Category"]) || isset($_POST["selectBrand"])){
	if(isset($_POST["get_seleted_Category"])){
		$id = $_POST["cat_id"];
		$sql = "SELECT * FROM products WHERE product_cat = '$id'";
	}else if(isset($_POST["selectBrand"])){
		$id = $_POST["brand_id"];
		$sql = "SELECT * FROM products WHERE product_brand = '$id'";
	}
	
	$run_query = mysqli_query($con,$sql);
	while($row=mysqli_fetch_array($run_query)){
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


			echo "
				<div class='col-md-4'>
							<div class='panel panel-info'>
								<div class='panel-heading'>$brand_name $pro_title ($cat_name)</div>
								<div class='panel-body'>
									<img src='product_images/$pro_image' style='width:160px; height:250px;'/>
									<div class='panel-heading'> $pro_year </div>
									<div class='panel-heading'> Status: $sold </div>
								</div>
								<div class='panel-heading'>$.$pro_price.00
									<button pid='$pro_id' style='float:right;' id='product' class='btn btn-danger btn-xs'>AddToCart</button>
								</div>
							</div>
						</div>	
			";
		}
	}
	

if(isset($_POST["addToCart"])){
		
	$product_id = $_POST['proId'];
	
	$user_id = $_SESSION['user_id'];

	$updatesql = "UPDATE products set sold = true where product_id = '$product_id'"; 

	mysqli_query($con, $updatesql);

	echo "<meta http-equiv='refresh' content='0'>";

	// $sql = "SELECT * FROM cart WHERE user_id = '$user_id'";
	// $run_query = mysqli_query($con,$sql);

	$sql = "INSERT INTO `orders`
			(`user_id`, `product_id`) 
			VALUES ('$user_id', '$product_id')";
			if(mysqli_query($con,$sql)){
				echo "
					<div class='alert alert-success'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						<b>Product is Added..!</b>

					</div>
					
					
					
				";
				
				
			}
	
}







?>




