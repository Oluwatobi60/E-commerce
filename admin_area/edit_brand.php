<?php
 if(isset($_GET['edit_brand'])){
    $get_brand_id=$_GET['edit_brand'];
    $select_brand="Select * from brands where  brand_id=$get_brand_id";
    $result_brand=mysqli_query($con,$select_brand);
    $row=mysqli_fetch_assoc($result_brand);
    $brand_id=$row['brand_id'];
    $brand_title=$row['brand_title'];
    
 }

 //update category
    if(isset($_POST['update_brands'])){
    $update_id=$brand_id;
    $brand_title=$_POST['update_brand'];
    $update_brand="update brands set brand_title='$brand_title' where brand_id=$update_id";
    $result_update=mysqli_query($con,$update_brand);
    if($result_update){
        echo "<script>alert('Brand Updated Successfully')</script>";
        echo "<script>window.open('index.php','_self')</script>";
    }
 } 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Brand</title>
</head>
<body>
<div class="container">
    <h3 class="text-success text-center">Edit Brand</h3>

    <form action="" method="post" class="mb-2">
<div class="input-group w-90 mb-2 mt-5 ">
  <span class="input-group-text bg-info" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
  <input type="text" class="form-control" name="update_brand" value="<?php echo $brand_title; ?>">
</div>

<div class="input-group w-10 mb-2 m-auto">
<!--   <input type="submit" class="form-control bg-info" name="insert_cat" value="Insert Categories">
 -->
<input type="submit" name="update_brands" class="btn btn-info my-3" value="Update Brand">
</div>
</form>

</div>
</body>
</html>