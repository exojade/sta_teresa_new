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

    <?php foreach($employees as $row): ?>
      <div class="modal fade" id="modalEdit<?php echo($row["employee_id"]); ?>">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Update Information</h4>
              </div>
              <form class="general_form" data-url="employees">
              <div class="modal-body">
              <input type="hidden" name="action" value="update">
              <input type="hidden" name="employee_id" value="<?php echo($row["employee_id"]); ?>">
              <div class="form-group">
                  <label for="exampleInputEmail1">Employee Name</label>
                  <input required type="text" value="<?php echo($row["employee_name"]); ?>" name="employee_name" class="form-control" id="exampleInputEmail1" placeholder="Enter ---">
                </div>
				        <div class="form-group">
                  <label for="exampleInputEmail1">Base Salary</label>
                  <input required type="number" value="<?php echo($row["base_salary"]); ?>" step="0.01" name="base_salary" class="form-control" id="exampleInputEmail1" placeholder="Enter ---">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Position</label>
                  <input required type="text" value="<?php echo($row["position"]); ?>" name="position" class="form-control" id="exampleInputEmail1" placeholder="Enter ---">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Branch</label>
                  <input required type="text" value="<?php echo($row["branch"]); ?>" name="branch" class="form-control" id="exampleInputEmail1" placeholder="Enter ---">
                </div>
                
				        <div class="form-group">
                  <label for="exampleInputFile">Profile Image</label>
                  <input  name="image_url"  id="imageInput" type="file" id="exampleInputFile">
                </div>

                <div id="imagePreview"><img class="img-responsive" src="<?php echo($row["profile"]); ?>"></div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
              </div>
              </form>
            </div>
          </div>
        </div>

    <?php endforeach; ?>








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
                  <th>Position</th>
                  <th>Branch</th>
                  <th>Base Salary</th>
                  <th>Image</th>
                </tr>
                </thead>
                <tbody>
                  <?php foreach($employees as $u): ?>
                    <tr>
                      <td>
                        <a href="#" title="Update User" data-toggle="modal" data-target="#modalEdit<?php echo($u["employee_id"]); ?>" class="btn btn-warning btn-block">UPDATE</a>
               
                      
					</td>
                      <td><?php echo($u["employee_name"]); ?></td>
                      <td><?php echo($u["position"]); ?></td>
                      <td><?php echo($u["branch"]); ?></td>
                      <td><?php echo($u["base_salary"]); ?></td>
                      <td>
                      <?php if($u["profile"] != ""): ?>
                          <a data-toggle="modal" data-target="#modal_image_<?php echo($u["employee_id"]); ?>"  href="#" ><img style="border: 2px solid black;" src="<?php echo($u["profile"]); ?>" width="50" height="50"></a>
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
                  <th>Position</th>
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
                  <label for="exampleInputEmail1">Position</label>
                  <input required type="text" name="position" class="form-control" id="exampleInputEmail1" placeholder="Enter ---">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Branch</label>
                  <input required type="text" name="branch" class="form-control" id="exampleInputEmail1" placeholder="Enter ---">
                </div>
                
				        <div class="form-group">
                  <label for="exampleInputFile">Profile Image</label>
                  <input required name="image_url"  type="file">
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
    $(document).ready(function(){
        // Add change event listener to the file input
        $('#imageInput').on('change', function(e){
            // Get the selected file
            var file = e.target.files[0];

            // Check if a file is selected
            if(file){
                // Create a FileReader object
                var reader = new FileReader();

                // Set a callback function to execute when the file is read
                reader.onload = function(e){
                    // Create an image element and set the source to the read data URL
                    var image = $('<img class="img-responsive">').attr('src', e.target.result);

                    // Append the image to the preview div
                    $('#imagePreview').html(image);
                };

                // Read the file as a data URL
                reader.readAsDataURL(file);
            } else {
                // If no file is selected, clear the preview div
                $('#imagePreview').html('');
            }
        });
    });
</script>





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