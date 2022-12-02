

<?php 
     session_start();
     include("db.php");
     if(isset($_GET['delete']))
     {
         $userid= $_GET['delete'];

         // SQL query to delete data from user table where id = $userid
         $sql = "DELETE FROM users WHERE user_id = {$userid}"; 
         $delete_query= mysqli_query($con, $sql);
         header("Location: admin_user.php");
     }
?>