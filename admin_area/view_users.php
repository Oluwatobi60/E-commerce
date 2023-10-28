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
    
<h3 class="text-success text-center">All Users</h3>

<table class="table table-bordered mt-5">
<thead class="bg-info">

    <?php
if(isset($_GET['view_users'])){

$select_user="Select * from user_table";
$result=mysqli_query($con,$select_user);
$row_count=mysqli_num_rows($result);
echo "<tr class='text-center'>
        <th>S/N</th>
        <th>Username</th>
        <th>Email</th>
        <th>Image</th>
        <th>Address</th>
        <th>Telephone</th>
        <th>Delete</th>
    </tr>
</thead>
<tbody  class='bg-secondary text-light'>";
    if($row_count==0){
        echo "<h2 class='text-danger text-center mt-5'>No users yet</h2>";
    }else{
        $number=0;
        while($row_data=mysqli_fetch_assoc($result)){
            $user_id=$row_data['user_id'];
            $username=$row_data['username'];
            $user_email=$row_data['user_email'];
            $user_image=$row_data['user_image'];
            $user_address=$row_data['user_address'];
            $user_mobile=$row_data['user_mobile'];
            $number++;

       echo " <tr class=''text-center'>   
            <td>$number</td>
            <td>$username</td>
            <td>$user_email</td>
            <td><img src='../user_area/user_images/$user_image' alt='$username' class='profile_img'></td>
            <td>$user_address</td>
            <td>$user_mobile</td>
            <td><a href='index.php?delete_user=$user_id' class='text-light'><i class='fa fa-trash'></i></a></td>

    </tr>";
   
}
    } 
}

    ?>
    </tbody>
</table>


</body>
</html>




