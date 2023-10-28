<?php
include('../includes/connect.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
          .profile_img{
            width:100px;
            object-fit: contain;
        }
    </style>
</head>
<body>
    
<h3 class="text-success text-center">All Products</h3>



<table class="table table-bordered mt-5">
    <thead class="bg-info">
        <tr class="text-center">
            <th>Product ID</th>
            <th>Product Title</th>
            <th>Product Image</th>
            <th>Product Price</th>
            <th>Total Sold</th>
            <th>Status</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody  class="bg-secondary text-light">
    <?php
if(isset($_GET['view_product'])){

$select_product="Select * from products";
$result=mysqli_query($con,$select_product);
$number=0;
while($row_data=mysqli_fetch_assoc($result)){
    $product_id=$row_data['product_id'];
    $product_title=$row_data['product_title'];
    $product_description=$row_data['product_description'];
    $product_image1=$row_data['product_image1'];
    $product_price=$row_data['prices'];
    $status=$row_data['status'];
    $number++;
?>

        <tr class="text-center">   
            <td><?php echo $number ;?></td>
            <td><?php echo $product_title; ?></td>
            <td><img src="product_image/<?php echo $product_image1 ?>"  class="profile_img my-4"></td>
            <td><?php echo $product_price; ?>/-</td>
            <td>
                <?php
                    $get_count="Select * from orders_pending where product_id=$product_id";
                    $result_count=mysqli_query($con,$get_count);
                    $rows_count=mysqli_num_rows($result_count);
                    echo $rows_count;
                ?>
            </td>
            <td><?php echo $status ?></td>
            <td><a href="index.php?edit_products=<?php echo  $product_id;  ?>" class="text-light"><i class="fa fa-edit"></i></a></td>
            <td><a href="index.php?delete_product=<?php echo  $product_id;  ?>" class="text-light"><i class="fa fa-trash"></i></a></td>
    
     
    </tr>
    <?php
}
    }

    ?>
    </tbody>
</table>


</body>
</html>




