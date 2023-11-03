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
              <h3 class="box-title">Casket Sold Report</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">


            <form class="generic_form_pdf"  url="reports_page">
            <div class="row">
              <div class="col-md-3">
              <div class="form-group">
                <label>From Date:</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input name="from_date" id="from" type="date" class="form-control">
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
                  <input id="to" name="to_date" type="date" class="form-control">
                </div>
                <!-- /.input group -->
              </div>
              </div>
              <div class="col-md-3">
              <div class="form-group">
                <label>Filter:</label>
                <button type="button" onclick="filter();" class="btn btn-primary btn-block">Filter</button>
              </div>
              </div>
                <div class="col-md-3">
                        <input type="hidden" name="action" value="pdf_casket">
                        <div class="form-group">
                          <label>Print</label>
                          <button class="btn btn-success btn-block">Print</button>
                        </div>
                      </form>
                </div>
            </div>


            <div style="float:right;">
                       Total Quantity:
                        <h3 style="margin-top:2px !important;" name="currentTotal" id="currentTotal">0</h3>
                    </div>

              <table class="table table-bordered table-striped casket-datatable">
                <thead>
                <tr>
                  <th>Date</th>
                  <th>Casket Type</th>
                  <th>Quantity</th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                  <th>Date</th>
                  <th>Casket Type</th>
                  <th>Quantity</th>
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
  var datatable = 
            $('.casket-datatable').DataTable({
                "pageLength": 100,
                language: {
                    searchPlaceholder: "Enter Filter"
                },
                searching: false,
                "bLengthChange": true,
                "ordering": false,
                'processing': true,
                'serverSide': true,
                'serverMethod': 'post',
                'ajax': {
                    'url':'reports_page',
                     'type': "POST",
                     "data": function (data){
                        data.action = "casket-datatable";
                     }
                },
                'columns': [
                    { data: 'contract_date', "orderable": false },
                    { data: 'casket_type', "orderable": false },
                    { data: 'quantity', "orderable": false,className: "text-right"},
                ],
                "footerCallback": function (row, data, start, end, display) {
                    var api = this.api(), data;
                    var intVal = function (i) {
                        return typeof i === 'string' ?
                            i.replace(/[\$,]/g, '') * 1 :
                            typeof i === 'number' ?
                                i : 0;
                    };
                    // // Total over all pages

                    console.log(received = api
                        .column(2)
                        .data());


                    received = api
                        .column(2)
                        .data()
                        .reduce(function (a, b) {
                            return intVal(a) + intVal(b);
                        }, 0);
                        console.log(received);

                    $('#currentTotal').html('' + received.toLocaleString('en-US', { minimumFractionDigits: 0, maximumFractionDigits: 0 }));
                }
            });

            function filter() {
              var from = $('#from').val();
              var to = $('#to').val();
              console.log(from);
              console.log(to);
              datatable.ajax.url('reports_page?action=sales-datatable&from='+from+'&to='+to).load();
          }
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