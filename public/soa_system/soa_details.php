<link rel="stylesheet" href="AdminLTE/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
<link rel="stylesheet" href="AdminLTE/bower_components/sweetalert/sweetalert2.min.css">
<style>
.products-list {
	padding-right: 10px;
    height: 200px;
    overflow: auto;
}
</style>

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <div class="container">
    <section class="content">

    <div class="row">
      <div class="col-md-3">
      <div class="box box-primary">
            <div class="box-body box-profile">

              <h3 class="profile-username text-center"><?php echo($soa[0]["agency"]); ?></h3>

              <p class="text-muted text-center"><?php echo($soa[0]["soa_id"]); ?></p>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Total Amount</b> <a class="pull-right"><?php echo(to_peso($soa[0]["total_amount"])); ?></a>
                </li>
                <li class="list-group-item">
                  <b>Balance</b> <a class="pull-right"><?php echo(to_peso($soa[0]["balance"])); ?></a>
                </li>
                <li class="list-group-item">
                  <b>Date Created</b> <a class="pull-right"><?php echo(($soa[0]["date_created"])); ?></a>
                </li>
              </ul>
              <a href="#" class="btn btn-primary btn-block"><b>Print SOA</b></a>
            </div>
            <!-- /.box-body -->
          </div>

      </div>
      <div class="col-md-9">
      <div class="box">
            <div class="box-header">
              <h3 class="box-title">Statement of Account - <?php echo($soa[0]["agency"]); ?>
            </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered table-striped">
                <thead>
                <tr>
                <th>Action</th>
                  <th>Date</th>
                  <th>Deceased</th>
                  <th>Address</th>
                  <th>Particulars</th>
                  <th>Amount</th>
                  <th>Remarks</th>
                </tr>
                </thead>
                <tbody>
                  <?php
                  foreach($transaction as $t): ?>
                  <tr>
                    <?php if($t["account_status"] == "UNSETTLED"): ?>
                      <td>
                        <form class="general_form" style="display:inline;" url="soa">
                          <input type="hidden" name="action" value="update_transaction">
                          <input type="hidden" name="action_code" value="settle">
                          <input type="hidden" name="transaction_id" value="<?php echo($t["transaction_id"]); ?>">
                          <input type="hidden" name="soa_id" value="<?php echo($_GET["id"]); ?>">
                          <button class="btn btn-success btn-flat btn-block">SETTLE</button>
                        </form>
                      </td>
                    <?php else: ?>
                      <td>
                        <form class="general_form" style="display:inline;" url="soa">
                          <input type="hidden" name="action" value="update_transaction">
                          <input type="hidden" name="action_code" value="unsettle">
                          <input type="hidden" name="transaction_id" value="<?php echo($t["transaction_id"]); ?>">
                          <input type="hidden" name="soa_id" value="<?php echo($_GET["id"]); ?>">
                          <button class="btn btn-warning btn-flat btn-block">UNSETTLE</button>
                        </form>
                      </td>
                    <?php endif; ?>
                    <td><?php echo($t["contract_date"]); ?></td>
                    <td><?php echo($t["deceased_lastname"] . ", " . $t["deceased_firstname"]); ?></td>
                    <td><?php echo($t["address_home"]. ", " . $t["address_barangay"] . " " . $t["address_city"]); ?></td>
                    <td>BURIAL ASSISTANCE</td>
                    <td><?php echo($t["amount"]); ?></td>
                    <td><?php echo($t["account_status"]); ?></td>
                  </tr>
                  <?php endforeach; ?>
                </tbody>
                <tfoot>
                <tr>
                <th>Action</th>
                  <th>Date</th>
                  <th>Deceased</th>
                  <th>Address</th>
                  <th>Particulars</th>
                  <th>Amount</th>
                  <th>Remarks</th>
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
  <script src="AdminLTE/bower_components/Chart.js/Chart.js"></script>
  <script src="AdminLTE/bower_components/sweetalert/sweetalert2.min.js"></script>
	<script src="AdminLTE/dist/js/adminlte.min.js"></script>
	<script src="AdminLTE/dist/js/demo.js"></script>
  <?php require("public/burial_contract_system/burial_contract_js.php") ?>


  

  <?php
	// render footer 2
	require("layouts/footer_end.php");
  ?>

<script>
  $(function () {
    $('#example2').DataTable()
   
  })
</script>