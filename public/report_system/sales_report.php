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
              <h3 class="box-title">Sales Revenue Report</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">


            <div class="row">
              <div class="col-md-3">
              <div class="form-group">
                <label>From Date:</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="date" class="form-control">
                </div>
                <!-- /.input group -->
              </div>
              </div>
              <div class="col-md-3">
              <div class="form-group">
                <label>To Date:</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="date" class="form-control">
                </div>
                <!-- /.input group -->
              </div>
              </div>
              <div class="col-md-3">
              <div class="form-group">
                <label>Filter:</label>
                <button class="btn btn-primary btn-block">Filter</button>
              </div>
              </div>
              <div class="col-md-3">
              <div class="form-group">
                <label>Print:</label>
                <a href="resources/sales_revenue.pdf" target="_blank" class="btn btn-success btn-block"><i class="fa fa-print"></i> Print</a>
              </div>
              </div>
            </div>


              <table class="table table-bordered table-striped sample-datatable">
                <thead>
                <tr>
                  <th>Date</th>
                  <th>Payment Type</th>
                  <th>Amount</th>
                </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>January 1, 2023</td>
                    <td>Cash</td>
                    <td>2,500.00</td>
                  </tr>
                  <tr>
                    <td>January 1, 2023</td>
                    <td>CSWDO</td>
                    <td>2,500.00</td>
                  </tr>
                  <tr>
                    <td>January 1, 2023</td>
                    <td>PSWDO</td>
                    <td>2,500.00</td>
                  </tr>
                  <tr>
                    <td>January 1, 2023</td>
                    <td>TAGUM COOP</td>
                    <td>2,500.00</td>
                  </tr>
                  <tr>
                    <td>January 1, 2023</td>
                    <td>PSWDO</td>
                    <td>2,222.00</td>
                  </tr>
                  <tr>
                    <td>January 1, 2023</td>
                    <td>DSWD</td>
                    <td>4,500.00</td>
                  </tr>
                  <tr>
                    <td>January 1, 2023</td>
                    <td>Cash</td>
                    <td>2,500.00</td>
                  </tr>
                  <tr>
                    <td>January 1, 2023</td>
                    <td>Cash</td>
                    <td>3,500.00</td>
                  </tr>
                  <tr>
                    <td>January 1, 2023</td>
                    <td>Cash</td>
                    <td>2,500.00</td>
                  </tr>
                  <tr>
                    <td>January 1, 2023</td>
                    <td>Cash</td>
                    <td>2,500.00</td>
                  </tr>
                  <tr>
                    <td>January 1, 2023</td>
                    <td>Cash</td>
                    <td>2,500.00</td>
                  </tr>
                  <tr>
                    <td>January 1, 2023</td>
                    <td>Cash</td>
                    <td>2,500.00</td>
                  </tr>
               
                  
                </tbody>
                <tfoot>
                <tr>
                  <th>Date</th>
                  <th>Payment Type</th>
                  <th>Amount</th>
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