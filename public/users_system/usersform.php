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


<?php foreach($users as $u): ?>
  <div class="modal fade" id="modal_image_<?php echo($u["user_id"]); ?>">
          <div class="modal-dialog modal-sm">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Image</h4>
              </div>
              <form class="general_form" data-url="users">
                <input type="hidden" name="action" value="change_image">
                <input type="hidden" name="user_id" value="<?php echo($u["user_id"]); ?>">
            
              <div class="modal-body" >
                <img class="img-responsive"  src="<?php echo($u["image_url"]); ?>" style="max-height:300px;" alt="Photo">
				

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


<?php foreach($users as $u): ?>
  <div class="modal fade" id="modal_<?php echo($u["user_id"]); ?>">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><?php echo($u["user_id"]); ?></h4>
              </div>
              <form class="general_form" data-url="users">
              <div class="modal-body">
                <input type="hidden" name="action" value="update">
                <input type="hidden" name="user_id" value="<?php echo($u["user_id"]); ?>">
                <div class="form-group">
                  <label for="exampleInputEmail1">Username</label>
                  <input required type="text" value="<?php echo($u["username"]); ?>" name="username" class="form-control" id="exampleInputEmail1" placeholder="---">
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Password</label>
                  <input  type="password"  name="password" class="form-control" id="exampleInputEmail1" placeholder="(Input if change password)">
                </div>

				<div class="form-group">
                  <label for="exampleInputEmail1">Fullname</label>
                  <input required type="text" value="<?php echo($u["fullname"]); ?>" name="fullname" class="form-control" id="exampleInputEmail1" placeholder="---">
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Position</label>
                  <input required type="text" value="<?php echo($u["position"]); ?>" name="position" class="form-control" id="exampleInputEmail1" placeholder="---">
                </div>
				<div class="form-group">
                  <label for="exampleInputEmail1">Role</label>
                  <select name="role" required class="form-control">
						<option selected value="<?php echo($u["role"]); ?>"><?php echo($u["role"]); ?></option>
						<option value="ADMIN">ADMIN</option>
						<option value="USER">USER</option>
				  </select>
                </div>

                <div class="form-group">
                  <label for="exampleInputFile">Image</label>
                  <input name="image" type="file" id="exampleInputFile">
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


        <div class="modal fade" id="modal_add_image_<?php echo($u["user_id"]); ?>">
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
                <input type="hidden" name="chapel_id" value="<?php echo($u["user_id"]); ?>">
                <div id="main_image_div_<?php echo($u["user_id"]); ?>"></div>
                  <div id="image_div_<?php echo($u["user_id"]); ?>">
                    <!-- APPEND ITEMS GOES HERE -->
                  </div>
                  <div id="add_image_div_<?php echo($u["user_id"]); ?>">
                    <div class="row">
                    <div class="col-md-12">
                      <div class="centerbtn">
                        <a href="#" id="add_more_image_<?php echo($u["user_id"]); ?>">Add Image</a>
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
              <h3 class="box-title">Users</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered table-striped sample-datatable">
                <thead>
                <tr>
                  <th width="20%">Action</th>
                  <th>Username</th>
                  <th>Fullname</th>
                  <th>Role</th>
                  <th>Position</th>
                  <th>Image</th>
                </tr>
                </thead>
                <tbody>
                  <?php foreach($users as $u): ?>
                    <tr>
                      <td>
                        <a href="#" title="Update User" data-toggle="modal" data-target="#modal_<?php echo($u["user_id"]); ?>" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                        <form class="general_form" style="display: inline;">
							<input type="hidden" name="action" value="reset_password">
							<input  type="hidden" name="user_id" value="<?php echo($u["user_id"]); ?>">
							<!-- <button title="Change Password" type="submit" class="btn btn-success"><i class="fa fa-refresh"></i></a> -->
				  		</form>
                      
					</td>
                      <td><?php echo($u["username"] . "<br>" . $u["position"]); ?></td>
                      <td><?php echo($u["fullname"]); ?></td>
                      <td><?php echo($u["role"]); ?></td>
                      <td><?php echo($u["position"]); ?></td>
                      <td>
                      <?php if($u["image_url"] != ""): ?>
                          <a data-toggle="modal" data-target="#modal_image_<?php echo($u["user_id"]); ?>"  href="#" ><img style="border: 2px solid black;" src="<?php echo($u["image_url"]); ?>" width="50" height="50"></a>
						<?php else: ?>
						  <a data-toggle="modal" data-target="#modal_image_<?php echo($u["user_id"]); ?>"  href="#" ><img style="border: 2px solid black;" src="resources/avatar5.png" width="50" height="50"></a>
					  <?php endif; ?>
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
              <h3 class="box-title">Add Users</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
				<form class="general_form" data-url="users">
				<input type="hidden" name="action" value="add">
				<div class="form-group">
                  <label for="exampleInputEmail1">Username</label>
                  <input required type="text" name="username" class="form-control" id="exampleInputEmail1" placeholder="Enter username">
                </div>

				<div class="form-group">
                  <label for="exampleInputEmail1">Password</label>
                  <input required type="text" name="password" class="form-control" id="exampleInputEmail1" placeholder="Enter password">
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Fullname</label>
                  <input required type="text" name="fullname" class="form-control" id="exampleInputEmail1" placeholder="Enter full name">
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Position</label>
                  <input required type="text" name="position" class="form-control" id="exampleInputEmail1" placeholder="Enter Position Title">
                </div>
				
				<div class="form-group">
                  <label for="exampleInputEmail1">Role</label>
				  <select class="form-control" name="role" required>
							<option selected disabled value="">Please select role</option>
							<option value="ADMIN">ADMIN</option>
							<option value="USER">USER</option>
						</select>
                </div>

				<div class="form-group">
                  <label for="exampleInputFile">Profile Image</label>
                  <input required name="image_url" type="file" id="exampleInputFile">
                </div>

				<button class="btn btn-primary" type="submit">Submit</button>
						</form>
            </div>
          </div>

          <?php $embalmber_settings = query("select * from site_options"); $settings = $embalmber_settings[0];?>

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Embalmer Settings</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <form class="general_form" data-url="users">
            <input type="hidden" name="action" value="updateEmbalmer">
            <div class="form-group">
                  <label for="exampleInputEmail1">Issued Date</label>
                  <input required value="<?php echo($settings["embalmer_issued"]); ?>" type="date" name="embalmer_issued" class="form-control" id="exampleInputEmail1" placeholder="---">
                </div>

				        <div class="form-group">
                  <label for="exampleInputEmail1">Expiry</label>
                  <input required value="<?php echo($settings["embalmer_expiry"]); ?>" type="date" name="embalmer_expiry" class="form-control" id="exampleInputEmail1" placeholder="Enter password">
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