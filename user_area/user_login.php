<?php
include('../includes/connect.php'); 
include('../functions/command_function.php');
@session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User-Login</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    
    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<style>
    body{
        overflow-x: hidden;
    }
</style>
<body>
<div class="container-fluid my-3">
        <h1 class="text-center mt-5">User Login</h1>
        <div class="row d-flex align-items-center justify-content-center">
            <div class="col-lg-12 col-xl-6">
                <form action="" method="post" enctype="multipart/form-data">
                <div class="form-outline mb-4  m-auto">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" name="username" id="username" class="form-control" placeholder="Enter your username" autocomplete="off" required>
                </div>

                <div class="form-outline mb-4 m-auto">
                    <label for="user_email" class="form-label">Password</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="Enter your password" autocomplete="off" required>
                </div>

                <div class="form-outline mb-4 m-auto">
                    <input type="submit" name="user_login" value="Login" class=" btn btn-info">
                    <p class=" fw-bold mt-2 pt-1 mb-0">Don't have an account? <a href="user_registration.php" class="text-danger"> Register</a></p>
                </div>
                
                </form>

            </div>
        </div>
    </div>
</body>
</html>

<?php

if(isset($_POST['user_login'])){
    $user_name=$_POST['username'];
    $userpassword=$_POST['password'];
    
    $select_query="Select * from user_table where username='$user_name'";
    $result=mysqli_query($con,$select_query);
    $row_count=mysqli_num_rows($result);
    $row_data=mysqli_fetch_assoc($result);
    $user_ip=getIPAddress();

//cart item
$select_query_cart="Select * from cart_details where ip_address='$user_ip'";
$select_cart=mysqli_query($con,$select_query_cart);
$row_count_cart=mysqli_num_rows($select_cart);
    if($row_count>0){
        $_SESSION['username']=$user_name;
        if(password_verify($userpassword,$row_data['user_password'])){
            //echo "<script>alert('Login successful')</script>";
            if($row_count==1 and $row_count_cart==0){
                $_SESSION['username']=$user_name;
                echo "<script>alert('Login successful')</script>";
                echo "<script>window.open('profile.php','_self')</script>";
            }else{
                $_SESSION['username']=$user_name;
                echo "<script>alert('Login successful')</script>";
                echo "<script>window.open('payment.php','_self')</script>";
            }
        }else{
            echo "<script>alert('Invalid Credentials')</script>";
        }
    }else{
        echo "<script>alert('Invalid Credentials')</script>";
    }
}

?>