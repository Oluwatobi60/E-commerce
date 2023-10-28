<?php
include('../includes/connect.php');

if(isset($_GET['edit_products'])){
    $edit_id=$_GET['edit_products'];
    //echo $edit_id;
    $get_data="Select * from products where product_id= $edit_id";
    $result_data=mysqli_query($con,$get_data);
    $row=mysqli_fetch_assoc($result_data);
    $product_id=$row['product_id'];
    $product_title=$row['product_title'];
    $product_description=$row['product_description'];
    $keyword=$row['product_keywords'];
    $category_id=$row['category_id'];
    $band_id=$row['brand_id'];
    $image1=$row['product_image1'];
    $image2=$row['product_image2'];
    $image3=$row['product_image3'];
    $price=$row['prices'];
}

//update products

if(isset($_POST['update_product'])){
    $update_id=$product_id;
    $product_title=$_POST['title'];
    $product_description=$_POST['description'];
    $keyword=$_POST['keyword'];
    $category_id=$_POST['categorys'];
    $band_id=$_POST['brandy'];
    $price=$_POST['price'];
    $image1=$_FILES['image1']['name'];
    $image2=$_FILES['image2']['name'];
    $image3=$_FILES['image3']['name'];

    $image1_tmp=$_FILES['image1']['tmp_name'];
    $image2_tmp=$_FILES['image2']['tmp_name'];
    $image3_tmp=$_FILES['image3']['tmp_name'];

    move_uploaded_file($image1_tmp,"./product_image/$image1");
    move_uploaded_file($image2_tmp,"./product_image/$image2");
    move_uploaded_file($image3_tmp,"./product_image/$image3");
   
    $update_product="update products set product_title='$product_title',product_description='$product_description',product_keywords='$keyword',category_id=$category_id,brand_id=$band_id,product_image1='$image1',product_image2='$image2',product_image3='$image3',prices='$price' where product_id=$update_id";
    $result_update=mysqli_query($con,$update_product);
    if($result_update){
        echo "<script>alert('Products updated successfully')</script>";
        echo "<script>window.open('index.php','_self')</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=h1, initial-scale=1.0">
    <title>Document</title>
    <style>
         .image{
          width: 50px;
          height: 50px;
        }
    </style>
</head>
<body>

    <div class="container">
    <h3 class="text-success text-center">Edit Product</h3>
        <!--form-->
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_title" class="form-label">Product Title</label>
                <input type="text" name="title" class="form-control" value="<?php echo $product_title; ?>">
            </div>

            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_description" class="form-label">Product Description</label>
                <input type="text" name="description"  class="form-control"  value="<?php echo $product_description; ?>">
            </div>

            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_keyword" class="form-label">Product Keyword</label>
                <input type="text" name="keyword" class="form-control"  value="<?php echo $keyword; ?>">
            </div>

            <!-- categories -->
            <div class="form-outline mb-4 w-50 m-auto">
                <select name="categorys"  class="form-select">
                    <!--Fetching current category -->
                    <?php
                        $select_category="Select * from categories where category_id=$category_id";
                        $result_category=mysqli_query($con,$select_category);
                        $row_category=mysqli_fetch_assoc($result_category);
                            $category_title=$row_category['category_title'];
                            echo "<option value='$category_title'>$category_title</option>";
                    ?>
                <!--Fetching all category -->
                    <?php
                         $select_category_all="Select * from categories";
                         $result_category_all=mysqli_query($con,$select_category_all);
                         while($row_category_all=mysqli_fetch_assoc($result_category_all)){
                             $category_title=$row_category_all['category_title'];
                             $category=$row_category_all['category_id'];
                             echo "<option value='$category'>$category_title</option>";
                         }
                    ?>
                </select>
            </div>

            <!-- brands -->
            <div class="form-outline mb-4 w-50 m-auto">
                <select name="brandy" class="form-select">
                    <!--Fetching current brands -->
                    <?php
                        $select_brand="Select * from brands where brand_id=$band_id";
                        $result_brand=mysqli_query($con,$select_brand);
                        $row_brand=mysqli_fetch_assoc($result_brand);
                            $brand_title=$row_brand['brand_title'];
                            echo "<option value='$brand_title'>$brand_title</option>";
                    ?>
                    <!--Fetching all brands -->
                    <?php
                        $select_brand_all="Select * from brands";
                        $result_brand_all=mysqli_query($con,$select_brand_all);
                       while($row_brand_all=mysqli_fetch_assoc($result_brand_all)){
                            $brand_title=$row_brand_all['brand_title'];
                            $brand=$row_brand_all['brand_id'];
                            echo "<option value='$brand'>$brand_title</option>";
                       }
                    ?>
                </select>
                
            </div>
            <?php  
            $select="Select * from";
            ?>
            <div class="form-outline w-50 m-auto mb-4">
                <label for="product_image1" class="form-label">Product Image 1</label>
                <div class="d-flex">
                <input type="file" name="image1"  class="form-control">
                <img src="./product_image/<?php echo $image1 ?>" class="image">
                </div>
            </div>

            <div class="form-outline mb-4 w-50 m-auto mt-4">
                <label for="product_image2" class="form-label">Product Image 2</label>
                <div class="d-flex">
                <input type="file" name="image2"  class="form-control">
                <img src="./product_image/<?php echo $image2 ?>" class="image">
                </div>
            </div>

            <div class="form-outline mb-4 w-50 m-auto mt-4">
                <label for="product_image3" class="form-label">Product Image 3</label>
                <div class="d-flex">
                <input type="file" name="image3" class="form-control">
                <img src="./product_image/<?php echo $image3 ?>" class="image">
                </div>
            </div>

            <!-- <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_price" class="form-label">Product Price</label>
                <input type="text" name="price" id="product_price" class="form-control" placeholder="Enter product price"  required>
            </div> -->


            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_price" class="form-label">Product Price</label>
                <input type="text" name="price" class="form-control"  value="<?php echo $price; ?>">
            </div>


            <div class="form-outline mb-4 w-50 m-auto">
                <input type="submit" name="update_product" class="btn btn-info mb-3 px-3" value="Update_product">
            </div>
        </form>
    </div>
</body>
</html>

