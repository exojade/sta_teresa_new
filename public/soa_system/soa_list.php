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
    <?php 
      $transaction = query("select count(*) as count from transaction where agency = ? and (soa_id is null or soa_id = '')", $_GET["id"]);
      $count = $transaction[0]["count"];
    ?>
    <?php if($count != 0): ?>
      <div class="alert alert-warning alert-dismissible">
                <h4><i class="icon fa fa-warning"></i> Alert!</h4>
                There is/are <?php echo($count); ?> ungenerated SOA. Please click Generate SOA button.
                <br>
                <br>
                <form class="general_form" url="soa">
                  <input type="hidden" name="action" value="generate_soa">
                  <input type="hidden" name="id" value="<?php echo($_GET["id"]); ?>">
                  <button class="btn btn-primary btn-flat">Generate SOA</button>
                </form>
              </div>
    <?php endif; ?>



    
    <div class="box">
            <div class="box-header">
              <h3 class="box-title">Statement of Account - <?php echo($agency); ?>
            </h3>
            
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Action</th>
                  <th>Agency</th>
                  <th>Remarks</th>
                  <th>Date Created</th>
                  <th>Total Amount</th>
                  <th>Balance</th>
                </tr>
                </thead>
                <tbody>
                  <?php
                  // dump($soa);
                  foreach($soa as $t): ?>
                  <tr>
                    <td>
                    <form class="generic_form_pdf" style="display:inline;" url="soa">
                      <input type="hidden" name="action" value="soa_pdf">
                      <input type="hidden" name="soa_id" value="<?php echo($t["soa_id"]); ?>">
                      <button class="btn btn-primary btn-flat">Print SOA</button>
                    </form>
                      <a href="soa?action=details&id=<?php echo($t["soa_id"]); ?>" class="btn btn-success">Details</a>
                    </td>
                    <td><?php echo($t["agency"]); ?></td>
                    <td><?php echo($t["remarks"]); ?></td>
                    <td><?php echo($t["date_created"]); ?></td>
                    <td><?php echo($t["total_amount"]); ?></td>
                    <td><?php echo($t["balance"]); ?></td>
                  </tr>
                  <?php endforeach; ?>
                </tbody>
                <tfoot>
                <th>Action</th>
                  <th>Agency</th>
                  <th>Remarks</th>
                  <th>Date Created</th>
                  <th>Total Amount</th>
                  <th>Balance</th>
                </tfoot>
              </table>
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