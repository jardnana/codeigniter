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
                  <div class="row justify-content-center"><h2 class="text-align-center"> Add Product Details </h2></div>
                    <?php echo form_open_multipart('Login_test/add_details'); ?>
                            <div class="form-group row">
                                <label for="category" class="col-md-4">Category:</label>
                                <div class="col-md-6">
                                    <select name="category" class="select_ids" width="10%">
                                    <option value="">Select Category </option>
                                    <?php foreach ($cat as $key => $value) {  ?>
                                      <option value="<?php echo $value['category']; ?>"><?php echo $value['category']; ?></option>
                                    <?php } ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="product" class="col-md-4">Product:</label>
                                <div class="col-md-6">
                                    <select name="product" width="10%" class="app_list">
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="price" class="col-md-4">Price:</label>
                                <div class="col-md-6">
                                    <input type="text" id="price" class="form-control" name="price" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="price" class="col-md-4">Quantity:</label>
                                <div class="col-md-6">
                                    <input type="text" id="quantity" class="form-control" name="quantity" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="image" class="col-md-4">Product Image:</label>
                                <div class="col-md-6">
                                    <input type="file" id="image" class="form-control" name="image" required>
                                </div>
                            </div>
                            <div class="col-md-6 offset-md-4">
                                <button type="submit"  id = "loginButton" class="btn btn-primary">
                                    Save Details
                                </button>
                            </div>
                            <?php //echo validation_errors(); ?>
                    <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
</body>
<input type="hidden" value="" id="base_url">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
</html>

<script type="text/javascript">
$(document).ready(function() {
  $('.select_ids').change(function () {
  var selected = $('.select_ids :selected').val();
  $.ajax({
        url : "<?php echo base_url(); ?>index.php/Login_test/Get_product/"+selected,
        type : "POST",
        dataType : "json",
        success : function(data) {
          var app_list = '';
             $.each(data, function(key,val) {
              app_list += '<option value="'+val.product+'">'+val.product+'</option>';
        });
             $('.app_list').html(app_list);
        },
        error : function(data) {
            // do something
        }
    });

  });
});
</script>