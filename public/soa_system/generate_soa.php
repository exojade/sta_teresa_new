<link rel="stylesheet" href="AdminLTE/dist/css/AdminLTE.min.css">
<link rel="stylesheet" href="AdminLTE/bower_components/bootstrap/dist/css/bootstrap.min.css">
<style>
  .table, th, td, thead, tbody{
    border: 2px solid black !important;
  }

  .table thead{
    background-color:#FFCCD5;border-color:#000;
  }
</style>
<?php 

$guarantor = query("select * from soa s
                    left join guarantors g
                    on g.tbl_id = s.soa_id
                    where soa_id = ?", $_GET["soa_id"]);
			$agency = $guarantor[0]["guarantor"];
			$contracts = query("select * from transaction t
								left join burial_service_contract c
								on t.contract_id = c.contract_id
								where soa_id = ?", $_GET["soa_id"]);

?>
<div class="text-center"><img src="AdminLTE/dist/img/header_soa.png"></div>
            <h3 class="text-center">STATEMENT OF ACCOUNT</h3>
            <h4 class="text-center"><?php echo($agency); ?></h4>
            <div class="box-body">
            <table class="table table-bordered">
              <thead>
                <th>Date</th>
                <th>Deceased</th>
                <th>Address</th>
                <th>Particulars</th>
                <th>Amount</th>
              </thead>
              <tbody>
                  <?php $total = 0; foreach($contracts as $contract): $total = $total + $contract["amount"]?>
                    <tr>
                      <td><?php echo($contract["contract_date"]); ?></td>
                      <td><?php echo($contract["deceased_lastname"] . ", " . $contract["deceased_firstname"]); ?></td>
                      <td><?php echo($contract["address_home"]. ", " . $contract["address_barangay"] . " " . $contract["address_city"]); ?></td>
                      <td>BURIAL ASSISTANCE</td>
                      <td><?php echo(to_peso($contract["amount"])); ?></td>
                    </tr>
                  <?php endforeach; ?>
                  <tr>
                    <td colspan="4" class="text-right"><b>TOTAL</b></td>
                    <td><?php echo(to_peso($total)); ?></td>
                  </tr>
                </tbody>
            </table>
            </div>



			
	

      <div style="position:absolute; bottom:0; margin-bottom:10px; width: 100%">
            <div class="row">
                <div class="col-xs-3">
                  <h4><b>Prepared By:</b></h4>
                  <br>
                  <br>
                  <br>
                  <h4 class="text-center"><b>ANGELIQUE E. LAO</b></h4>
                  <h4 class="text-center">MANAGER</h4>
                </div>
            </div>
            </div>

