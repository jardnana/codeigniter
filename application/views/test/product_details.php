<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Login</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	 
</head>

<body>
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-8">
            <br/><br/><br/><br/><br/>
                  <div class="row justify-content-center"><h2 class="text-align-center"> Product Details </h2></div>
                    <?php echo form_open('Login_test/add_details'); ?>
                    <div class="row">
                    <div class="col-md-10"></div>
                    <div class="col-md-2 mb-2">
                    <button type="submit" class="text-align-left btn btn-primary" name="add" value="Add">&nbsp;&nbsp;&nbsp;Add&nbsp;&nbsp;&nbsp;</button></div></div>
                    <?php echo form_close(); ?>
                      <table class="table table-hover table-bordered">
                      <thead>
                        <tr>
                          <th>Sl. No</th>
                          <th>Category</th>
                          <th>Product</th>
                          <th>Price</th>
                          <th>Quantity</th>
                          <th>Image</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php $sl_no = 0;
                      if(isset($product_details) && !empty($product_details)){
                        foreach ($product_details as $key => $value) {
                        $sl_no++; ?>
                          <tr>
                          <td><?php echo $sl_no; ?></td>
                          <td><?php echo $value['category']; ?></td>
                          <td><?php echo $value['product']; ?></td>
                          <td><?php echo $value['price']; ?></td>
                          <td><?php echo $value['quantity']; ?></td>
                          <td><?php echo $value['img_path']; ?></td>
                          <td><a href="<?php echo "edit_details/".$value['id']; ?>">Edit</a> | <a href="<?php echo "delete_details/".$value['id']; ?>">Delete</a></td>
                        </tr>
                      <?php } } ?>
                        
                      </tbody>
                    </table>
                    </div>
                </div>
            </div>

</body>
 
 <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>


<!-- <script>

$("#LoginFormValidate").submit(function(e) {

    e.preventDefault(); // avoid to execute the actual submit of the form.
    var form = $(this);
    var url = form.attr('action');
    $.ajax({
           type: "POST",
           url: url,
           data: form.serialize(), // serializes the form's elements.
           success: function(msg)
           {
               if(msg == 'invalid')
               {
               		alert('Please enter valid details');
               }
               else if(msg == 'invalid')
               {
					alert('Please enter details');
               }
               else if(msg == 'success')
               {
               		location.replace('<?php echo base_url("index.php/Booking")?>');
               }
           }
         });


});
</script> -->
</html>