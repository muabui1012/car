

<?php 
     session_start();
     include("db.php");
     if(isset($_GET['edit']))
     {
         $user_id= $_POST['user_id'];
		 $product_id = $_GET['product_id'];

         // SQL query to delete data from user table where id = $userid
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
         header("Location: index.php");
     }
?>