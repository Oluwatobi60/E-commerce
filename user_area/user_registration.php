<?php  
include('../includes/connect.php');  
include('../functions/command_function.php');
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    
    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <div class="container-fluid my-3">
        <h1 class="text-center mt-5">New User Registration</h1>
        <div class="row d-flex align-items-center justify-content-center">
            <div class="col-lg-12 col-xl-6">
                <form action="" method="post" enctype="multipart/form-data">
                <div class="form-outline mb-4  m-auto">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" name="username" id="username" class="form-control" placeholder="Enter your username" autocomplete="off" required>
                </div>

                <div class="form-outline mb-4 m-auto">
                    <label for="user_email" class="form-label">Email</label>
                    <input type="text" name="user_email" id="user_email" class="form-control" placeholder="Enter your email" autocomplete="off" required>
                </div>

                <div class="form-outline mb-4 m-auto">
                    <label for="user_image" class="form-label">User image</label>
                    <input type="file" name="user_image" id="user_image" class="form-control" placeholder="Enter your username" autocomplete="off" required>
                </div>

                <div class="form-outline mb-4 m-auto">
                    <label for="user_password" class="form-label">Password</label>
                    <input type="password" name="user_password" id="user_password" class="form-control" placeholder="Enter your password" autocomplete="off" required>
                </div>

                <div class="form-outline mb-4 m-auto">
                    <label for="confirm_password" class="form-label">Confirm Password</label>
                    <input type="password" name="confirm_password" id="confirm_password" class="form-control" placeholder="Confirm Password" autocomplete="off" required>
                </div>

                <div class="form-outline mb-4 m-auto">
                    <label for="address" class="form-label">Address</label>
                    <input type="text" name="address" id="address" class="form-control" placeholder="Enter your address" autocomplete="off" required>
                </div>

                <div class="form-outline mb-4 m-auto">
                    <label for="Contact" class="form-label">Contact</label>
                    <input type="text" name="contact" id="contact" class="form-control" placeholder="Enter your mobile number" autocomplete="off" required>
                </div>

                <div class="form-outline mb-4 m-auto">
                    <input type="submit" name="insert_user" value="Register" class=" btn btn-info">
                    <p class=" fw-bold mt-2 pt-1 mb-0">Already have an account? <a href="user_login.php" class="text-danger"> Login</a></p>
                </div>
                
                </form>

            </div>
        </div>
    </div>
</body>
</html>

<?php

if(isset($_POST['insert_user'])){

    $username=$_POST['username'];
    $user_email=$_POST['user_email'];
    $user_password=$_POST['user_password'];
    $hash_password=password_hash($user_password,PASSWORD_DEFAULT);
    $confirm_passworrd=$_POST['confirm_password'];
    $user_address=$_POST['address'];
    $user_contact=$_POST['contact'];
    $user_image=$_FILES['user_image']['name'];
    $user_image_tmp=$_FILES['user_image']['tmp_name'];
    $user_ip=getIPAddress();


    //select query
    $select_query="Select * from user_table where username='$username' or user_email='$user_email'";
    $result=mysqli_query($con,$select_query);
    $rows_count=mysqli_num_rows($result);
    if($rows_count>0){
        echo "<script>alert('Username and email already exist')</script>";
    }else if($user_password!=$confirm_passworrd){
        echo "<script>alert('Password do not match')</script>";
    }
    else{
         //insert_query
    move_uploaded_file($user_image_tmp,"./user_images/$user_image");
    $insert_query="insert into user_table (username,user_email,user_password,user_image,user_ip,user_address,user_mobile) values('$username','$user_email','$hash_password','$user_image','$user_ip','$user_address','$user_contact')";
    $sql_execute=mysqli_query($con,$insert_query);
    echo "<script>alert('Registration Successfully')</script>";
    }
   
    //selecting cart items
    $select_cart_items="Select * from cart_details where ip_address='$user_ip'";
    $result_cart=mysqli_query($con,$select_cart_items);
    $rows_count=mysqli_num_rows($result_cart);
    if($rows_count>0){
        $_SESSION['username']=$username;
        echo "<script>alert('You have items in your cart')</script>";
        echo "<script>window.open('checkout.php','_self')</script>";
    }else{
        echo "<script>window.open('../index.php','_self')</script>";
    }
}

?>