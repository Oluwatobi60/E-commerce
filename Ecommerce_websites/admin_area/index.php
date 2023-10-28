<?php  include('../includes/connect.php');  
session_start();
if(empty($_SESSION['username']))
{
    header('location:admin_login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- bootstarp css link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">

    <!-- <link rel="stylesheet" href="../style.css"> -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
    
.box{
    padding: 5px;
    border: 1px solid #fff;
}

.card-img-top{
    width: 100px;
    object-fit: contain;
}

img{
    width: 4%;
    height: 4%;
}
    </style>
</head>
<body>
    
<div class="container-fluid p-0">
    <!-- first child -->
    <nav class="navbar navbar-expand-lg navbar-light bg-info">
        <div class="container-fluid">
            <img src="../image/logo.png" alt="" class="logo">
            <nav class="navbar navbar-expand-lg">
            <ul class="navbar-nav ">
                <li class="nav-item">
                    <a href="" class="nav-link">Welcome guest</a>
                </li>
            </ul>
            </nav>
        </div>
    </nav>

    <!-- second child -->
    <div class="bg-light">
        <h3 class="text-center p-2">Manage Details</h3>
    </div>
    
    <!-- third child -->
    <div class="row">
        <div class="col-md-12 bg-secondary p-1 d-flex align-items-center">
            <div class="p-3">
                <a href="#"><img src="../image/carrot.jpeg"  class="card-img-top " alt=""></a>
                <p class="text-light text-center"><?php echo $_SESSION['username'];  ?></p>
            </div>
           <div class="button text-center">
                <button class="btn btn-info my-2"><a href="insert_product.php" class="nav-link text-light box">Insert Products</a></button>
                <button class="btn btn-info"><a href="index.php?view_product" class="nav-link text-light   box">View Products</a></button>
                <button class="btn btn-info"><a href="index.php?insert_category" class="nav-link text-light box">Insert Categories</a></button> 
                <button class="btn btn-info"><a href="index.php?view_categories" class="nav-link text-light  box">View Categories</a></button>
                <button class="btn btn-info"><a href="index.php?insert_brands" class="nav-link text-light  box">Insert Brands</a></button>
                <button class="btn btn-info"><a href="index.php?view_brands" class="nav-link text-light  box">View Brands</a></button>
                <button class="btn btn-info"><a href="index.php?all_orders" class="nav-link text-light   box">All orders</a></button>
                <button class="btn btn-info "><a href="index.php?all_payments" class="nav-link text-light   box">All Payments</a></button>
                <button class="btn btn-info"><a href="index.php?view_users" class="nav-link text-light  box">List users</a></button>
                <button class="btn btn-info"><a href="admin_logout.php" class="nav-link text-light   box">Logout</a></button>
            </div> 
        </div>
    </div>
</div>
<div class="container my-5">
    <?php
    if(isset($_GET['insert_category'])){
        include('insert_categories.php');
    }

    if(isset($_GET['insert_brands'])){
        include('insert_brands.php');
    }

    if(isset($_GET['view_product'])){
        include('view_product.php');
    }

    if(isset($_GET['edit_products'])){
        include('edit_products.php');
    }

    if(isset($_GET['delete_product'])){
        include('delete_product.php');
    }
    
    if(isset($_GET['view_categories'])){
        include('view_categories.php');
    }

    if(isset($_GET['edit_category'])){
        include('edit_category.php');
    }

    if(isset($_GET['delete_category'])){
        include('delete_category.php');
    }

    if(isset($_GET['view_brands'])){
        include('view_brands.php');
    }

    if(isset($_GET['edit_brand'])){
        include('edit_brand.php');
    }

    if(isset($_GET['delete_brand'])){
        include('delete_brand.php');
    }

    if(isset($_GET['all_orders'])){
        include('all_orders.php');
    }

    if(isset($_GET['delete_order'])){
        include('delete_order.php');
    }

    if(isset($_GET['all_payments'])){
        include('all_payments.php');
    }

    if(isset($_GET['delete_payment'])){
        include('delete_payment.php');
    }

    if(isset($_GET['view_users'])){
        include('view_users.php');
    }

    if(isset($_GET['delete_user'])){
        include('delete_user.php');
    }

    ?>
</div>
<!-- fourth child -->




<!-- last child footer-->
<div class="bg-info p-3 text-center">
  <p>All rights reserved Designed by Tobestic-2023</p>
</div>
</div>

 <!-- bootstarp js link-->
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>