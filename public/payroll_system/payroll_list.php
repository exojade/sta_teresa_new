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
              <h3 class="box-title">Payroll List
              

              </h3>
              <a href="#" class="btn btn-primary pull-right">Create Payroll</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered table-striped sample-datatable">
                <thead>
                <tr>
                  <th >Action</th>
                  <th>Payroll ID</th>
                  <th>Payroll Title</th>
                  <th># of Employees</th>
                  <th>Benefits</th>
                  <th>Gross Pay</th>
                  <th>Deductions</th>
                  <th>Net Pay</th>
                </tr>
                </thead>

                <tbody>
                  <tr>
                    <td>
                      <a href="resources/payroll_sample.pdf" target="_blank" class="btn btn-primary"><i class="fa fa-print"></i></a>
                      <a href="payroll?action=details" class="btn btn-warning"><i class="fa fa-pencil"></i></a>
                  </td>
                    <td>PY20230001</td>
                    <td>June 1 - 15, 2023</td>
                    <td>15</td>
                    <td>2,500.00</td>
                    <td>60,000.00</td>
                    <td>2,500.00</td>
                    <td>65,000.00</td>
                  </tr>
                  <tr>
                  <td>
                  <a href="resources/payroll_sample.pdf" target="_blank" class="btn btn-primary"><i class="fa fa-print"></i></a>
                      <a href="payroll?action=details" class="btn btn-warning"><i class="fa fa-pencil"></i></a>
                  </td>
                    <td>PY20230002</td>
                    <td>June 15 - 30, 2023</td>
                    <td>15</td>
                    <td>2,500.00</td>
                    <td>60,000.00</td>
                    <td>2,500.00</td>
                    <td>65,000.00</td>
                  </tr>
                  <tr>
                  <td>
                  <a href="resources/payroll_sample.pdf" target="_blank" class="btn btn-primary"><i class="fa fa-print"></i></a>
                      <a href="payroll?action=details" class="btn btn-warning"><i class="fa fa-pencil"></i></a>
                  </td>
                    <td>PY202300043</td>
                    <td>July 1 - 15, 2023</td>
                    <td>15</td>
                    <td>2,500.00</td>
                    <td>60,000.00</td>
                    <td>2,500.00</td>
                    <td>65,000.00</td>
                  </tr>
                  <tr>
                  <td>
                  <a href="resources/payroll_sample.pdf" target="_blank" class="btn btn-primary"><i class="fa fa-print"></i></a>
                      <a href="payroll?action=details" class="btn btn-warning"><i class="fa fa-pencil"></i></a>
                  </td>
                    <td>PY202300034</td>
                    <td>July 16 - 31, 2023</td>
                    <td>15</td>
                    <td>2,500.00</td>
                    <td>60,000.00</td>
                    <td>2,500.00</td>
                    <td>65,000.00</td>
                  </tr>
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