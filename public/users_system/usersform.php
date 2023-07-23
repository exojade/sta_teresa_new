<link rel="stylesheet" href="AdminLTE/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
<link rel="stylesheet" href="AdminLTE/bower_components/slickgrid/slickgrid.css">
<link rel="stylesheet" href="AdminLTE/bower_components/sweetalert/sweetalert2.min.css">
<link rel="stylesheet" href="AdminLTE/bower_components/select2/dist/css/select2.min.css">

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Users
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="./"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Ayos</li>
      </ol>
    </section>
    <section class="content">
	
	<div class="modal fade" id="new_service" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header bg-primary">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">New User</h4>
				</div>
				<div class="modal-body">
					<form action="users" method="post" autocomplete="off">
						<input type="hidden" name="action" value="add_user"/>
						<div class="form-group">
							<label>Full Name</label>
							<input type="text" class="form-control text-uppercase" name="fullname" required="required" />
						</div>
						<div class="form-group">
							<label>Username</label>
							<input type="text" class="form-control text-uppercase" name="username" required="required" />
						</div>
            			<div class="form-group">
							<label>Password</label>
							<input type="password" class="form-control text-uppercase" name="password" required="required" />
						</div>
						<div class="form-group">
							<label>Role</label>
							<select id="roles" name="role" class="form-control" style="width: 100%;"></select>
						</div>
						<div class="form-group">
							<button type="submit" class="btn btn-flat btn-primary">Submit</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	
	<div class="row">
		<div class="col-xs-12">

		<div class="box">
            <div class="box-header">
			<div class="form-group">
							<a href="#new_service" data-toggle="modal" class="btn btn-warning btn-flat pull-left">Add New</a>
						</div>

              <div class="box-tools">
			  <div class="row">
					
					<div class="col-md-12">
					<div class="input-group input-group-sm" style="width: 150px;">
                  <input type="text" id="table-search" class="form-control pull-right" placeholder="Search">

                  <div class="input-group-btn">
                    <button onclick="searchtable()" type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                  </div>
                </div>
					</div>
			  </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="transaction-table" class="table table-hover table-bordered table-striped table-responsive">
                <tbody>
				<tr class="fetched-data">
                  <th>Details</th>
                  <th>Username</th>
                  <th>Fullname</th>
                  <th>Role</th>
                </tr>
              </tbody></table>
			  <br>
			  <div class="text-center">
					<button onclick="loadMore()" class="btn btn-primary btn-flat">Load More</button>
			  </div>
            </div>
            <!-- /.box-body -->
          </div>
		</div>
	  </div>
	  
    </section>
    <!-- /.content -->
  </div>
  
  <?php 
    require("layouts/footer.php");
  ?>
	<script src="AdminLTE/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
	<script src="AdminLTE/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
	<script src="AdminLTE/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
	<script src="AdminLTE/bower_components/fastclick/lib/fastclick.js"></script>
	<script src="AdminLTE/dist/js/adminlte.min.js"></script>
	<script src="AdminLTE/dist/js/demo.js"></script>
	<script src="AdminLTE/bower_components/sweetalert/sweetalert2.min.js"></script>
	<script src="AdminLTE/bower_components/slickgrid/slickgrid.js"></script>
	<script src="AdminLTE/bower_components/select2/dist/js/select2.full.min.js"></script>
	<script src="public/users_system/users.js"></script>

  <?php
	// render footer 2
	require("layouts/footer_end.php");
  ?>

