<link rel="stylesheet" href="AdminLTE/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
<link rel="stylesheet" href="AdminLTE/bower_components/sweetalert/sweetalert2.min.css">
<link rel="stylesheet" href="AdminLTE/bower_components/select2/dist/css/select2.min.css">
<link rel="stylesheet" href="AdminLTE/dist/css/AdminLTE.min.css">
<style>
.products-list {
	padding-right: 10px;
    height: 200px;
    overflow: auto;
}
</style>


<div class="modal fade" id="add_employee">
		<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header bg-primary">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span></button>
				<h3 class="modal-title text-center">Create Payroll</h3>
			</div>
			<div class="modal-body">
			<form class="general_form" data-url="payroll" autocomplete="off">
				<input type="hidden" name="action" value="add_employee">
				<input type="hidden" name="payroll_id" value="<?php echo($_GET["id"]); ?>">
              <div class="form-group">
                <label>Employees *</label>
                <select name="employee" class="form-control select2" style="width: 100%;">
                  <option selected="selected" disabled value="">Please select employee</option>
                  <?php foreach($employees as $row): ?>
                    <option value="<?php echo($row["employee_id"]); ?>"><?php echo($row["employee_name"]); ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
              
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Days Rendered *</label>
                    <input placeholder="Days Rendered" required name="number_days" required type="number"  class="form-control">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Cash Advance (optional)</label>
                    <input placeholder="Cash Advance" name="cash_advance" step="0.01" type="number"  class="form-control">
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




  <?php foreach($payroll_employees as $row): ?>
      <div class="modal fade" id="modalUpdate<?php echo($row["employee_id"]); ?>">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Update Information</h4>
              </div>
              <form class="general_form" data-url="payroll">
              <div class="modal-body">
              <input type="hidden" name="action" value="update">
              <input type="hidden" name="employee_id" value="<?php echo($row["employee_id"]); ?>">
              <input type="hidden" name="payroll_id" value="<?php echo($_GET["id"]); ?>">
              <div class="form-group">
                  <label for="exampleInputEmail1">Employee Name</label>
                  <input required type="text" value="<?php echo($row["employee_name"]); ?>" disabled class="form-control" id="exampleInputEmail1" placeholder="Enter ---">
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Days</label>
                      <input required type="number" value="<?php echo($row["number_days"]); ?>" name="number_days" class="form-control" id="exampleInputEmail1" placeholder="Enter ---">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Cash Advance</label>
                      <input required type="text" value="<?php echo($row["cash_advance"]); ?>" name="cash_advance" class="form-control" id="exampleInputEmail1" placeholder="Enter ---">
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

    <?php endforeach; ?>




  <div class="content-wrapper">
    <div class="container">
    <section class="content">
    <div class="row">
      <div class="col-md-12">
      <div class="box">
            <div class="box-header">
              <h3 class="box-title">Salary Report</h3>
              <a  href="#" data-toggle="modal" data-target="#add_employee" class="btn btn-primary pull-right">Add Employee</a> 

              <form class="generic_form_pdf pull-right" data-url="payroll" style="display:inline; margin-right: 10px;">
              <input type="hidden" name="action" value="pdf_payroll">
              <input type="hidden" name="payroll_id" value="<?php echo($_GET["id"]); ?>">
                          <button class="btn btn-success btn">Print Payroll</button>
                <!-- <a href="resources/payroll_sample.pdf" target="_blank" class="btn btn-success pull-right" style="margin-right: 10px;">Print Payroll Report</a> -->
              </form>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered table-striped sample-datatable">
                <thead>
                  <tr>
                    <th>Action</th>
                    <th>Employee</th>
                    <th>Base Rate</th>
                    <th>Days</th>
                    <th>Gross Pay</th>
                    <th>Benefits</th>
                    <th>Deductions</th>
                    <th>Net Pay</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($payroll_employees as $row): ?>
                    <tr>
                      <td>
                      <a href="#" title="Update User" data-toggle="modal" data-target="#modalUpdate<?php echo($row["employee_id"]); ?>" class="btn btn-warning">UPDATE</a>
                      <form class="general_form" style="display:inline;" data-url="payroll" autocomplete="off">
                        <input type="hidden" name="action" value="delete_employee">
                        <input type="hidden" name="employee" value="<?php echo($row["employee_id"]); ?>">
                        <input type="hidden" name="payroll_id" value="<?php echo($_GET["id"]); ?>">
                        <button type="submit" class="btn btn-danger">Delete</button>
                      </form>
                      <form class="generic_form_pdf" style="display:inline;" url="payroll">
                      <input type="hidden" name="action" value="payslip_pdf">
                      <input type="hidden" name="payroll_id" value="<?php echo($_GET["id"]); ?>">
                      <input type="hidden" name="employee_id" value="<?php echo($row["employee_id"]); ?>">
                      <button class="btn btn-primary btn-flat">Payslip</button>
                    </form>
                      </td>
                      <td><?php echo($row["employee_name"]); ?></td>
                      <td><?php echo(to_peso($row["base_salary"])); ?></td>
                      <td><?php echo($row["number_days"]); ?></td>
                      <td><?php echo(to_peso($row["base_salary"] * $row["number_days"])); ?></td>
                      <td><?php echo(to_peso($row["benefits"])); ?></td>
                      <td><?php echo(to_peso($row["cash_advance"])); ?></td>
                      <td><?php echo(to_peso(($row["base_salary"] * $row["number_days"]) - to_amount($row["cash_advance"]))); ?></td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
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
  <script src="AdminLTE/bower_components/select2/dist/js/select2.full.min.js"></script>
  <script src="AdminLTE/bower_components/sweetalert/sweetalert2.min.js"></script>
  <script src="AdminLTE/bower_components/Chart.js/Chart.js"></script>
	<script src="AdminLTE/dist/js/adminlte.min.js"></script>
	<script src="AdminLTE/dist/js/demo.js"></script>
  
  <script>
$('.sample-datatable').DataTable();


$('.select2').select2()
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