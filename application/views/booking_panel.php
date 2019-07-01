<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Booking</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	 <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
</head>

<body>
<div class="container">
       <table class="table table-striped">
          <tbody>
             <tr>
                <td colspan="1">
                   <form class="well form-horizontal" action="<?php  echo base_url('index.php/booking/saveBooking')?>" method="post"  enctype="multipart/form-data">
                      <fieldset>
                         <div class="form-group">
                          <input type = "hidden" name = "book_id" value = "<?php  echo $book_data['booking_id'];?>">

                          <?php  
                            $domestic = '';
                            $international = '';
                          if($book_data['book_type'] == 'domestic')
                          {
                            $domestic = 'checked';
                          }
                          else if($book_data['book_type'] == 'international')
                          {
                            $international = 'checked';
                          }

                          ?>
                            <div class=" row col-md-10 inputGroupContainer">
                            <div class="col-md-6">
                                  <input type="radio" id="domestic" class = "BookTypePointer" data-type = "domestic" value = "domestic" name="book_type" <?php echo $domestic ; ?>>
                                    <label for="domestic">Domestic</label>
                            </div>
                            <div class="col-md-6">
                               <input type="radio" id="international" name="book_type"  class = "BookTypePointer"  data-type = "international"  value = "international" <?php echo $international ; ?> >
                                    <label for="international">International</label>
                            </div>
                            </div>
                         </div>
                         <div class="form-group">
                            <div class=" row col-md-10 inputGroupContainer">
                            <div class="col-md-6">
                                  <select class="selectpicker form-control"  id = "DomesticBookCity" name = "d_book_city">
                                      <?php if($book_data['book_type'] == 'domestic')
                                      {
                                      
                                         $arr1 = array('Hyderabad','Banaglore','Goa','Delhi');
                                        foreach($arr1 as $val)
                                        {
                                           if($book_data['book_type'] == $val)
                                           {
                                              echo '<option value = "'.$val.'" selected>'.$val.'</option>';
                                           }
                                           else
                                           {
                                              echo '<option value = "'.$val.'">'.$val.'</option>';
                                           }
                                        }
                                       

                                      }

                                        ?>
                                  </select>
                            </div>
                            <div class="col-md-6">
                                 <select class="selectpicker form-control" id = "internationBookCity" name = "i_book_city">
                                      <?php if($book_data['book_type'] == 'international')
                                      {
                                       
                                        $arr2 = array('India','USA','UK','Austraila');
                                        foreach($arr2 as $val)
                                        {
                                           if($book_data['book_type'] == $val)
                                           {
                                              echo '<option value = "'.$val.'" selected>'.$val.'</option>';
                                           }
                                           else
                                           {
                                              echo '<option value = "'.$val.'">'.$val.'</option>';
                                           }
                                        }
                                       

                                      }
                                      ?>
                                  </select>
                            </div>
                            </div>
                         </div>

                          <div class="form-group">
                            <div class=" row col-md-10 inputGroupContainer">
                            <div class="col-md-6">
                                  <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span><input id="datepicker1" name="fromdate" class="form-control" placeholder="From Date" required="true" value="<?php echo  date('d/m/Y',strtotime($book_data ['form_date']));?>" type="text"></div>
                            </div>
                            <div class="col-md-6">
                                 <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span><input id="datepicker2" name="todate" class="form-control" required="true"  placeholder="To Date" value="<?php echo  date('d/m/Y',strtotime($book_data ['to_date']));?>" type="text"></div>
                            </div>
                            </div>
                         </div>

                         <div class="form-group">
                            <label class="col-md-10 control-label">Class</label>
                            <div class="col-md-10 inputGroupContainer">
                               <div class="input-group">
                                  <span class="input-group-addon" style="max-width: 100%;"><i class="glyphicon glyphicon-list"></i></span>
                                  <select class="selectpicker form-control" name = "book_class">
                                  <?php 

                                    $arr3 = array('A','B','C','D');
                                    foreach($arr3 as $val)
                                    {
                                      if($book_data ['to_date'] == $val)
                                      {
                                        echo '<option value = "'.$val.'" selected>'.$val.'</option>';
                                      }
                                      else
                                      {
                                       echo '<option value = "'.$val.'">'.$val.'</option>';
                                      }
                                    }

                                  ?>
                                     
                                  </select>
                               </div>
                            </div>
                         </div>

                         <div class="form-group">
                            <label class="col-md-10 control-label">Price</label>
                            <div class="col-md-10 inputGroupContainer">
                               <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span><input id="price" name="book_price"  class="form-control" required="true" value="<?php echo $book_data['price'];?>" type="text"></div>
                            </div>
                         </div>

                         <div class="form-group">
                            <label class="col-md-10 control-label">Image</label>
                            <div class="col-md-10 inputGroupContainer">
                               <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span><input id="book_image" name="book_image" class="form-control" value="" type="file"></div>
                            </div>
                         </div>
                         

 
                         <div class="form-group">
                            <div class="col-md-10 inputGroupContainer">
                               <div class="input-group"> <button type="submit"  id = "bookSubmitButton" class="btn btn-primary">
                                    Login
                                </button></div>
                            </div>
                         </div>
                      </fieldset>
                   </form>
                </td>
                
             </tr>
          </tbody>
       </table>
    </div>
 
</body>
 
 <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script>

$(".BookTypePointer").click(function(e) {
   var Intype = $(this).data('type');
    $.ajax({
           type: "POST",
           url: '<?php echo base_url("index.php/booking/getVals")?>',
           data: {'book_type':Intype}, // serializes the form's elements.
           success: function(data)
           {
              if(Intype == 'domestic')
              {
                $('#DomesticBookCity').append(data);
                $('#internationBookCity').empty();
              }
              else
              {
                 $('#internationBookCity').append(data);
                 $('#DomesticBookCity').empty();
              }
           }
         });


});

  $( function() {
    $( "#datepicker1" ).datepicker();
  } );

  $( function() {
    $( "#datepicker2" ).datepicker();
  } );
</script>
</html>