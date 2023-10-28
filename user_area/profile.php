<?php  
include('../includes/connect.php');  
include('../functions/command_function.php');
session_start();
if(empty($_SESSION['username']))
{
    header('location:../index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecommerce Website</title>

    <!-- bootstrap Css link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    
    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        .profile_img{
            width:90%;
            margin: auto;
            display: block;
            object-fit: contain;
        }

        .edit_image{
          width: 100px;
          height: 100px;
        }

        .logo{
          width:5%;
          height: 5%;
        }
    </style>
</head>
<body>
    
<!-- navbar-->
<div class="container-fluid p-0">
    <!--first child-->
    <nav class="navbar navbar-expand-lg navbar-light bg-info">
  <div class="container-fluid">
    <img src="../image/logo.png" class="logo">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../display_all.php">Products</a>
        </li>
        
       
        <?php
        if(isset($_SESSION['username'])){
          echo " <li class='nav-item'>
          <a class='nav-link' href='profile.php'>My Account</a>
        </li>";
        }else{
          echo " <li class='nav-item'>
          <a class='nav-link' href='./user_area/user_registration.php'>Register</a>
        </li>";
        }
        ?>

        <li class="nav-item">
          <a class="nav-link" href="#">Contact</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="cart.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i><sup><?php cart_item(); ?></sup></a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="#">Total Price: <?php total_cart_price(); ?>/-</a>
        </li>
       
      </ul>
      <form class="d-flex" action="search_product.php" method="get">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
        <input type="submit" value="Search" class="btn btn-outline-light" name="search_data_product">
      </form>
    </div>
  </div>
</nav>

<!-- calling cart function -->
<?php cart(); ?>
<!-- second child -->
<nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
  <ul class="navbar-nav me-auto">
<?php

if(!isset($_SESSION['username'])){
  echo " <li class='nav-item'>
  <a class='nav-link' href=''>Welcome Guest</a></li>";
}else{
  echo "<li class='nav-item'>
  <a class='nav-link' href='#'>Welcome ".$_SESSION['username']."</a></li>";
}


if(!isset($_SESSION['username'])){
  echo "<li class='nav-item'>
  <a class='nav-link' href='./user_area/user_login.php'>Login</a></li>";
}else{
  echo "<li class='nav-item'>
  <a class='nav-link' href='logout.php'>Logout</a></li>";
}

?>

  </ul>
</nav>


<!-- third child -->

<div class="bg-light">
  <h3 class="text-center">Tobestic Store</h3>
  <p class="text-center">Communications is at the heart of e-commerce and community</p>
</div>

<!-- fourth child -->
<div class="row px-3"> 
    <div class="col-md-2">
        <ul class="navbar-nav bg-secondary text-center" style="height: 100vh;">
        <li class="nav-item bg-info">
            <a href="" class="nav-link text-light"><h4>Your profile</h4></a>
        </li>

      <?php
      $username=$_SESSION['username'];
      $user_image="Select * from user_table where username='$username'";
      $result_image=mysqli_query($con,$user_image);
      $row_image=mysqli_fetch_array($result_image);
      $image=$row_image['user_image'];

      echo "<li class='nav-item'>
      <img src='./user_images/$image' alt='' class='profile_img my-4'>
  </li>";
      ?>
        <li class="nav-item">
            <a href="profile.php" class="nav-link text-light"><h5>Pending order</h5></a>
        </li>

        <li class="nav-item">
            <a href="profile.php?edit_account" class="nav-link text-light"><h5>Edit Account</h5></a>
        </li>

        <li class="nav-item">
            <a href="profile.php?my_orders" class="nav-link text-light"><h5>My orders</h5></a>
        </li> 

        <li class="nav-item">
            <a href="profile.php?delete_account" class="nav-link text-light"><h5>Delete Account</h5></a>
        </li> 

        <li class="nav-item">
            <a href="logout.php" class="nav-link text-light"><h5>Logout</h5></a>
        </li> 
        </ul>
    </div>
    <div class="col-md-10 text-center">
      <?php get_user_order_details();
      if(isset($_GET['edit_account'])){
        include('edit_account.php');
      }
      if(isset($_GET['my_orders'])){
        include('user_orders.php');
      } 
      if(isset($_GET['delete_account'])){
        include('delete_account.php');
      }
      
      ?>
    </div>
</div>

<!-- last child footer-->
<?php  include("../includes/footer.php");  ?>
</div>


<!-- Bootstrap Js link -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>