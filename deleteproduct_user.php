

<?php 
     session_start();
     include("db.php");
     if(isset($_GET['delete']))
     {
         $productid= $_GET['delete'];

         // SQL query to delete data from user table where id = $userid
         $sql = "DELETE FROM products WHERE product_id = {$productid}"; 
         $delete_query= mysqli_query($con, $sql);
         header("Location: cart.php");
     }
?>