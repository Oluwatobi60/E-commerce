<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Brands</title>
    <style>
          .profile_img{
            width:100px;
            object-fit: contain;
        }
    </style>
</head>
<body>
    
<h3 class="text-success text-center">All Brands</h3>

<div class="container">
    <table class="table table-bordered mt-5">
        <thead class="bg-info text-center">
            <th>S/NO</th>
            <th>Category Title</th>
            <th>Edit</th>
            <th>Delete</th>
        </thead>
        <tbody  class="bg-secondary text-light">
            <?php
          
                $select_brand="Select * from brands";
                $result_query=mysqli_query($con,$select_brand);
                $number=0;
                while($row_fetch=mysqli_fetch_assoc($result_query)){
                    $brand_id=$row_fetch['brand_id'];
                    $brand_title=$row_fetch['brand_title'];
                    $number++;
                
            ?>
            <tr class="text-center">
            <td><?php echo $number; ?></td>
            <td><?php echo $brand_title ?></td>
            <td><a href="index.php?edit_brand=<?php echo $brand_id ?>" class="text-light"><i class="fa fa-edit"></i></a></td>
            <td><a href="index.php?delete_brand=<?php echo $brand_id ?>" type="button" class="text-light" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa fa-trash"></i></a></td>
            </tr>
            <?php }  ?>
        </tbody>
       
    </table>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
        <h4>Aye you sure you want to delete this?</h4>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><a href="index.php?view_brands" class="text-light text-decoration-none">No</a></button>
        <button type="button" class="btn btn-primary"><a href="index.php?delete_brand=<?php echo $brand_id ?>" class="text-light text-decoration-none">Yes</a></button>
      </div>
    </div>
  </div>
</div>


</div>

</body>
</html>