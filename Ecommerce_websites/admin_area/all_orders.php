<?php
include('../includes/connect.php');
if(empty($_SESSION['username']))
{
    header('location:admin_login.php');
}
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
    
<h3 class="text-success text-center">All Orders</h3>

<table class="table table-bordered mt-5">
<thead class="bg-info">

    <?php
if(isset($_GET['all_orders'])){

$select_order="Select * from user_orders";
$result=mysqli_query($con,$select_order);
$row_count=mysqli_num_rows($result);
echo "<tr class='text-center'>
        <th>S/N</th>
        <th>Due amount</th>
        <th>Invoice number</th>
        <th>Total products</th>
        <th>Order date</th>
        <th>Status</th>
        <th>Delete</th>
    </tr>
</thead>
<tbody  class='bg-secondary text-light'>";
    if($row_count==0){
        echo "<h2 class='text-danger text-center mt-5'>No orders yet</h2>";
    }else{
        $number=0;
        while($row_data=mysqli_fetch_assoc($result)){
            $order_id=$row_data['order_id'];
            $amount_due=$row_data['amount_due'];
            $invoice_number=$row_data['invoice_number'];
            $total_products=$row_data['total_products'];
            $order_date=$row_data['order_date'];
            $order_status=$row_data['order_status'];
            $number++;
?>

        <tr class="text-center">   
            <td><?php echo $number; ?></td>
            <td><?php echo $amount_due; ?></td>
            <td><?php echo $invoice_number; ?></td>
            <td><?php echo $total_products; ?></td>
            <td><?php  echo $order_date; ?></td>
            <td><?php echo $order_status; ?></td>
            <td><a href="index.php?delete_order=<?php echo  $order_id;  ?>" class="text-light"><i class="fa fa-trash"></i></a></td>
    
     
    </tr>
    <?php
}
    } 
}

    ?>
    </tbody>
</table>


</body>
</html>




