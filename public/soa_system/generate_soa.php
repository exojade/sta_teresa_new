<link rel="stylesheet" href="AdminLTE/dist/css/AdminLTE.min.css">
<link rel="stylesheet" href="AdminLTE/bower_components/bootstrap/dist/css/bootstrap.min.css">
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
            <table class="table">
              <thead>
                <th>Date</th>
                <th>Deceased</th>
                <th>Address</th>
                <th>Particulars</th>
                <th>Amount</th>
              </thead>
              <tbody>
                  <?php foreach($contracts as $contract): ?>
                    <tr>
                      <td><?php echo($contract["contract_date"]); ?></td>
                      <td><?php echo($contract["deceased_lastname"] . ", " . $contract["deceased_firstname"]); ?></td>
                      <td><?php echo($contract["address_home"]. ", " . $contract["address_barangay"] . " " . $contract["address_city"]); ?></td>
                      <td>BURIAL ASSISTANCE</td>
                      <td><?php echo(to_peso($contract["amount"])); ?></td>
                      <td></td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
            </table>
            </div>
    

