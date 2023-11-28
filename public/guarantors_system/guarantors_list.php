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


<?php foreach($guarantors as $row): ?>
  <div class="modal fade" id="modal_<?php echo($row["tbl_id"]); ?>">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><?php echo($row["guarantor"]); ?></h4>
              </div>
              <form class="general_form" data-url="guarantors">
              <div class="modal-body">
                <input type="hidden" name="action" value="update">
                <input type="hidden" name="tbl_id" value="<?php echo($row["tbl_id"]); ?>">
                <div class="form-group">
                  <label for="exampleInputEmail1">Guarantor</label>
                  <input required type="text" value="<?php echo($row["guarantor"]); ?>" name="guarantor" class="form-control" id="exampleInputEmail1" placeholder="---">
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
<?php endforeach; ?>







    <div class="row">
      <div class="col-md-8">
      <div class="box">
            <div class="box-header">
              <h3 class="box-title">Guarantors</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered table-striped sample-datatable">
                <thead>
                <tr>
                  <th width="20%">Action</th>
                  <th>Guarantor</th>
                </tr>
                </thead>
                <tbody>
                  <?php foreach($guarantors as $row): ?>
                    <tr>
                      <td>
                        <a class="btn btn-warning" href="#" data-toggle="modal" data-target="#modal_<?php echo($row["tbl_id"]); ?>">Update</a>
                      </td>
                      <td><?php echo($row["guarantor"]); ?></td>
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
              <h3 class="box-title">Add Guarantor</h3>
            </div>
            <div class="box-body">
				<form class="general_form" data-url="guarantors">
				<input type="hidden" name="action" value="add">
				<div class="form-group">
                  <label for="exampleInputEmail1">Guarantor</label>
                  <input required type="text" name="guarantor" class="form-control" id="exampleInputEmail1" placeholder="---">
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