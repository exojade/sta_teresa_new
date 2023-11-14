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


      <div class="modal fade" id="modal_add_chapel">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Add Announcement</h4>
              </div>
              <form class="general_form" data-url="announcements">
              <div class="modal-body">
              <input type="hidden" name="action" value="add">
                <div class="form-group">
                  <label for="exampleInputEmail1">Title</label>
                  <input required type="text" name="title" class="form-control" id="exampleInputEmail1" placeholder="Enter Title">
                </div>
                <div class="form-group">
                  <label>Announcement Text</label>
                  <textarea class="form-control" name="announcement" rows="3" placeholder="Enter ..."></textarea>
                </div>
                <div class="form-group">
                  <label>Status</label>
                  <select name="status" class="form-control">
                    <option value="ACTIVE">ACTIVE</option>
                    <option value="NOT ACTIVE">NOT ACTIVE</option>
                  </select>
                </div>

                <div class="form-group">
                  <label for="exampleInputFile">Background Image</label>
                  <input required name="bg-image" type="file" id="exampleInputFile">
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
<?php foreach($announcements as $a): ?>
  <div class="modal fade" id="modal_<?php echo($a["announcement_id"]); ?>">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><?php echo($a["title"]); ?></h4>
              </div>
              <form class="general_form" data-url="announcements">
              <div class="modal-body">
                <input type="hidden" name="action" value="update">
                <input type="hidden" name="announcement_id" value="<?php echo($a["announcement_id"]); ?>">
                <div class="form-group" >
                  <select required class="form-control" name="status">
                  <option selected value="<?php echo($a["status"]); ?>"><?php echo($a["status"]); ?></option>
                  <option value="ACTIVE">ACTIVE</option>
                  <option value="INACTIVE">INACTIVE</option>
                  </select>
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



        <div class="modal fade" id="modal_image_<?php echo($a["announcement_id"]); ?>">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><?php echo($a["title"]); ?></h4>
              </div>
              <form class="general_form" data-url="announcements">
                <input type="hidden" name="action" value="delete_image">
                <input type="hidden" name="announcement_id" value="<?php echo($a["announcement_id"]); ?>">
              <div class="modal-body">
              <img class="img-responsive"  src="<?php echo($a["background_image"]); ?>" style="max-height:300px;" alt="Photo">
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
              </div>
              </form>
            </div>
          </div>
        </div>
<?php endforeach; ?>





  <div class="content-wrapper">
    <div class="container">
    <section class="content">
    <a href="#" data-toggle="modal" data-target="#modal_add_chapel" class="btn btn-primary pull-right">Add Announcement</a>
    <br>
    <br>
    <div class="row">
      <div class="col-md-12">
      
      <div class="box">
            <div class="box-header">
              <h3 class="box-title">Announcements
              
              </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered table-striped sample-datatable">
                <thead>
                <tr>
                  <th>Action</th>
                  <th>ID</th>
                  <th>Title</th>
                  <th width="45%">Announcement</th>
                  <th>Status</th>
                  <th>Image</th>
                </tr>
                </thead>
                <tbody>
                  <?php foreach($announcements as $a): ?>
                    <tr>
                      <td>
                        <a href="#" data-toggle="modal" data-target="#modal_<?php echo($a["announcement_id"]); ?>" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                        
                        <form class="general_form" data-url="announcements" style="display:inline;">
                        <input type="hidden" name="action" value="delete">
                        <input type="hidden" name="announcement_id" value="<?php echo($a["announcement_id"]); ?>">
                    
                        <button class="btn btn-danger" type="submit"><i class="fa fa-close"></i></button>
                        </form>
                      </td>
                      <td><?php echo($a["announcement_id"]); ?></td>
                      <td><?php echo($a["title"]); ?></td>
                      <td><?php echo($a["announcement"]); ?></td>
                      <td><?php echo($a["status"]); ?></td>
                      <td>
                          <a data-toggle="modal" data-target="#modal_image_<?php echo($a["announcement_id"]); ?>"  href="#" ><img style="border: 2px solid black;" src="<?php echo($a["background_image"]); ?>" width="50" height="50"></a>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
                <tfoot>
                <tr>
                <th>Action</th>
                  <th>ID</th>
                  <th>Title</th>
                  <th width="45%">Announcement</th>
                  <th>Status</th>
                  <th>Image</th>
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



  $("body").on("click", "#remove_image", function() {
    $(this).parents("#image_div").remove();
  });


  $("#add_more_image").on("click", function(e) {
    e.preventDefault();
	var newform ='<div id="image_div"> \
        <div class="row"> \
					<div class="col-md-10"> \
          <div class="form-group">\
                  <input name="chapel_image[]" accept="image/*" required type="file" id="exampleInputFile">\
          </div>\
          </div> \
					<div class="col-md-2"><div class="form-group"><button type="button" id="remove_image" class="btn btn-info btn-flat btn-block"><i class="fa fa-remove"></i></button></div></div> \
				 </div>\
				 </div>\
         ';
    // var newform = '<div id="child_residence"><div class="col-md-3"><div class="form-group"><input type="text" name="dependentname[]" class="form-control" class="form-control" placeholder="Full Name" required /><div class="help-block with-errors"></div></div></div><div class="col-md-2"><div class="form-group"><input type="date" name="dependentdob[]" class="form-control" class="form-control" placeholder="Birthdate Birthdate (MM/DD/YYYY)" required /><div class="help-block with-errors"></div></div></div><div class="col-md-2"><div class="form-group"><select name="dependentcivilstatus[]" class="form-control" required><option value="" disabled selected>Status</option><option value="SINGLE">SINGLE</option><option value="MARRIED">MARRIED</option><option value="DIVORCED">DIVORCED</option><option value="SEPARATED">SEPARATED</option><option value="WIDOW">WIDOW</option></select><div class="help-block with-errors"></div></div></div><div class="col-md-2"><div class="form-group"><input type="text" name="dependentrelationship[]" class="form-control" class="form-control" placeholder="Relationship" required /><div class="help-block with-errors"></div></div></div><div class="col-md-2"><div class="form-group"><input type="text" name="dependentoccupation[]" class="form-control" class="form-control" placeholder="Occupation" required /><div class="help-block with-errors"></div></div></div><div class="col-md-1"><div class="form-group"><button type="button" id="removechild" class="btn btn-info btn-flat btn-block"><i class="fa fa-remove"></i></button></div></div></div>';
    $('#add_image_div').append(newform);
  });






</script>