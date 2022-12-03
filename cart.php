<?php
require "config/constants.php";
session_start();
include("db.php");
include("functions.php");

$user_data = check_login($con);

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
	

    <div class="container">
    
    

        <table class="table table-striped table-bordered table-hover">
          <thead class="table-dark">
            <tr>
              <th  scope="col">ID</th>
              <th  scope="col">Cat</th>
              <th  scope="col"> Brand</th>
              <th  scope="col">Name</th>
              <th  scope="col"> Price</th>
              <th  scope="col"> Image</th>
              <th  scope="col"> Year</th>
              <th  scope="col" colspan="2" class="text-center">CRUD Operations</th>
            </tr>  
          </thead>
            <tbody>
              <tr>
 
          <?php
            $user_id = $user_data['user_id'];
            $sql="SELECT * FROM products WHERE product_id in (SELECT product_id from orders where user_id = '$user_id')";              
            $query= mysqli_query($con,$sql);    

           
            while($row= mysqli_fetch_array($query)){
                $pro_id    = $row['product_id'];
                $pro_cat   = $row['product_cat'];
                $pro_brand = $row['product_brand'];
                $pro_title = $row['product_title'];
                $pro_price = $row['product_price'];
                $pro_image = $row['product_image'];
                $pro_year = $row['product_year'];
                
    
                $brand_query = "SELECT * FROM brands where brand_id = '$pro_brand'";
                $run_query_1 = mysqli_query($con, $brand_query);
                $brand_row = mysqli_fetch_array($run_query_1);
                $brand_name = $brand_row['brand_title']; 
    
                $cat_query = "SELECT * FROM categories where cat_id = '$pro_cat'";
                $run_query_2 = mysqli_query($con, $cat_query);
                $cat_row = mysqli_fetch_array($run_query_2);
                $cat_name = $cat_row['cat_title'];      
            

              echo "<tr >";
              echo " <th scope='row' >{$pro_id}</th>";
              echo " <td > {$pro_cat}</td>";
              echo " <td > {$pro_brand}</td>";
              echo " <td > {$pro_title}</td>";
              echo " <td > {$pro_price}</td>";
              echo " <td > {$pro_image}</td>";
              echo " <td > {$pro_year}</td>";
              
              $od_query = "SELECT * FROM orders where product_id = '$pro_id'";
                $run_query_od = mysqli_query($con, $od_query);
                $row_od = mysqli_fetch_array($run_query_od);
                $order_id = $row_od['order_id'];      

                echo " <td  class='text-center'>  <a href='deleteorder_user.php?delete={$order_id}' class='btn btn-secondary'> <i class='bi bi-trash'></i> remove</a> </td>";

              echo " <td  class='text-center'>  <a href='deleteproduct_user.php?delete={$pro_id}' class='btn btn-danger'> <i class='bi bi-trash'></i> CheckOut</a> </td>";
              echo " </tr> ";
            }      
         ?>
              </tr>  
            </tbody>
        </table>
  </div>


    <div class="container text-center mt-5">
      <a href="../index.php" class="btn btn-warning mt-5"> Back </a>
    <div>
        
    
       
        <!-- <form method="post">
        <input type="submit" name="button1"
                value="CheckOut"/>
         
        </form> -->
        


</body>
</html>
















































