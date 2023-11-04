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


    <?php foreach($partners as $row): ?>
  <div class="modal fade" id="modal_<?php echo($row["partner_id"]); ?>">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Image</h4>
              </div>
        
            
              <div class="modal-body" >
                <img class="img-responsive"  src="<?php echo($row["partner_image"]); ?>" style="max-height:300px;" alt="Photo">
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
<?php endforeach; ?>

    <div class="row">
      <div class="col-md-8">
      <div class="box">
            <div class="box-header">
              <h3 class="box-title">Partners List</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered table-striped sample-datatable">
                <thead>
                <tr>
                  <th width="20%">Action</th>
                  <th>Partner</th>
                  <th>Image</th>
                </tr>
                </thead>
                <tbody>
                  <?php foreach($partners as $row): ?>
                    <tr>
                      <td>

                      <form class="general_form" data-url="partners">
                        <input type="hidden" name="action" value="delete">
                        <input type="hidden" name="partner_id" value="<?php echo($row["partner_id"]); ?>">
                        <button class="btn btn-danger" type="submit">Delete</button>
                      </form>
                      </td>
                      <td><?php echo($row["partner_name"]); ?></td>
                      <td><a data-toggle="modal" data-target="#modal_<?php echo($row["partner_id"]); ?>"  href="#" ><img style="border: 2px solid black;" src="<?php echo($row["partner_image"]); ?>" width="50" height="50"></a></td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
             
              </table>
            </div>
          </div>
      </div>

	 <div class="col-md-4">


	 <div class="box">
            <div class="box-header">
              <h3 class="box-title">Add Partner</h3>
            </div>
            <div class="box-body">
				<form class="general_form" data-url="partners">
				<input type="hidden" name="action" value="add">
				        <div class="form-group">
                  <label for="exampleInputEmail1">Partner Name</label>
                  <input required type="text" name="partner_name" class="form-control" id="exampleInputEmail1" placeholder="---">
                </div>

                <div class="form-group">
                  <label for="exampleInputFile">Image</label>
                  <input name="image" type="file" id="exampleInputFile">

                  <p class="help-block">Upload partner image here.</p>
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