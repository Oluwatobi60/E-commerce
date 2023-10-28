<?php
 if(isset($_GET['delete_order'])){
           $delete_id=$_GET['delete_order'];

         $delete_order="Delete from user_orders where order_id=$delete_id";
        $result_order_delete=mysqli_query($con,$delete_order);
        if($result_order_delete){
            echo "<script>alert('User Order Deleted Successfully')</script>";
            echo "<script>window.open('index.php','_self')</script>";
        } 
} 


        ?>