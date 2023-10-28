<?php
if(isset($_GET['delete_brand'])){
    $get_brand_id=$_GET['delete_brand'];

    $delete_query="Delete from brands where brand_id=$get_brand_id";
    $result_delete=mysqli_query($con,$delete_query);
    if($result_delete){
        echo "<script>alert('Brand Deleted Successfully')</script>";
        echo "<script>window.open('index.php','_self')</script>";
    }


}

?>