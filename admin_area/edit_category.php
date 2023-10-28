<?php
 if(isset($_GET['edit_category'])){
    $get_category_id=$_GET['edit_category'];
    $select_category="Select * from categories where  category_id=$get_category_id";
    $result_select=mysqli_query($con,$select_category);
    $row=mysqli_fetch_assoc($result_select);
    $category_id=$row['category_id'];
    $category_title=$row['category_title'];
    
 }

 //update category
 if(isset($_POST['update_category'])){
    $update_id=$category_id;
    $category_title=$_POST['update_title'];
    $update_category="update categories set category_title='$category_title' where category_id=$update_id";
    $result_update=mysqli_query($con,$update_category);
    if($result_update){
        echo "<script>alert('Category Updated Successfully')</script>";
        echo "<script>window.open('index.php','_self')</script>";
    }
 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Category</title>
</head>
<body>
<div class="container">
    <h3 class="text-success text-center">Edit Category</h3>

    <form action="" method="post" class="mb-2">
<div class="input-group w-90 mb-2 mt-5 ">
  <span class="input-group-text bg-info" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
  <input type="text" class="form-control" name="update_title" value="<?php echo $category_title; ?>">
</div>

<div class="input-group w-10 mb-2 m-auto">
<!--   <input type="submit" class="form-control bg-info" name="insert_cat" value="Insert Categories">
 -->
<input type="submit" name="update_category" class="btn btn-info my-3" value="Update Category">
</div>
</form>

</div>
</body>
</html>