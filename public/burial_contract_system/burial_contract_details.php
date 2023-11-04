<link rel="stylesheet" href="AdminLTE/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
<link rel="stylesheet" href="AdminLTE/bower_components/sweetalert/sweetalert2.min.css">
<link rel="stylesheet" href="AdminLTE/dist/css/printable.css">


<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <div class="container">
    <section class="content">

    <div class="modal fade" id="modal_add_transaction">
		<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header bg-primary">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span></button>
				<h3 class="modal-title text-center">Add Payment</h3>
			</div>
			<div class="modal-body">
			<form class="general_form" url="burial_contract" autocomplete="off">
				<input type="hidden" name="action" value="add_transaction">
				<input type="hidden" name="contract_id" value="<?php echo($_GET["id"]) ?>">
				<div class="form-group">
				  <label>MODE OF PAYMENT</label>
					<select required class="form-control" name="payment_type" style="width: 100%;">
            <option value="" selected disabled>Please Select Mode of Payment</option>
            <option value="CASH">CASH</option>
            <option value="GUARANTEE">GUARANTEE</option>
          </select>
				</div>

        <div class="form-group">
            <label>Amount</label>
            <input required name="amount" required type="number" step="0.01" class="form-control" placeholder="0.00">
        </div>
  
        <div class="form-group">
				  <label>AGENCY (if mode of payment is GUARANTEE)</label>
					<select class="form-control" name="agency" style="width: 100%;">
            <option value="" selected>Please Select Mode of Payment</option>
            <?php foreach($guarantors as $g): ?>
            <option value="<?php echo($g["tbl_id"]); ?>"><?php echo($g["guarantor"]); ?></option>
            <?php endforeach; ?>
          </select>
				</div>
			<div class="box-footer">
			<button type="submit" class="btn btn-primary">Submit</button>
			</form>
			</div>
			</div>
		</div>
		</div>
	</div>

    <div class="box box-solid">
            <div class="box-header bg-pink">
              <h3 class="box-title">Burial Service Contract Details</h3>
            </div>
            <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
            <!-- <li class=""><a href="#contract" data-toggle="tab" aria-expanded="false">Contract</a></li> -->
              <li class="active"><a href="#details" data-toggle="tab" aria-expanded="true">Burial Contract</a></li>
              <li class=""><a href="#obituary" data-toggle="tab" aria-expanded="true">Obituary Page</a></li>
              <li class=""><a href="#embalmer" data-toggle="tab" aria-expanded="false">Embalmer's Certification</a></li>
              <li class=""><a href="#promissory" data-toggle="tab" aria-expanded="false">Promissory Note</a></li>
              <li class=""><a href="#overdue" data-toggle="tab" aria-expanded="false">Overdue Invoice</a></li>
              <li class=""><a href="#demand" data-toggle="tab" aria-expanded="false">Demand Letter</a></li>
              <li class=""><a href="#sss" data-toggle="tab" aria-expanded="false">Certification</a></li>
              <li class=""><a href="#transaction" data-toggle="tab" aria-expanded="false">Payments</a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="details">
              <form class="generic_form_pdf" url="burial_contract">
              <input type="hidden" value="burial_contract_pdf" name="action">
              <input type="hidden" value="<?php echo($_GET["id"]) ?>" name="contract_id">
              <button type="submit" class="btn btn-info pull-right">Print Contract</button>
              </form>
              <form class="general_form" id="form_details" url="burial_contract">
                <input type="hidden" value="update_contract" name="action">
              <input type="hidden" value="<?php echo($_GET["id"]) ?>" name="contract_id">
              <button id="update_contract_btn" class="btn btn-primary btn-flat" type="button">Update</button>
              <button id="save_contract_btn" style="display: none;" class="btn btn-success btn-flat" type="submit">Save</button>
              <button id="cancel_contract_btn" style="display: none;" class="btn btn-danger btn-flat" type="button">Cancel</button>
              
            
            
              <br>
            <br>
              <span class="rheader bg-pink">CUSTOMER'S INFORMATION (PROCESSOR)</span>
                <div class="form-group pull-right" style="margin-left: 10px;">
                  <select readonly required class="form-control" name="plan">
                  <option selected value="<?php echo($contract["plan"]); ?>"><?php echo($contract["plan"]); ?></option>
                    <?php $plan = query("select * from plans"); ?>
                    <?php foreach($plan as $row): ?>
                      <option value="<?php echo($row["plan"]); ?>"><?php echo($row["plan"]); ?></option>
                    <?php endforeach; ?>
                    <option value="NONE">NONE</option>
                    
                  </select>
                </div>

                <div class="form-group pull-right" >
                  <select readonly required class="form-control" name="branch">
                  <option selected value="<?php echo($contract["branch"]); ?>"><?php echo($contract["branch"]); ?></option>
                    <?php $branch = query("select * from branch"); ?>
                    <?php foreach($branch as $row): ?>
                      <option value="<?php echo($row["branch"]); ?>"><?php echo($row["branch"]); ?></option>
                    <?php endforeach; ?>
                    
                  </select>
                </div>
            <br>
            
            <div class="row">
              <div class="col-md-4">
              <div class="form-group">
                  <label for="exampleInputEmail1">Client's First Name</label>
                  <input type="text" value="<?php echo($contract["client_firstname"]); ?>" name="client_firstname" required class="form-control" id="exampleInputEmail1" placeholder="---">
                </div>
              </div>
              <div class="col-md-3">
              <div class="form-group">
                  <label for="exampleInputEmail1">Client's Middle Name (optional)</label>
                  <input type="text" value="<?php echo($contract["client_middlename"]); ?>" name="client_middlename"  class="form-control" id="exampleInputEmail1" placeholder="---">
                </div>
              </div>
              <div class="col-md-3">
              <div class="form-group">
                  <label for="exampleInputEmail1">Client's Last Name</label>
                  <input type="text" value="<?php echo($contract["client_lastname"]); ?>" name="client_lastname" required class="form-control" id="exampleInputEmail1" placeholder="---">
                </div>
              </div>
              <div class="col-md-2">
              <div class="form-group">
                  <label for="exampleInputEmail1">Client's Suffix</label>
                  <input type="text" value="<?php echo($contract["client_suffix"]); ?>" name="client_suffix" class="form-control" id="exampleInputEmail1" placeholder="---">
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-4">
              <div class="form-group">
                  <label for="exampleInputEmail1">City</label>
                  <input type="text" value="<?php echo($contract["address_city"]); ?>" name="address_city" required class="form-control" id="exampleInputEmail1" placeholder="---">
                </div>
              </div>
              <div class="col-md-3">
              <div class="form-group">
                  <label for="exampleInputEmail1">Barangay</label>
                  <input type="text" value="<?php echo($contract["address_barangay"]); ?>" name="address_barangay"  class="form-control" id="exampleInputEmail1" placeholder="---">
                </div>
              </div>
              <div class="col-md-3">
              <div class="form-group">
                  <label for="exampleInputEmail1">Purok / Street</label>
                  <input type="text" value="<?php echo($contract["address_home"]); ?>" required class="form-control" name="address_home" id="exampleInputEmail1" placeholder="---">
                </div>
              </div>
              <div class="col-md-2">
              <div class="form-group">
                  <label for="exampleInputEmail1">Zipcode</label>
                  <input type="text" value="<?php echo($contract["zipcode"]); ?>" name="zipcode" class="form-control" id="exampleInputEmail1" placeholder="---">
                </div>
              </div>


              <div class="col-md-4">
              <div class="form-group">
                  <label for="exampleInputEmail1">Relationship</label>
                  <input type="text" value="<?php echo($contract["client_relationship"]); ?>" name="client_relationship" class="form-control" id="exampleInputEmail1" placeholder="---">
                </div>
              </div>

              <div class="col-md-4">
              <div class="form-group">
                  <label for="exampleInputEmail1">Contact Number</label>
                  <input type="text" value="<?php echo($contract["contact_number"]); ?>" name="contact_number" class="form-control" id="exampleInputEmail1" placeholder="09xxxxxxxxx">
                </div>
              </div>
            </div>
            <span class="rheader bg-pink">DECEASED'S PROFILE</span>
            <br>
            <div class="row">
              <div class="col-md-4">
              <div class="form-group">
                  <label for="exampleInputEmail1">Deceased's First Name</label>
                  <input type="text" value="<?php echo($contract["deceased_firstname"]); ?>" name="deceased_firstname" required class="form-control" id="exampleInputEmail1" placeholder="---">
                </div>
              </div>
              <div class="col-md-3">
              <div class="form-group">
                  <label for="exampleInputEmail1">Deceased's Middle Name (optional)</label>
                  <input type="text" value="<?php echo($contract["deceased_middlename"]); ?>" name="deceased_middlename"  class="form-control" id="exampleInputEmail1" placeholder="---">
                </div>
              </div>
              <div class="col-md-3">
              <div class="form-group">
                  <label for="exampleInputEmail1">Deceased's Last Name</label>
                  <input type="text" value="<?php echo($contract["deceased_lastname"]); ?>" name="deceased_lastname" required class="form-control" id="exampleInputEmail1" placeholder="---">
                </div>
              </div>
              <div class="col-md-2">
              <div class="form-group">
                  <label for="exampleInputEmail1">Deceased's Suffix</label>
                  <input type="text" value="<?php echo($contract["deceased_suffix"]); ?>" name="deceased_suffix" class="form-control" id="exampleInputEmail1" placeholder="---">
                </div>
              </div>


              <div class="col-md-4">
              <div class="form-group">
                  <label for="exampleInputEmail1">City</label>
                  <input type="text" name="deceased_city" value="<?php echo($contract["deceased_city"]); ?>" required class="form-control" id="exampleInputEmail1" placeholder="---">
                </div>
              </div>
              <div class="col-md-3">
              <div class="form-group">
                  <label for="exampleInputEmail1">Barangay</label>
                  <input type="text" name="deceased_barangay" value="<?php echo($contract["deceased_barangay"]); ?>" class="form-control" id="exampleInputEmail1" placeholder="---">
                </div>
              </div>
              <div class="col-md-3">
              <div class="form-group">
                  <label for="exampleInputEmail1">Purok / Street</label>
                  <input type="text" name="deceased_address"  value="<?php echo($contract["deceased_address"]); ?>" class="form-control" id="exampleInputEmail1" placeholder="---">
                </div>
              </div>
              <div class="col-md-2">
              <div class="form-group">
                  <label for="exampleInputEmail1">Zipcode</label>
                  <input type="text" name="deceased_zipcode" value="<?php echo($contract["deceased_zipcode"]); ?>" class="form-control" id="exampleInputEmail1" placeholder="---">
                </div>
              </div>

              <div class="col-md-12">
                <div class="form-group">
                  <label for="exampleInputEmail1">Place of Death</label>
                  <input type="text" name="death_address" value="<?php echo($contract["death_address"]); ?>"  class="form-control" id="exampleInputEmail1" placeholder="---">
                </div>
              </div>

              <div class="col-md-4">
              <div class="form-group">
                  <label for="exampleInputEmail1">Date of Death</label>
                  <input type="date" value="<?php echo($contract["death_date"]); ?>" name="death_date" required class="form-control" id="exampleInputEmail1" placeholder="---">
                </div>
              </div>

              <div class="col-md-6">
              <div class="form-group">
                  <label for="exampleInputEmail1">Burial Date</label>
                  <input type="date" value="<?php echo($contract["burial_date"]); ?>" name="burial_date" required class="form-control" id="exampleInputEmail1" placeholder="---">
                </div>
              </div>

              <div class="col-md-2">
              <label for="exampleInputEmail1">Gender</label>
              <select required class="form-control" name="deceased_gender">
                <option value="<?php echo($contract["deceased_gender"]); ?>" selected ><?php echo($contract["deceased_gender"]); ?></option>
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
                  <input type="number" value="<?php echo($contract["embalming_days"]); ?>" name="embalming_days" class="form-control" id="exampleInputEmail1" placeholder="---">
                </div>
              </div>

              <div class="col-md-6">
              <div class="form-group">
                  <label for="exampleInputEmail1">Embalming Cost</label>
                  <input type="number" value="<?php echo($contract["embalming_cost"]); ?>" name="embalming_cost" class="form-control the_costing" id="exampleInputEmail1" placeholder="P 0.00">
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
                      <?php if($c["casket"] == $contract["casket_type"]): ?>
                          <option selected value="<?php echo($c["casket"]); ?>"><?php echo($c["casket"]); ?></option>
                        <?php else: ?> 
                          <option value="<?php echo($c["casket"]); ?>"><?php echo($c["casket"]); ?></option>
                        <?php endif; ?> 
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>
              <div class="col-md-6">
              <div class="form-group">
                  <label for="exampleInputEmail1">Casket Cost</label>
                  <input type="number" value="<?php echo($contract["casket_cost"]); ?>" name="casket_cost" class="form-control the_costing" id="exampleInputEmail1" placeholder="P 0.00">
                </div>
              </div>


              <div class="col-md-6">
              <div class="form-group">
                  <label for="exampleInputEmail1">Arrangement</label>
                  <input type="text" value="<?php echo($contract["arrangement_type"]); ?>" name="arrangement_type"  class="form-control" id="exampleInputEmail1" placeholder="---">
                </div>
              </div>

              <div class="col-md-6">
              <div class="form-group">
                  <label for="exampleInputEmail1">Cost</label>
                  <input type="number" value="<?php echo($contract["arrangement_cost"]); ?>" name="arrangement_cost"  class="form-control the_costing" id="exampleInputEmail1" placeholder="P 0.00">
                </div>
              </div>


              <div class="col-md-6">
              <div class="form-group">
                  <label for="exampleInputEmail1">Kind of Coach</label>
                  <input type="text" name="coach_type" value="<?php echo($contract["coach_type"]); ?>"  class="form-control" id="exampleInputEmail1" placeholder="---">
                </div>
              </div>

              <div class="col-md-6">
              <div class="form-group">
                  <label for="exampleInputEmail1">Cost</label>
                  <input type="number" name="coach_cost" value="<?php echo($contract["coach_cost"]); ?>" class="form-control the_costing" id="exampleInputEmail1" placeholder="P 0.00">
                </div>
              </div>


              <div class="col-md-6">
              <div class="form-group">
                  <label for="exampleInputEmail1">Extras</label>
                  <input type="text" value="<?php echo($contract["extra"]); ?>" name="extra"  class="form-control" id="exampleInputEmail1" placeholder="---">
                </div>
              </div>

              <div class="col-md-6">
              <div class="form-group">
                  <label for="exampleInputEmail1">Cost</label>
                  <input type="number" value="<?php echo($contract["extra_cost"]); ?>" name="extra_cost"  class="form-control the_costing" id="exampleInputEmail1" placeholder="P 0.00">
                </div>
              </div>

            

              <div class="col-md-12">
              <div class="form-group">
                  <label for="exampleInputEmail1">Total</label>
                  <input type="number" readonly value="<?php echo($contract["total_amount"]); ?>" name="total_amount"  class="form-control total" id="exampleInputEmail1" placeholder="P 0.00">
                </div>
              </div>
              
            </div>
          </form>
          
              </div>


              <div class="tab-pane " id="overdue">
              <form class="general_form" data-url="burial_contract">
              <input type="hidden" value="generate_overdue" name="action">
              <input type="hidden" value="<?php echo($_GET["id"]) ?>" name="contract_id">

              <?php if($contract["remarks"] == "PAID"): ?>
                <button type="submit" disabled class="btn btn-info pull-right">Generate Overdue Invoice</button>

            <?php else: ?>
              <button type="submit" class="btn btn-info pull-right">Generate Overdue Invoice</button>

            <?php endif; ?>


                  </form>
              <table class="table table-bordered">
                <thead>
                    <th>Action</th>
                    <th>Invoice</th>
                    <th>Date Created</th>
                    <th>Deadline</th>
                    <th>Balance</th>
                </thead>
                <tbody>
                    <?php 
                    $overdue = query("select * from overdue where contract_id = ?", $_GET["id"]);
                    foreach($overdue as $o):
                    ?>
                    <tr>
                      <td>
                      <form class="generic_form_pdf" data-url="burial_contract">
                        <input type="hidden" name="action" value="print_overdue">
                        <input type="hidden" name="invoice_id" value="<?php echo($o["invoice_number"]) ?>">
                        <button type="submit" class="btn btn-primary">Print</button>
                      </form>
                      </td>
                      <td><?php echo($o["invoice_number"]); ?></td>
                      <td><?php echo($o["date_created"]); ?></td>
                      <td><?php echo($o["deadline"]); ?></td>
                      <td><?php echo($o["balance"]); ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>


              </table>


              <br>
              <br>
              <br>
          
            </div>


              <div class="tab-pane" id="obituary">
           
              <form class="general_form" id="obituary_form" url="burial_contract">
              <input type="hidden" value="update_obituary" name="action">
              <input type="hidden" value="<?php echo($_GET["id"]) ?>" name="contract_id">
              <button id="update_obi_btn" class="btn btn-primary btn-flat" type="button">Update</button>
              <button id="save_obi_btn" style="display: none;" class="btn btn-success btn-flat" type="submit">Save</button>
              <button id="cancel_obi_btn" style="display: none;" class="btn btn-danger btn-flat" type="button">Cancel</button>
              <div class="row">
                    <div class="col-md-5">
                      <?php if($contract["obituary_image"] == ""): ?>
                      <img class="img-responsive pad" src="resources/obituary/default_obituary.jpg" alt="Photo">
                      <p class="text-center">This is default image</p>
                      <?php else: ?>
                        <img class="img-responsive pad" src="<?php echo($contract["obituary_image"]); ?>" alt="Photo">
                      <?php endif; ?>
                    </div>
                    <div class="col-md-7">
                      <div class="form-group">
                        <label>Obituary Post Message</label>
                        <textarea name="obituary_message" readonly class="form-control" rows="5" placeholder="Enter ..." spellcheck="false"><?php echo($contract["obituary_message"]); ?></textarea>
                      </div>
                      <label for="exampleInputEmail1">Valid Date</label>
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                        <input name="valid_date" readonly value="<?php echo($contract["valid_date"]); ?>" type="date" class="form-control" placeholder="---">
                      </div>
                      <br>
                      <br>
                      <div class="form-group">
                        <label for="exampleInputFile">Change Obituary Image</label>
                        <input readonly name="obituary_image" accept="image/*" type="file" id="exampleInputFile">
                      </div>


                    </div>
              </div>

              
                          

            
            
              <br>
            <br>
          
            <br>

        
          </form>
          
              </div>


              <div class="tab-pane " id="embalmer">
              <form class="generic_form_pdf" url="burial_contract">
              <input type="hidden" value="embalmer_pdf" name="action">
              <input type="hidden" value="<?php echo($_GET["id"]) ?>" name="contract_id">
            
            <div class="row">
              <div class="col-md-12">
              <div class="form-group">
                  <label for="exampleInputEmail1">Client Name</label>
                  <input type="text" value="<?php echo($contract["client_firstname"] . " " . $contract["client_lastname"]); ?>" name="issued_client_name" required class="form-control" id="exampleInputEmail1" placeholder="---">
                </div>
              </div>
              <div class="col-md-12">
              <div class="form-group">
                  <label for="exampleInputEmail1">Relationship</label>
                  <input type="text" value="<?php echo($contract["client_relationship"]); ?>" name="relationship"  class="form-control" id="exampleInputEmail1" placeholder="---">
                </div>
              </div>
              
            </div>
            <button type="submit" class="btn btn-info pull-right">Print Embalmer's Certificate</button>
            </form>
        <br>
        <br>
        <br>
          
              </div>



              <div class="tab-pane " id="demand">
              <form class="generic_form_pdf" url="burial_contract">
              <input type="hidden" value="demand_pdf" name="action">
              <input type="hidden" value="<?php echo($_GET["id"]) ?>" name="contract_id">


              <?php if($contract["remarks"] == "PAID"): ?>
                <button type="submit" disabled class="btn btn-info pull-right">Print Demand Letter</button>

            <?php else: ?>
              <button type="submit" class="btn btn-info pull-right">Print Demand Letter</button>

            <?php endif; ?>

              
                  </form>
              <br>
              <br>
              <br>
          
            </div>





              <div class="tab-pane " id="promissory">
              <form class="generic_form_pdf" url="burial_contract">
              <input type="hidden" value="promissory_note_pdf" name="action">
              <input type="hidden" value="<?php echo($_GET["id"]) ?>" name="contract_id">
          
            
            <div class="row">
              <div class="col-md-12">
              <div class="form-group">
                  <label for="exampleInputEmail1">Client Name</label>
                  <input type="text" value="<?php echo($contract["client_firstname"] . " " . $contract["client_lastname"]); ?>" name="issued_client_name" required class="form-control" id="exampleInputEmail1" placeholder="---">
                </div>
              </div>
              <div class="col-md-12">
              <div class="form-group">
                  <label for="exampleInputEmail1">Address</label>
                  <input type="text" value="<?php echo($contract["address_home"] . " " . $contract["address_barangay"] . " " . $contract["address_city"]); ?>" name="address"  class="form-control" id="exampleInputEmail1" placeholder="---">
                </div>
              </div>
              <div class="col-md-12">
              <div class="form-group">
                  <label for="exampleInputEmail1">Date Valid of Promissory Note</label>
                  <input type="date"  name="date_valid" required class="form-control" id="exampleInputEmail1" placeholder="---">
                </div>
              </div>
            </div>
            <?php if($contract["remarks"] == "PAID"): ?>
              <button type="submit" disabled class="btn btn-info pull-right">Print Promissory Note</button>
            <?php else: ?>
              <button type="submit"  class="btn btn-info pull-right">Print Promissory Note</button>
            <?php endif; ?>
            <br>
            <br>
            <br>
          </form>
          
              </div>



              <div class="tab-pane " id="sss">
              <form class="generic_form_pdf" url="burial_contract">
              <input type="hidden" value="sss_pdf" name="action">
              <input type="hidden" value="<?php echo($_GET["id"]) ?>" name="contract_id">
     
            <div class="row">
              <div class="col-md-12">
              <div class="form-group">
                  <label for="exampleInputEmail1">Client Name</label>
                  <input type="text" value="<?php echo($contract["client_firstname"] . " " . $contract["client_lastname"]); ?>" name="issued_client_name" required class="form-control" id="exampleInputEmail1" placeholder="---">
                </div>
              </div>
              <div class="col-md-12">
              <div class="form-group">
                  <label for="exampleInputEmail1">Relationship</label>
                  <input type="text" value="<?php echo($contract["client_relationship"]); ?>" name="relationship"  class="form-control" id="exampleInputEmail1" placeholder="---">
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Type of Certification</label>
                  <select required class="form-control" name="type" style="width: 100%;">
                    <option value="" selected disabled>Please Select Type of Certification</option>
                    <option value="SSS">SSS</option>
                    <option value="PAGIBIG">PAGIBIG</option>
                    <option value="GSIS">GSIS</option>
                  </select>
                </div>
              </div>
            </div>

            <button type="submit" class="btn btn-info pull-right">Print Certification</button>
            <br>
            <br>
            <br>
          </form>
          
              </div>







              <div class="tab-pane" id="transaction">

              <?php if($contract["remarks"] == "PAID"): ?>
                <a href="#" disabled id="addPaymentButton" data-toggle="modal" data-target="#modal_add_transaction" class="btn btn-primary">Add Payment</a>
                <script>
                  document.getElementById("addPaymentButton").addEventListener("click", function (event) {
                      event.preventDefault(); // Prevent the default behavior (click) when the button is clicked
                  });
</script>
            <?php else: ?>
              <a href="#" data-toggle="modal" data-target="#modal_add_transaction" class="btn btn-primary">Add Payment</a>

            <?php endif; ?>

                
                <h3 class="pull-right">BALANCE: P<?php echo(to_peso($balance)); ?></h3>
  <br>
  <br>
              <table class="table table-bordered table-striped sample-datatable">
                <thead>
                <tr>
                  <th>Transaction Date</th>
                  <th>TYPE</th>
                  <th>MODE OF PAYMENT</th>
                  <th>AMOUNT</th>
                  <th>AGENCY</th>
                  <th>STATUS</th>
                  <th>ACTION</th>
                </tr>
                </thead>
                <tbody>
                  <?php foreach($transaction as $t): ?>
                    <tr>
                      <td><?php echo($t["transaction_date"]); ?></td>
                      <td><?php echo($t["transaction_type"]); ?></td>
                      <td><?php echo($t["payment_type"]); ?></td>
                      <td><?php echo($t["amount"]); ?></td>
                      <td><?php echo($t["guarantor"]); ?></td>
                      <td><?php echo($t["account_status"]); ?></td>
                      <td>
                        <a href="burial_contract?action=details&id=<?php echo($contract["contract_id"]); ?>" class="btn btn-warning"><i class="fa fa-pencil"></i></a>
                        <a href="burial_contract?action=details&id=<?php echo($contract["contract_id"]); ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>Transaction Date</th>
                  <th>TYPE</th>
                  <th>MODE OF PAYMENT</th>
                  <th>AMOUNT</th>
                  <th>AGENCY</th>
                  <th>STATUS</th>
                  <th>ACTION</th>
                </tr>
                </tfoot>
              </table>
              </div>
<!-- 
              <div class="tab-pane active" id="contract">
                <button type="button" id="__printbtn" class="btn btn-primary"  onclick="printDiv();">Print Document</button>
                    <div class="contained" style="padding:0px 180px 0px 180px;">
                <div id="printarea">
                  <div class="row">
                    <div class="col-xs-12">
                      <h3 class="text-center">STA. TERESA FUNERAL HOMES</h3>
                      <p class="text-center">Km. 31 Gredu, Panabo City</p>
                      <p class="text-center"><b>RODERICO A. ENAD - Prop.</b></p>
                      <p class="text-center">0907 575 4693</p>
                      <p class="text-center"><i>"Family Satisfaction is our Prime Objective"</i></p>
                    </div>
                    <div class="col-xs-6">
                      <h4>HIGH QUALITY CASKETS</h4>
                      <h4>EXCELLENT SERVICE</h4>
                      <h4>REASONABLE COST</h4>
                    </div>
                    <div class="col-xs-6">
                      <h4 class="text-right"><b>Contract: </b><?php echo($contract["contract_id"]); ?></h4>
                      <h4 class="text-right"><b>Mortuary Plan: </b></h4>
                      <h4 class="text-right"><b>Remarks: </b><?php echo($contract["remarks"]); ?></h4>
                    </div>
                  </div>
                    <h4 class="text-center"><b>BURIAL SERVICE CONTRACT</b></h4>
                    <br>
                    <br>
                    <h4 class="text-justify">I, <span class="text-center" style="width:600px; display:inline-block;border-bottom: 1px solid black;">
                      <?php echo($contract["client_firstname"] . " " . 
                      $contract["client_middlename"] . " " . $contract["client_lastname"]); ?></span> of legal age resident of 
                    <span class="text-center" style="width:500px; display:inline-block;border-bottom: 1px solid black;">
                      <?php echo($contract["address_home"] . " " . 
                      $contract["address_barangay"] . " " . $contract["address_city"]); ?> </span>  
                      undertakes to pay <b>Sta Teresa Funeral Homes</b> at <span class="text-center" style="width:300px; display:inline-block;border-bottom: 1px solid black;">
                      <?php echo($contract["branch"]); ?> </span>  
                      for funeral services rendered to the late 
                      <span class="text-center" style="width:200px; display:inline-block;border-bottom: 1px solid black;">
                      <?php echo($contract["deceased_firstname"] . " " . 
                      $contract["deceased_middlename"] . " " . $contract["deceased_lastname"]); ?> </span>
                      covering the following:
                    </h4>

                    <br>
                    <br>
                <div class="row form-horizontal">
                    <div class="col-md-6 col-xs-6">
                      <table class="table">
                        <tr>
                          <th style="text-align: right;">Embalming:</th>  
                          <th style="text-align: center;" class="data"><?php echo($contract["embalming_days"]); ?> Days</th>  
                        </tr>
                        <tr>
                          <th style="text-align: right;">Casket:</th>  
                          <th style="text-align: center;" class="data"><?php echo($contract["casket_type"]); ?></th>  
                        </tr>
                        <tr>
                          <th style="text-align: right;">Arrangement:</th>  
                          <th style="text-align: center;" class="data"><?php echo($contract["arrangement_type"]); ?></th>  
                        </tr>
                        <tr>
                          <th style="text-align: right;">Kind of Coach:</th>  
                          <th style="text-align: center;" class="data"><?php echo($contract["coach_type"]); ?></th>  
                        </tr>
                        <tr>
                          <th style="text-align: right;">Extra:</th>  
                          <th style="text-align: center;" class="data"><?php echo($contract["extra"]); ?></th>  
                        </tr>

                      </table>
                    </div>
                </div>


                </div>
                    

                  </div>
              
              
              </div> -->


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
<script src="AdminLTE/bower_components/sweetalert/sweetalert2.min.js"></script>
	<script src="AdminLTE/bower_components/fastclick/lib/fastclick.js"></script>
  <script src="AdminLTE/bower_components/Chart.js/Chart.js"></script>
	<script src="AdminLTE/dist/js/adminlte.min.js"></script>
	<script src="AdminLTE/dist/js/demo.js"></script>
  <?php require("public/burial_contract_system/burial_contract_js.php") ?>

  <?php
	require("layouts/footer_end.php");
  ?>
