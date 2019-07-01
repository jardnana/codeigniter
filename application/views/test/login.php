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
            <?php if(isset($_SESSION['login']) && $_SESSION['login'] == 0){
            $_SESSION['login'] = 2; ?>
            <div class="row justify-content-center"><h2 class="text-align-center">Invalid Login Credentials </h2></div>
            <?php } ?>
                  <div class="row justify-content-center"><h2 class="text-align-center"> Login Form </h2></div>
                    <?php echo form_open('Login_test/validate_user'); ?>
                            <div class="form-group row">
                                <label for="username" class="col-md-4">Username:</label>
                                <div class="col-md-6">
                                    <input type="text" id="username" class="form-control" name="username" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4">Password:</label>
                                <div class="col-md-6">
                                    <input type="Password" id="password" class="form-control" name="Password" required>
                                </div>
                            </div>

 
                            <div class="col-md-6 offset-md-4">
                                <button type="submit"  id = "loginButton" class="btn btn-primary">
                                    Login
                                </button>
                                
                            </div>
                    <?php echo form_close(); ?>
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