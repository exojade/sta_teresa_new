<link rel="stylesheet" href="AdminLTE/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
<link rel="stylesheet" href="AdminLTE/bower_components/sweetalert/sweetalert2.min.css">

<style>
.products-list {
	padding-right: 10px;
    height: 200px;
    overflow: auto;
}
</style>



<!-- Content Wrapper. Contains page content -->


      <div class="modal fade" id="modal_add_chapel">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Add chapel</h4>
              </div>
              <form class="general_form" data-url="chapels">
              <div class="modal-body">
              <input type="hidden" name="action" value="add">
                <div class="form-group">
                  <label for="exampleInputEmail1">chapel Name</label>
                  <input required type="text" name="chapel" class="form-control" id="exampleInputEmail1" placeholder="Enter chapel Name">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Price / Amount</label>
                  <input required type="number" name="amount" class="form-control" id="exampleInputEmail1" placeholder="Enter chapel Name">
                </div>

                <?php $branch = query("select * from branch"); ?>
                <div class="form-group">
                  <label for="exampleInputEmail1">Branch</label>
                  <select class="form-control" required name="branch">
                    <option value="" disabled selected>Please Select Branch</option>
                    <?php foreach($branch as $row): ?>
                      <option value="<?php echo($row["branch"]); ?>"><?php echo($row["branch"]); ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
                <div id="main_image_div"></div>
                  <div id="image_div">
                    <!-- APPEND ITEMS GOES HERE -->
                  </div>
                  <div id="add_image_div">
                    <div class="row">
                    <div class="col-md-12">
                      <div class="centerbtn">
                        <a href="#" id="add_more_image">Add Image</a>
                      </div>
                    </div>
                    </div>
                  </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
              </div>
              </form>
            </div>
          </div>
        </div>
<?php foreach($chapels_image as $image): ?>
  <div class="modal fade" id="modal_<?php echo($image["chapel_image_id"]); ?>">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Image</h4>
              </div>
              <form class="general_form" data-url="chapels">
                <input type="hidden" name="action" value="delete_image">
                <input type="hidden" name="image_id" value="<?php echo($image["chapel_image_id"]); ?>">
            
              <div class="modal-body" >
                <img class="img-responsive"  src="<?php echo($image["chapel_image"]); ?>" style="max-height:300px;" alt="Photo">
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-danger">Delete</button>
              </div>
              </form>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
<?php endforeach; ?>


<?php foreach($chapels as $chapel): ?>
  <div class="modal fade" id="modal_<?php echo($chapel["chapel_id"]); ?>">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><?php echo($chapel["chapel_name"]); ?></h4>
              </div>
              <form class="general_form" data-url="chapels">
              <div class="modal-body">
                <input type="hidden" name="action" value="update">
                <input type="hidden" name="chapel_id" value="<?php echo($chapel["chapel_id"]); ?>">
                <div class="form-group">
                  <label for="exampleInputEmail1">Chapel Name</label>
                  <input required type="text" value="<?php echo($chapel["chapel_name"]); ?>" name="chapel" class="form-control" id="exampleInputEmail1" placeholder="---">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Price / Amount</label>
                  <input required type="number" value="<?php echo($chapel["price_amount"]); ?>" name="amount" class="form-control" id="exampleInputEmail1" placeholder="---">
                </div>
              


              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
              </div>
              </form>
            </div>
          </div>
        </div>


        <div class="modal fade" id="modal_add_image_<?php echo($chapel["chapel_id"]); ?>">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><?php echo($chapel["chapel_name"]); ?> | Add image</h4>
              </div>
              <form class="general_form" data-url="chapels">
              <div class="modal-body">
                <input type="hidden" name="action" value="add_chapel_image">
                <input type="hidden" name="chapel_id" value="<?php echo($chapel["chapel_id"]); ?>">


                <div id="main_image_div_<?php echo($chapel["chapel_id"]); ?>"></div>
                  <div id="image_div_<?php echo($chapel["chapel_id"]); ?>">
                    <!-- APPEND ITEMS GOES HERE -->
                  </div>
                  <div id="add_image_div_<?php echo($chapel["chapel_id"]); ?>">
                    <div class="row">
                    <div class="col-md-12">
                      <div class="centerbtn">
                        <a href="#" id="add_more_image_<?php echo($chapel["chapel_id"]); ?>">Add Image</a>
                      </div>
                    </div>
                    </div>
                  </div>
               
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
              </div>
              </form>
            </div>
          </div>
        </div>
        <script>
  $("body").on("click", "#remove_image_<?php echo($chapel["chapel_id"]); ?>", function() {
    $(this).parents("#image_div_<?php echo($chapel["chapel_id"]); ?>").remove();
  });
  $("#add_more_image_<?php echo($chapel["chapel_id"]); ?>").on("click", function(e) {
    e.preventDefault();
	var newform ='<div id="image_div_<?php echo($chapel["chapel_id"]); ?>"> \
        <div class="row"> \
					<div class="col-md-10"> \
          <div class="form-group">\
                  <input name="chapel_image[]" accept="image/*" required type="file" id="exampleInputFile">\
          </div>\
          </div> \
					<div class="col-md-2"><div class="form-group"><button type="button" id="remove_image_<?php echo($chapel["chapel_id"]); ?>" class="btn btn-info btn-flat btn-block"><i class="fa fa-remove"></i></button></div></div> \
				 </div>\
				 </div>\
         ';
    // var newform = '<div id="child_residence"><div class="col-md-3"><div class="form-group"><input type="text" name="dependentname[]" class="form-control" class="form-control" placeholder="Full Name" required /><div class="help-block with-errors"></div></div></div><div class="col-md-2"><div class="form-group"><input type="date" name="dependentdob[]" class="form-control" class="form-control" placeholder="Birthdate Birthdate (MM/DD/YYYY)" required /><div class="help-block with-errors"></div></div></div><div class="col-md-2"><div class="form-group"><select name="dependentcivilstatus[]" class="form-control" required><option value="" disabled selected>Status</option><option value="SINGLE">SINGLE</option><option value="MARRIED">MARRIED</option><option value="DIVORCED">DIVORCED</option><option value="SEPARATED">SEPARATED</option><option value="WIDOW">WIDOW</option></select><div class="help-block with-errors"></div></div></div><div class="col-md-2"><div class="form-group"><input type="text" name="dependentrelationship[]" class="form-control" class="form-control" placeholder="Relationship" required /><div class="help-block with-errors"></div></div></div><div class="col-md-2"><div class="form-group"><input type="text" name="dependentoccupation[]" class="form-control" class="form-control" placeholder="Occupation" required /><div class="help-block with-errors"></div></div></div><div class="col-md-1"><div class="form-group"><button type="button" id="removechild" class="btn btn-info btn-flat btn-block"><i class="fa fa-remove"></i></button></div></div></div>';
    $('#add_image_div_<?php echo($chapel["chapel_id"]); ?>').append(newform);
  });
        </script>


<?php endforeach; ?>





  <div class="content-wrapper">
    <div class="container">
    <section class="content">
    <a href="#" data-toggle="modal" data-target="#modal_add_chapel" class="btn btn-primary pull-right">Add chapel Info</a>
    <br>
    <br>
    <div class="row">
      <div class="col-md-12">
      
      <div class="box">
            <div class="box-header">
              <h3 class="box-title">chapels
              
              

              </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered table-striped sample-datatable">
                <thead>
                <tr>
                  <th width="15%">Action</th>
                  <th>ID</th>
                  <th>chapel</th>
                  <th>Amount</th>
                  <th width="45%">Image</th>
                </tr>
                </thead>
                <tbody>
                  <?php foreach($chapels as $chapel): ?>
                    <tr>
                      <td>
                        <a href="#" data-toggle="modal" data-target="#modal_<?php echo($chapel["chapel_id"]); ?>" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                        <a href="#" data-toggle="modal" data-target="#modal_add_image_<?php echo($chapel["chapel_id"]); ?>" class="btn btn-success"><i class="fa fa-plus"></i></a>
                        <a href="#" data-toggle="modal" data-target="#modal_<?php echo($chapel["chapel_id"]); ?>" class="btn btn-danger"><i class="fa fa-close"></i></a>
                      </td>
                      <td><?php echo($chapel["chapel_id"]); ?></td>
                      <td><?php echo($chapel["chapel_name"]); ?></td>
                      <td><?php echo($chapel["price_amount"]); ?></td>
                      <td>
                      <?php if(isset($Chapel_image[$chapel["chapel_id"]])): ?>
                        <?php foreach($Chapel_image[$chapel["chapel_id"]] as $image): ?>
                          <a data-toggle="modal" data-target="#modal_<?php echo($image["chapel_image_id"]); ?>"  href="#" ><img style="border: 2px solid black;" src="<?php echo($image["chapel_image"]); ?>" width="50" height="50"></a>
                        <?php endforeach; ?>
                     
                      <?php endif; ?>
                      </td>

                    </tr>
                  <?php endforeach; ?>
                </tbody>
                <tfoot>
                <tr>
                  <th width="15%">Action</th>
                  <th>ID</th>
                  <th>chapel</th>
                  <th>Amount</th>
                  <th width="45%">Image</th>
                </tr>
                </tfoot>
              </table>
            </div>
          </div>

      </div>
    </div>


   
    </section>
</div>
  </div>
  
  <?php 
    require("layouts/footer.php");
  ?>
  <script src="AdminLTE/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <script src="AdminLTE/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="AdminLTE/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
	<script src="AdminLTE/bower_components/fastclick/lib/fastclick.js"></script>
  <script src="AdminLTE/bower_components/sweetalert/sweetalert2.min.js"></script>
  <script src="AdminLTE/bower_components/Chart.js/Chart.js"></script>
	<script src="AdminLTE/dist/js/adminlte.min.js"></script>
	<script src="AdminLTE/dist/js/demo.js"></script>
  <script>
$('.sample-datatable').DataTable();
  </script>
  <?php
	// render footer 2
	require("layouts/footer_end.php");
  ?>

<script>
  $(function () {
    $('#example2').DataTable()
   
  })



  $("body").on("click", "#remove_image", function() {
    $(this).parents("#image_div").remove();
  });


  $("#add_more_image").on("click", function(e) {
    e.preventDefault();
	var newform ='<div id="image_div"> \
        <div class="row"> \
					<div class="col-md-10"> \
          <div class="form-group">\
                  <input name="chapel_image[]" accept="image/*" required type="file" id="exampleInputFile">\
          </div>\
          </div> \
					<div class="col-md-2"><div class="form-group"><button type="button" id="remove_image" class="btn btn-info btn-flat btn-block"><i class="fa fa-remove"></i></button></div></div> \
				 </div>\
				 </div>\
         ';
    // var newform = '<div id="child_residence"><div class="col-md-3"><div class="form-group"><input type="text" name="dependentname[]" class="form-control" class="form-control" placeholder="Full Name" required /><div class="help-block with-errors"></div></div></div><div class="col-md-2"><div class="form-group"><input type="date" name="dependentdob[]" class="form-control" class="form-control" placeholder="Birthdate Birthdate (MM/DD/YYYY)" required /><div class="help-block with-errors"></div></div></div><div class="col-md-2"><div class="form-group"><select name="dependentcivilstatus[]" class="form-control" required><option value="" disabled selected>Status</option><option value="SINGLE">SINGLE</option><option value="MARRIED">MARRIED</option><option value="DIVORCED">DIVORCED</option><option value="SEPARATED">SEPARATED</option><option value="WIDOW">WIDOW</option></select><div class="help-block with-errors"></div></div></div><div class="col-md-2"><div class="form-group"><input type="text" name="dependentrelationship[]" class="form-control" class="form-control" placeholder="Relationship" required /><div class="help-block with-errors"></div></div></div><div class="col-md-2"><div class="form-group"><input type="text" name="dependentoccupation[]" class="form-control" class="form-control" placeholder="Occupation" required /><div class="help-block with-errors"></div></div></div><div class="col-md-1"><div class="form-group"><button type="button" id="removechild" class="btn btn-info btn-flat btn-block"><i class="fa fa-remove"></i></button></div></div></div>';
    $('#add_image_div').append(newform);
  });






</script>