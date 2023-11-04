<link rel="stylesheet" href="AdminLTE/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
<link rel="stylesheet" href="AdminLTE/bower_components/sweetalert/sweetalert2.min.css">
<style>
.products-list {
	padding-right: 10px;
    height: 200px;
    overflow: auto;
}

input[type=text] {
    text-transform: uppercase;
}

.rheader {
    padding: 10px 10px 10px 10px !important;
    display: inline-block;
    margin-bottom: 10px;
}

.bg-pink {
    color: #fff;
    background-color: #E55381;
    
}
</style>

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <div class="container">
    <section class="content">
    <div class="box box-solid">
            <div class="box-header bg-pink">
              <h3 class="box-title">New Burial Service Contract</h3>
            </div>
            <div class="box-body">
            <form class="general_form" url="burial_contract">
            <br>
            <span class="rheader bg-pink">CUSTOMER'S INFORMATION (PROCESSOR)</span>
            <div class="form-group pull-right" style="margin-left: 10px;">
            <select  required class="form-control" name="plan">
            <option selected value="NONE">NONE</option>
                    <?php $plan = query("select * from plans"); ?>
                    <?php foreach($plan as $row): ?>
                      <option value="<?php echo($row["plan"]); ?>"><?php echo($row["plan"]); ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
                <div class="form-group pull-right">
                <select required class="form-control" name="branch">
                <option value="" selected disabled>Please select Branch here</option>
                    <?php $branch = query("select * from branch"); ?>
                    <?php foreach($branch as $row): ?>
                      <option value="<?php echo($row["branch"]); ?>"><?php echo($row["branch"]); ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
            <br>
            
            <input type="hidden" name="action" value="new_contract">
            <div class="row">
              <div class="col-md-4">
              <div class="form-group">
                  <label for="exampleInputEmail1">Client's First Name</label>
                  <input type="text" name="client_firstname" required class="form-control" id="exampleInputEmail1" placeholder="---">
                </div>
              </div>
              <div class="col-md-3">
              <div class="form-group">
                  <label for="exampleInputEmail1">Client's Middle Name (optional)</label>
                  <input type="text" name="client_middlename"  class="form-control" id="exampleInputEmail1" placeholder="---">
                </div>
              </div>
              <div class="col-md-3">
              <div class="form-group">
                  <label for="exampleInputEmail1">Client's Last Name</label>
                  <input type="text" name="client_lastname" required class="form-control" id="exampleInputEmail1" placeholder="---">
                </div>
              </div>
              <div class="col-md-2">
              <div class="form-group">
                  <label for="exampleInputEmail1">Client's Suffix</label>
                  <input type="text" name="client_suffix" class="form-control" id="exampleInputEmail1" placeholder="---">
                </div>
              </div>

            
            </div>

            <div class="row">
              <div class="col-md-4">
              <div class="form-group">
                  <label for="exampleInputEmail1">City</label>
                  <input type="text" name="city" required class="form-control" id="exampleInputEmail1" placeholder="---">
                </div>
              </div>
              <div class="col-md-3">
              <div class="form-group">
                  <label for="exampleInputEmail1">Barangay</label>
                  <input type="text" name="barangay"  class="form-control" id="exampleInputEmail1" placeholder="---">
                </div>
              </div>
              <div class="col-md-3">
              <div class="form-group">
                  <label for="exampleInputEmail1">Purok / Street</label>
                  <input type="text" name="address" required class="form-control" id="exampleInputEmail1" placeholder="---">
                </div>
              </div>
              <div class="col-md-2">
              <div class="form-group">
                  <label for="exampleInputEmail1">Zipcode</label>
                  <input type="text" name="zipcode" class="form-control" id="exampleInputEmail1" placeholder="---">
                </div>
              </div>

              <div class="col-md-4">
              <div class="form-group">
                  <label for="exampleInputEmail1">Relationship</label>
                  <input type="text" name="client_relationship" required class="form-control" id="exampleInputEmail1" placeholder="---">
                </div>
              </div>

              <div class="col-md-4">
              <div class="form-group">
                  <label for="exampleInputEmail1">Contact Number</label>
                  <input type="number" name="contact_number" required class="form-control" id="exampleInputEmail1" placeholder="09xxxxxxxxx">
                </div>
              </div>


            </div>
            <span class="rheader bg-pink">DECEASED PROFILE</span>
            <br>
            <div class="row">
              <div class="col-md-4">
              <div class="form-group">
                  <label for="exampleInputEmail1">Deceased First Name</label>
                  <input type="text" name="deceased_firstname" required class="form-control" id="exampleInputEmail1" placeholder="---">
                </div>
              </div>
              <div class="col-md-3">
              <div class="form-group">
                  <label for="exampleInputEmail1">Deceased Middle Name (optional)</label>
                  <input type="text" name="deceased_middlename"  class="form-control" id="exampleInputEmail1" placeholder="---">
                </div>
              </div>
              <div class="col-md-3">
              <div class="form-group">
                  <label for="exampleInputEmail1">Deceased Last Name</label>
                  <input type="text" name="deceased_lastname" required class="form-control" id="exampleInputEmail1" placeholder="---">
                </div>
              </div>
              <div class="col-md-2">
              <div class="form-group">
                  <label for="exampleInputEmail1">Deceased Suffix</label>
                  <input type="text" name="deceased_suffix" class="form-control" id="exampleInputEmail1" placeholder="---">
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                    <label for="exampleInputEmail1">Same Residence with the Customer?</label>
                    <input name="same_residence" type="checkbox" id="sameResidence" onclick="toggleAddressFields()">
                </div>
              </div>


            
              <div class="col-md-4">
              <div class="form-group">
                  <label for="exampleInputEmail1">City</label>
                  <input type="text" id="deceasedCity" name="deceased_city" required class="form-control" id="exampleInputEmail1" placeholder="---">
                </div>
              </div>
              <div class="col-md-3">
              <div class="form-group">
                  <label for="exampleInputEmail1">Barangay</label>
                  <input type="text" id="deceasedBarangay" name="deceased_barangay"  class="form-control" id="exampleInputEmail1" placeholder="---">
                </div>
              </div>
              <div class="col-md-3">
              <div class="form-group">
                  <label for="exampleInputEmail1">Purok / Street</label>
                  <input type="text" id="deceasedAddress" name="deceased_address" required class="form-control" id="exampleInputEmail1" placeholder="---">
                </div>
              </div>
              <div class="col-md-2">
              <div class="form-group">
                  <label for="exampleInputEmail1">Zipcode</label>
                  <input id="deceasedZipcode" type="text" name="deceased_zipcode" class="form-control" id="exampleInputEmail1" placeholder="---">
                </div>
              </div>

              <div class="col-md-12">
                <div class="form-group">
                  <label for="exampleInputEmail1">Place of Death</label>
                  <input type="text" name="death_address" class="form-control" id="exampleInputEmail1" placeholder="---">
                </div>
              </div>

              <!-- <div class="col-md-4">
              <div class="form-group">
                  <label for="exampleInputEmail1">Relationship</label>
                  <input type="text" name="client_relationship" required class="form-control" id="exampleInputEmail1" placeholder="---">
                </div>
              </div> -->


    


              <div class="col-md-4">
              <div class="form-group">
                  <label for="exampleInputEmail1">Date of Death</label>
                  <input type="date" name="death_date" required class="form-control" id="exampleInputEmail1" placeholder="---">
                </div>
              </div>

              <div class="col-md-6">
              <div class="form-group">
                  <label for="exampleInputEmail1">Burial Date</label>
                  <input type="date" name="burial_date" required class="form-control" id="exampleInputEmail1" placeholder="---">
                </div>
              </div>
              <div class="col-md-2">
              <label for="exampleInputEmail1">Gender</label>
              <select required class="form-control" name="gender">
                <option value="" selected disabled>Please select Gender</option>
                <option value="MALE">MALE</option>
                <option value="FEMALE">FEMALE</option>
              </select>
              </div>


            </div>
            <span class="rheader bg-pink">FUNERAL DETAILS</span>
            <br>

            <div class="row">
              <div class="col-md-6">
              <div class="form-group">
                  <label for="exampleInputEmail1">Embalming Days</label>
                  <input type="number" name="embalming_days" class="form-control" id="exampleInputEmail1" placeholder="---">
                </div>
              </div>

              <div class="col-md-6">
              <div class="form-group">
                  <label for="exampleInputEmail1">Embalming Cost</label>
                  <input type="number" name="embalming_cost" class="form-control the_costing" id="exampleInputEmail1" placeholder="P 0.00">
                </div>
              </div>

              <div class="col-md-6">
              <div class="form-group">
                  <label for="exampleInputEmail1">Type of Casket</label>
                  <select required name="casket_type" class="form-control">
                    <option value="" selected disabled>Please select casket</option>
                    <?php 
                    $casket = query("select * from casket");
                    foreach($casket as $c): ?>
                      <option value="<?php echo($c["casket"]); ?>"><?php echo($c["casket"]); ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>

              <div class="col-md-6">
              <div class="form-group">
                  <label for="exampleInputEmail1">Casket Cost</label>
                  <input type="number" name="casket_cost" class="form-control the_costing" id="exampleInputEmail1" placeholder="P 0.00">
                </div>
              </div>


              <div class="col-md-6">
              <div class="form-group">
                  <label for="exampleInputEmail1">Arrangement</label>
                  <input type="text" name="arrangement"  class="form-control" id="exampleInputEmail1" placeholder="---">
                </div>
              </div>

              <div class="col-md-6">
              <div class="form-group">
                  <label for="exampleInputEmail1">Cost</label>
                  <input type="number" name="arrangment_cost"  class="form-control the_costing" id="exampleInputEmail1" placeholder="P 0.00">
                </div>
              </div>


              <div class="col-md-6">
              <div class="form-group">
                  <label for="exampleInputEmail1">Kind of Coach</label>
                  <input type="text" name="coach_type"  class="form-control" id="exampleInputEmail1" placeholder="---">
                </div>
              </div>

              <div class="col-md-6">
              <div class="form-group">
                  <label for="exampleInputEmail1">Cost</label>
                  <input type="number" name="coach_cost"  class="form-control the_costing" id="exampleInputEmail1" placeholder="P 0.00">
                </div>
              </div>


              <div class="col-md-6">
              <div class="form-group">
                  <label for="exampleInputEmail1">Extras</label>
                  <input type="text" name="extras"  class="form-control" id="exampleInputEmail1" placeholder="---">
                </div>
              </div>

              <div class="col-md-6">
              <div class="form-group">
                  <label for="exampleInputEmail1">Cost</label>
                  <input type="number" name="extras_cost"  class="form-control the_costing" id="exampleInputEmail1" placeholder="P 0.00">
                </div>
              </div>

          

              <div class="col-md-12">
              <div class="form-group">
                  <label for="exampleInputEmail1">Total</label>
                  <input type="number" readonly name="total"  class="form-control total" id="exampleInputEmail1" placeholder="P 0.00">
                </div>
              </div>
              
            </div>
            <button class="btn btn-primary pull-right btn-flat">Submit</button>
          </form>
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
<script src="AdminLTE/bower_components/sweetalert/sweetalert2.min.js"></script>
	<script src="AdminLTE/bower_components/fastclick/lib/fastclick.js"></script>
  <script src="AdminLTE/bower_components/Chart.js/Chart.js"></script>
	<script src="AdminLTE/dist/js/adminlte.min.js"></script>
	<script src="AdminLTE/dist/js/demo.js"></script>
  <?php require("public/burial_contract_system/burial_contract_js.php") ?>

  <?php
	require("layouts/footer_end.php");
  ?>
