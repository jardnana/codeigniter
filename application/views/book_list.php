<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Login</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	 
</head>

<body>

<div class="container">
    <div class="row col-md-6 col-md-offset-2 custyle">
    <table class="table table-striped custab">
    <thead>
    <a href="<?php  echo base_url('index.php/booking/book')?>" class="btn btn-primary btn-xs pull-right"><b>+</b> Add new categories</a>
        <tr>
 
            <th>Booking_id</th>
            <th>Customer Name</th>
            <th>Order Id</th>
            <th>Type</th>
            <th>City</th>
            <th>From Date</th>
            <th>To Date</th>
            <th>Class</th>
            <th>Price</th>
            <th>Image</th>
            <th class="text-center">Action</th>
        </tr>
    </thead>
            <?php 

            if($booking_details)
            {
              $i = 1;
              foreach($booking_details as $key=>$val)
              { ?>
                <tr>
                <td><?php echo $i;?></td>
                <td><?php echo 'Swathi';?></td>
                <td><?php echo $val->order_id;?></td>
                <td><?php echo  $val->book_type;?></td>
                <td><?php echo $val->book_city;?></td>
                <td><?php echo date('d/m/Y',strtotime($val->form_date));?></td>
                <td><?php echo date('d/m/Y',strtotime($val->to_date));?></td>
                <td><?php echo $val->book_class;?></td>
                <td><?php echo $val->price;?></td>
                <td><td>
                 <td class="text-center"><a class='btn btn-info btn-xs' href="<?php echo  base_url('index.php/booking/book/'.$val->booking_id)?>"><span class="glyphicon glyphicon-edit"></span> Edit</a></td>
                 </tr>
             <?php 
             $i++; }
            }
            else
            {
              echo '<tr><td>No bookings are available </td></tr>';
            }


            ?>
             
    </table>
    </div>
</div>

</body>
 
 <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
 
</html>