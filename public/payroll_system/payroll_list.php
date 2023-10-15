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
      <div class="col-md-12">
      <div class="box">
            <div class="box-header">
              <h3 class="box-title">Payroll List</h3>
              <a href="#" data-toggle="modal" data-target="#modal_payroll" class="btn btn-primary pull-right">Create Payroll</a>
            </div>
            <div class="box-body">
              <table class="table table-bordered table-striped sample-datatable">
                <thead>
                <tr>
                  <th width="10%">Action</th>
                  <th>Payroll Title</th>
                  <th># of Employees</th>
                  <th>Benefits</th>
                  <th>Gross Pay</th>
                  <th>Deductions</th>
                  <th>Net Pay</th>
                </tr>
                </thead>

                <tbody>
                <?php foreach($payroll as $row): ?>
                  <tr>
                  <td>
                      <a href="payroll?action=details&id=<?php echo($row["payroll_id"]); ?>" class="btn btn-warning"><i class="fa fa-pencil"></i></a>
                  </td>
                  <td><?php echo(short_date($row["from_date"]) . " - " . short_date($row["to_date"])); ?></td>
                  <?php if(isset($Employees[$row["payroll_id"]])): ?>
                      <td><?php echo($Employees[$row["payroll_id"]]["employees"]); ?></td>
                      <td><?php echo(to_peso($Employees[$row["payroll_id"]]["benefits"])); ?></td>
                      <td><?php echo(to_peso($Employees[$row["payroll_id"]]["base_salary"])); ?></td>
                      <td><?php echo(to_peso($Employees[$row["payroll_id"]]["cash_advance"])); ?></td>
                      <td><?php echo(to_peso($Employees[$row["payroll_id"]]["base_salary"] - $Employees[$row["payroll_id"]]["cash_advance"])); ?></td>
                  <?php else: ?>
                      <td>-</td>
                      <td>-</td>
                      <td>-</td>
                      <td>-</td>
                      <td>-</td>
                  <?php endif; ?>
                  </tr>
                <?php endforeach; ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>Action</th>
                  <th>Payroll ID</th>
                  <th>Payroll Title</th>
                  <th># of Employees</th>
                  <th>Benefits</th>
                  <th>Deductions</th>
                  <th>Salary</th>
                </tr>
                </tfoot>
              </table>
            </div>
          </div>
      </div>
    </div>
    <div class="modal fade" id="modal_payroll">
		<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header bg-primary">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span></button>
				<h3 class="modal-title text-center">Create Payroll</h3>
			</div>
			<div class="modal-body">
			<form class="general_form" data-url="payroll" autocomplete="off">
				<input type="hidden" name="action" value="add_payroll">
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label>From</label>
              <input required name="from_date" required type="date"  class="form-control">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label>To</label>
              <input required name="to_date" required type="date"  class="form-control">
            </div>
          </div>
        </div>
			<div class="box-footer">
			<button type="submit" class="btn btn-primary">Submit</button>
			</form>
			</div>
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