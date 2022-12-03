

<?php 
     session_start();
     include("db.php");
     if(isset($_GET['delete']))
     {
         $userid= $_GET['delete'];
         echo $userid;
         $findsql = "SELECT * FROM orders WHERE order_id = '$userid'";
         $query = mysqli_query($con, $findsql);
         $row = mysqli_fetch_array($query);
         $product_id = $row['product_id'];
         $updatesql = "UPDATE products set sold = false where product_id = '$product_id'"; 
         $query = mysqli_query($con, $updatesql);
         $sql = "DELETE FROM orders WHERE order_id = {$userid}"; 
         $delete_query= mysqli_query($con, $sql);
         
         header("Location: cart.php");
     }
?>