<?php
if(isset($_GET['delete_category'])){
    $get_category_id=$_GET['delete_category'];

    $delete_query="Delete from categories where category_id=$get_category_id";
    $result_delete=mysqli_query($con,$delete_query);
    if($result_delete){
        echo "<script>alert('Category Deleted Successfully')</script>";
        echo "<script>window.open('index.php','_self')</script>";
    }


}

?>