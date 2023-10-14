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
              <h3 class="box-title">Plan List</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered table-striped sample-datatable">
                <thead>
                <tr>
                  <th width="20%">Action</th>
                  <th>Plan</th>
                </tr>
                </thead>
                <tbody>
                  <?php foreach($plans as $row): ?>
                    <tr>
                      <td>

                      <form class="general_form" data-url="plan">
                        <input type="hidden" name="action" value="delete_plan">
                        <input type="hidden" name="plan_id" value="<?php echo($row["plan_id"]); ?>">
                    
                        <button class="btn btn-danger" type="submit">Delete</button>
                        </form>

                      </td>
                      <td><?php echo($row["plan"]); ?></td>
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
              <h3 class="box-title">Add Plan</h3>
            </div>
            <div class="box-body">
				<form class="general_form" data-url="plan">
				<input type="hidden" name="action" value="add">
				<div class="form-group">
                  <label for="exampleInputEmail1">Plan Name</label>
                  <input required type="text" name="plan_name" class="form-control" id="exampleInputEmail1" placeholder="---">
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