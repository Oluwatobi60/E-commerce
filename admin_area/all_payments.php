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
    
<h3 class="text-success text-center">All Payments</h3>

<table class="table table-bordered mt-5">
<thead class="bg-info">

    <?php
if(isset($_GET['all_payments'])){

$select_payment="Select * from user_payments";
$result=mysqli_query($con,$select_payment);
$row_count=mysqli_num_rows($result);
echo "<tr class='text-center'>
        <th>S/N</th>
        <th>Invoice number</th>
        <th>Amount</th>
        <th>Payment mode</th>
        <th>Order date</th>
        <th>Delete</th>
    </tr>
</thead>
<tbody  class='bg-secondary text-light'>";
    if($row_count==0){
        echo "<h2 class='text-danger text-center mt-5'>No payments received yet</h2>";
    }else{
        $number=0;
        while($row_data=mysqli_fetch_assoc($result)){
            $payment_id=$row_data['payment_id'];
            $invoice_number=$row_data['invoice_number'];
            $amount=$row_data['amount'];
            $payment_mode=$row_data['payment_mode'];
            $order_date=$row_data['date'];
            $number++;
?>

        <tr class="text-center">   
            <td><?php echo $number; ?></td>
            <td><?php echo $invoice_number; ?></td>
            <td><?php echo $amount; ?></td>
            <td><?php  echo $payment_mode; ?></td>
            <td><?php echo $order_date; ?></td>
            <td><a href="index.php?delete_payment=<?php echo  $payment_id;  ?>" class="text-light"><i class="fa fa-trash"></i></a></td>
    
     
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




