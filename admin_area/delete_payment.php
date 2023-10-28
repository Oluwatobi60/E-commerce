<?php
 if(isset($_GET['delete_payment'])){
           $delete_id=$_GET['delete_payment'];

         $delete_payment="Delete from user_payments where payment_id=$delete_id";
        $result_payment_delete=mysqli_query($con,$delete_payment);
        if($result_payment_delete){
            echo "<script>alert('User Payment Deleted Successfully')</script>";
            echo "<script>window.open('index.php','_self')</script>";
        } 
} 


        ?>