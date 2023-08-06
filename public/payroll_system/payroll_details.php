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
              <h3 class="box-title">Salary Report</h3>
              <a href="#" class="btn btn-primary pull-right">Add Employee</a> 
              <a href="resources/payroll_sample.pdf" target="_blank" class="btn btn-success pull-right" style="margin-right: 10px;">Print Payroll Report</a>
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
                  <tr>
                  <td>
                  <a href="resources/payslip-template.png" target="_blank" class="btn btn-primary"><i class="fa fa-print"></i> Payslip</a>
                      <a href="#" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</a>
                  </td>
                    <td>CENITA, ALICE</td>
                    <td>396.00</td>
                    <td>6</td>
                    <td>2,376.00</td>
                    <td>488.00</td>
                    <td></td>
                    <td>2,376.00</td>
                  </tr>
                  <tr>
                  <td>
                  <a href="resources/payslip-template.png" target="_blank" class="btn btn-primary"><i class="fa fa-print"></i> Payslip</a>
                      <a href="#" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</a>
                  </td>
                    <td>CENINALES, JOVANNE</td>
                    <td>396.00</td>
                    <td>7</td>
                    <td>2,772.00</td>
                    <td>488.00</td>
                    <td></td>
                    <td>2,772.00</td>
                  </tr>
                  <tr>
                  <td>
                  <a href="resources/payslip-template.png" target="_blank" class="btn btn-primary"><i class="fa fa-print"></i> Payslip</a>
                      <a href="#" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</a>
                  </td>
                    <td>ENGALLADO, BOBEHT</td>
                    <td>396.00</td>
                    <td>7</td>
                    <td>2,772.00</td>
                    <td>488.00</td>
                    <td>1,000.00</td>
                    <td>1,772.00</td>
                  </tr>
                  <tr>
                  <td>
                  <a href="resources/payslip-template.png" target="_blank" class="btn btn-primary"><i class="fa fa-print"></i> Payslip</a>
                      <a href="#" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</a>
                  </td>
                    <td>ESTARES, LEOVEN ROY</td>
                    <td>396.00</td>
                    <td>7</td>
                    <td>2,722.00</td>
                    <td>488.00</td>
                    <td>500.00</td>
                    <td>2,272.00</td>
                  </tr>
                  <tr>
                  <td>
                  <a href="resources/payslip-template.png" target="_blank" class="btn btn-primary"><i class="fa fa-print"></i> Payslip</a>
                      <a href="#" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</a>
                  </td>
                    <td>LAO, ANGELIQUE</td>
                    <td>396.00</td>
                    <td>7</td>
                    <td>2,722.00</td>
                    <td>488.00</td>
                    <td></td>
                    <td>2,272.00</td>
                  </tr>
                  <tr>
                  <td>
                  <a href="resources/payslip-template.png" target="_blank" class="btn btn-primary"><i class="fa fa-print"></i> Payslip</a>
                      <a href="#" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</a>
                  </td>
                    <td>LAO, LLOYD SYMON</td>
                    <td>396.00</td>
                    <td>7</td>
                    <td>2,722.00</td>
                    <td>488.00</td>
                    <td></td>
                    <td>2,272.00</td>
                  </tr>
                  <tr>
                  <td>
                  <a href="resources/payslip-template.png" target="_blank" class="btn btn-primary"><i class="fa fa-print"></i> Payslip</a>
                      <a href="#" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</a>
                  </td>
                    <td>TO-ONG, JAY-R</td>
                    <td>396.00</td>
                    <td>7</td>
                    <td>2,722.00</td>
                    <td>488.00</td>
                    <td>2,000.00</td>
                    <td>772.00</td>
                  </tr>
                </tbody>
                <tfoot>
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
</script>