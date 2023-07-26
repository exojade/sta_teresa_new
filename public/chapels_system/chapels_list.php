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


<?php foreach($caskets as $casket): ?>
  <div class="modal fade" id="modal_<?php echo($casket["casket_id"]); ?>">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><?php echo($casket["casket"]); ?></h4>
              </div>
              <form class="general_form" data-url="caskets">
              <div class="modal-body">
                <input type="hidden" name="action" value="update">
                <input type="hidden" name="casket_id" value="<?php echo($casket["casket_id"]); ?>">
                <div class="form-group">
                  <label for="exampleInputEmail1">Casket Name</label>
                  <input required type="text" value="<?php echo($casket["casket"]); ?>" name="casket" class="form-control" id="exampleInputEmail1" placeholder="---">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Price / Amount</label>
                  <input required type="number" value="<?php echo($casket["amount"]); ?>" name="amount" class="form-control" id="exampleInputEmail1" placeholder="---">
                </div>
                <img class="img-responsive" src="<?php echo($casket["casket_image"]); ?>" alt="Photo">
                <div class="form-group">
                  <label for="exampleInputFile">Change Image / Upload New</label>
                  <input name="casket_image" accept="image/*" type="file" id="exampleInputFile">
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
              </div>
              </form>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>


<?php endforeach; ?>





  <div class="content-wrapper">
    <div class="container">
    <section class="content">
    <div class="row">
      <div class="col-md-8">
      <div class="box">
            <div class="box-header">
              <h3 class="box-title">Caskets</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered table-striped sample-datatable">
                <thead>
                <tr>
                  <th>Action</th>
                  <th>ID</th>
                  <th>Casket</th>
                  <th>Amount</th>
                  <th>Image</th>
                </tr>
                </thead>
                <tbody>
                  <?php foreach($caskets as $casket): ?>
                    <tr>
                      <td><a href="#" data-toggle="modal" data-target="#modal_<?php echo($casket["casket_id"]); ?>" class="btn btn-warning btn-block">Update</a></td>
                      <td><?php echo($casket["casket_id"]); ?></td>
                      <td><?php echo($casket["casket"]); ?></td>
                      <td><?php echo($casket["amount"]); ?></td>
                      <td>
                      <?php if($casket["casket_image"] != ""): ?>
                      <a href="<?php echo($casket["casket_image"]); ?>" target="_blank"
                      class="btn btn-primary">View Image
                      <?php endif; ?>
                      </td>

                    </tr>
                  <?php endforeach; ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>Action</th>
                  <th>ID</th>
                  <th>Casket</th>
                  <th>Amount</th>
                  <th>Image</th>
                </tr>
                </tfoot>
              </table>
            </div>
          </div>

      </div>
      <div class="col-md-4">


      <div class="box">
            <div class="box-header">
              <h3 class="box-title">Add New Casket</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form class="general_form" data-url="caskets" enctype="multipart/form-data">
                <input type="hidden" name="action" value="add">
                <div class="form-group">
                  <label for="exampleInputEmail1">Casket Name</label>
                  <input required type="text" name="casket" class="form-control" id="exampleInputEmail1" placeholder="Enter Casket Name">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Price / Amount</label>
                  <input required type="number" name="amount" class="form-control" id="exampleInputEmail1" placeholder="Enter Casket Name">
                </div>
                <div class="form-group">
                  <label for="exampleInputFile">Upload Image</label>
                  <input name="casket_image" accept="image/*" required type="file" id="exampleInputFile">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
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