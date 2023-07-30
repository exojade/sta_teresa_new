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
<?php foreach($employees as $e): ?>
  <div class="modal fade" id="modal_image_<?php echo($e["employee_id"]); ?>">
          <div class="modal-dialog modal-sm">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Image</h4>
              </div>
              <form class="general_form" data-url="employees">
                <input type="hidden" name="action" value="change_image">
                <input type="hidden" name="employee_id" value="<?php echo($e["employee_id"]); ?>">
            
              <div class="modal-body" >
                <img class="img-responsive"  src="<?php echo($e["profile"]); ?>" style="max-height:300px;" alt="Photo">
				

				<div class="form-group">
                  <label for="exampleInputFile">Change Profile Image</label>
                  <input required name="image_url" type="file" id="exampleInputFile">
                </div>

				<button class="btn btn-primary">Submit</button>
			
			</div>

			  <br>
              </form>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
<?php endforeach; ?>


<?php foreach($employees as $e): ?>
  <div class="modal fade" id="modal_<?php echo($e["employee_id"]); ?>">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><?php echo($e["employee_id"]); ?></h4>
              </div>
              <form class="general_form" data-url="employees">
              <div class="modal-body">
                <input type="hidden" name="action" value="update">
                <input type="hidden" name="employee_id" value="<?php echo($e["employee_id"]); ?>">
                <div class="form-group">
                  <label for="exampleInputEmail1">Employee Name</label>
                  <input required type="text" value="<?php echo($e["employee_name"]); ?>" name="employeename" class="form-control" id="exampleInputEmail1" placeholder="---">
                </div>
				<div class="form-group">
                  <label for="exampleInputEmail1">Base Salary</label>
                  <input required type="text" value="<?php echo($e["base_salary"]); ?>" name="fullname" class="form-control" id="exampleInputEmail1" placeholder="---">
                </div>
				<div class="form-group">
                  <label for="exampleInputEmail1">Branch</label>
                  <select name="role" required class="form-control">
						<option selected value="<?php echo($e["branch"]); ?>"><?php echo($e["branch"]); ?></option>
						<option value="PANABO">PANABO</option>
						<option value="BUNAWAN">BUNAWAN</option>
				  </select>
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


        <div class="modal fade" id="modal_add_image_<?php echo($u["employee_id"]); ?>">
          <div class="modal-dialog ">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><?php echo($chapel["chapel_name"]); ?> | Add image</h4>
              </div>
              <form class="general_form" data-url="chapels">
              <div class="modal-body">
                <input type="hidden" name="action" value="add_chapel_image">
                <input type="hidden" name="chapel_id" value="<?php echo($u["employee_id"]); ?>">
                <div id="main_image_div_<?php echo($u["employee_id"]); ?>"></div>
                  <div id="image_div_<?php echo($u["employee_id"]); ?>">
                    <!-- APPEND ITEMS GOES HERE -->
                  </div>
                  <div id="add_image_div_<?php echo($u["employee_id"]); ?>">
                    <div class="row">
                    <div class="col-md-12">
                      <div class="centerbtn">
                        <a href="#" id="add_more_image_<?php echo($u["employee_id"]); ?>">Add Image</a>
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
    <div class="row">
      <div class="col-md-8">
      <div class="box">
            <div class="box-header">
              <h3 class="box-title">employees</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered table-striped sample-datatable">
                <thead>
                <tr>
                  <th width="20%">Action</th>
                  <th>Employee</th>
                  <th>Branch</th>
                  <th>Salary</th>
                  <th>Image</th>
                </tr>
                </thead>
                <tbody>
                  <?php foreach($employees as $e): ?>
                    <tr>
                      <td>
                        <a href="#" title="Update employee" data-toggle="modal" data-target="#modal_<?php echo($e["employee_id"]); ?>" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                        <a href="#" title="Delete employee" data-toggle="modal" data-target="#modal_<?php echo($e["employee_id"]); ?>" class="btn btn-danger"><i class="fa fa-close"></i></a>
              
                      
					</td>
                      <td><?php echo($e["employee_name"]); ?></td>
                      <td><?php echo($e["branch"]); ?></td>
                      <td><?php echo($e["base_salary"]); ?></td>
                      <td>
                          <a data-toggle="modal" data-target="#modal_image_<?php echo($e["employee_id"]); ?>"  href="#" ><img style="border: 2px solid black;" src="<?php echo($e["profile"]); ?>" width="50" height="50"></a>
                      </td>

                    </tr>
                  <?php endforeach; ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>Action</th>
                  <th>ID</th>
                  <th>chapel</th>
                  <th>Amount</th>
                  <th>Image</th>
                </tr>
                </tfoot>
              </table>
            </div>
          </div>
      </div>

	 <div class="col-md-4">


	 <div class="box">
            <div class="box-header">
              <h3 class="box-title">Add employees</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
				<form class="general_form" data-url="employees">
				<input type="hidden" name="action" value="add">
				<div class="form-group">
                  <label for="exampleInputEmail1">Name of the Employee</label>
                  <input required type="text" name="employee_name" class="form-control" id="exampleInputEmail1" placeholder="---">
                </div>
				<div class="form-group">
                  <label for="exampleInputEmail1">Base Salary</label>
                  <input required type="text" name="base_salary" class="form-control" id="exampleInputEmail1" placeholder="---">
                </div>
				
				<div class="form-group">
                  <label for="exampleInputEmail1">Branch</label>
				  <select class="form-control" name="branch" required>
							<option selected disabled value="">Please select branch assigned</option>
							<option value="PANABO">PANABO</option>
							<option value="BUNAWAN">BUNAWAN</option>
						</select>
                </div>
				<div class="form-group">
                  <label for="exampleInputFile">Profile Image</label>
                  <input name="image_url" type="file" id="exampleInputFile">
                </div>
				<button class="btn btn-primary" type="submit">Submit</button>
						</form>
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
</script>