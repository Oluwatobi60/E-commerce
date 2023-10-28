<?php  include('../includes/connect.php');  ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Registration</title>

    <!-- bootstarp css link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">

    <!-- <link rel="stylesheet" href="../style.css"> -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        body{
            overflow: hidden;
        }
    </style>

</head>
<body>
    <div class="container-fluid m-3">
        <h2 class="text-center mb-5">
            Admin Registration
        </h2>
        <div class="row d-flex justify-content-center">
            <div class="col-lg-6 col-xl-5">
                <img src="../image/admin.png" alt="Admin Registration" class="img-fluid">
            </div>

            <div class="col-lg-6  col-xl-4">
            <form action="" method="post">
                <div class="form-outline mb-4">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" name="username" id="username" placeholder="Enter your username" required="required" class="form-control">
                </div>

                <div class="form-outline mb-4">
                    <label for="email" class="form-label">Email </label>
                    <input type="email" name="email" id="email" placeholder="Enter your email" required="required" class="form-control">
                </div>

                <div class="form-outline mb-4">
                    <label for="password" class="form-label">Password </label>
                    <input type="password" name="password" id="password" placeholder="Enter your password" required="required" class="form-control">
                </div>

                <div class="form-outline mb-4">
                    <label for="password" class="form-label">Confirm Password </label>
                    <input type="password" name="confirm_password" id="confirm_password" placeholder="Confirm password" required="required" class="form-control">
                </div>
                <div>
                    <input type="submit" name="admin_register" value="Register" class="bg-info py-2 px-3 border-0">
                    <p class="small fw-bold mt-2 pt-1">Don't you have an account? <a href="admin_login.php" class="link-danger">Login</a></p>
                </div>
            </form>
            </div>
        </div>

          
    </div>
</body>
</html>

<?php

if(isset($_POST['admin_register'])){

$admin_name=$_POST['username'];
$admin_email=$_POST['email'];
$admin_password	=$_POST['password'];
$hash_password=password_hash($admin_password,PASSWORD_DEFAULT);
$confirm_passworrd=$_POST['confirm_password'];



//select query
$select_query="Select * from admin_table where admin_name='$admin_name' or admin_email='$admin_email'";
$result=mysqli_query($con,$select_query);
$rows_count=mysqli_num_rows($result);
if($rows_count>0){
    echo "<script>alert('Admin and email already exist')</script>";
}else if($admin_password!=$confirm_passworrd){
    echo "<script>alert('Password do not match')</script>";
}
else{
     //insert_query
$insert_query="insert into admin_table (admin_name,admin_email,admin_password) values('$admin_name','$admin_email','$hash_password')";
$sql_execute=mysqli_query($con,$insert_query);
echo "<script>alert('Admin Registration Successfully')</script>";
}

}

?>