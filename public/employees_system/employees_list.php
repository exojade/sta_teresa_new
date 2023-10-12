<link rel="stylesheet" href="AdminLTE/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
<link rel="stylesheet" href="AdminLTE/bower_components/sweetalert/sweetalert2.min.css">

<style>
.products-list {
	padding-right: 10px;
    height: 200px;
    overflow: auto;
}
</style>
  <div class="content-wrapper">
    <div class="container">
    <section class="content">
    <div class="row">
      <div class="col-md-8">
      <div class="box">
            <div class="box-header">
              <h3 class="box-title">Employees</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered table-striped sample-datatable">
                <thead>
                <tr>
                  <th width="20%">Action</th>
                  <th>Employee Name</th>
                  <th>Branch</th>
                  <th>Base Salary</th>
                  <th>Image</th>
                </tr>
                </thead>
                <tbody>
                  <?php foreach($employees as $u): ?>
                    <tr>
                      <td>
                        <a href="#" title="Update User" data-toggle="modal" data-target="#modal_<?php echo($u["user_id"]); ?>" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                        <a href="#" title="Delete User" data-toggle="modal" data-target="#modal_<?php echo($u["user_id"]); ?>" class="btn btn-danger"><i class="fa fa-close"></i></a>
                        <form class="general_form" style="display: inline;">
							<input type="hidden" name="action" value="reset_password">
							<input  type="hidden" name="user_id" value="<?php echo($u["user_id"]); ?>">
							<button title="Change Password" type="submit" class="btn btn-success"><i class="fa fa-refresh"></i></a>
				  		</form>
                      
					</td>
                      <td><?php echo($u["employee_name"]); ?></td>
                      <td><?php echo($u["branch"]); ?></td>
                      <td><?php echo($u["base_salary"]); ?></td>
                      <td>
                      <?php if($u["profile"] != ""): ?>
                          <a data-toggle="modal" data-target="#modal_image_<?php echo($u["user_id"]); ?>"  href="#" ><img style="border: 2px solid black;" src="<?php echo($u["profile"]); ?>" width="50" height="50"></a>
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
                  <th>Employee Name</th>
                  <th>Branch</th>
                  <th>Base Salary</th>
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
                  <label for="exampleInputEmail1">Employee Name</label>
                  <input required type="text" name="employee_name" class="form-control" id="exampleInputEmail1" placeholder="Enter ---">
                </div>
				        <div class="form-group">
                  <label for="exampleInputEmail1">Base Salary</label>
                  <input required type="number" step="0.01" name="base_salary" class="form-control" id="exampleInputEmail1" placeholder="Enter ---">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Branch</label>
                  <input required type="text" name="branch" class="form-control" id="exampleInputEmail1" placeholder="Enter ---">
                </div>
				        <div class="form-group">
                  <label for="exampleInputFile">Profile Image</label>
                  <input required name="image_url" type="file" id="exampleInputFile">
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