<link rel="stylesheet" href="AdminLTE/dist/css/AdminLTE.min.css">
<link rel="stylesheet" href="AdminLTE/bower_components/bootstrap/dist/css/bootstrap.min.css">
<style>

.table thead th{
  text-align: center !important;
}

</style>

<?php 

// dump($_GET);
$options = unserialize($_GET["options"]);
// dump($options);

// dump($Guarantors);
$where = "";
if(!empty($options["from_date"])):
      $where = $where . " and contract_date >= '" . $options["from_date"] . "'";
endif;

if(!empty($_REQUEST["to_date"])):
      $where = $where . " and contract_date <= '" . $options["to_date"] . "'";
endif;
$month = "";
$day = "";
$total = 0;


$Transaction = [];
$transaction = query("select contract_id, sum(amount) as amount from transaction group by contract_id");
foreach($transaction as $row):
  $Transaction[$row["contract_id"]] = $row;
endforeach;
// dump($Transaction);

$total_balance = 0;
$total_accounts = 0;


$query_string = "select * from burial_service_contract
									where 1=1 ".$where." and remarks = 'UNPAID'
									order by contract_date DESC";

$collectibles = query($query_string);

?>
<div class="text-center"><img src="resources/stateresa_header.jpg" class="img-responsive"></div>
<hr>
            <div class="box-body">
            <table class="table table-bordered table-striped">
              <thead class="text-right">
                <th colspan="2">Date</th>
                <th rowspan="2">Debtor</th>
                <th rowspan="2">Address</th>
                <th rowspan="2">Contact Number</th>
                <th rowspan="2">Deceased</th>
                <th rowspan="2">Balance</th>
                <th rowspan="2">BSC No.</th>
                <tr>
                  <th>Month</th>
                  <th>Day</th>
                </tr>
              </thead>
              <tbody>
                <?php $i=0; foreach($collectibles as $row): 
                $total_accounts++;
                  ?>
                  <tr>
                  <?php
                   if($month != full_month($row["contract_date"])):
                      $month = full_month($row["contract_date"]);
                      echo("<td>".$month."</td>");
                    else:
                      echo("<td></td>"); 
                    endif;
                    if($day != date_day($row["contract_date"])):
                      $day = date_day($row["contract_date"]);
                      echo("<td>".$day."</td>");
                    else:
                      echo("<td></td>"); 
                      endif;
                      $payment_total = 0;
                      if(isset($Transaction[$row["contract_id"]]))
						            $payment_total = $Transaction[$row["contract_id"]]["amount"];

                        $balance = $row["total_amount"] - $payment_total;
                        $total_balance = $total_balance + $balance;

                   ?>
                  <td><?php echo(strtoupper($row["client_lastname"] . ", " . $row["client_firstname"])); ?></td>
                  <td><?php echo(strtoupper($row["address_home"] . ", " . $row["address_barangay"] . ", " . $row["address_city"])); ?></td>
                  <td><?php echo(strtoupper($row["contact_number"])); ?></td>
                  <td><?php echo(strtoupper($row["deceased_lastname"] . ", " . $row["deceased_firstname"])); ?></td>
                  <td><?php echo(to_peso($row["total_amount"] - $payment_total)); ?></td>
                  <td><?php echo(strtoupper($row["contract_id"])); ?></td>
                    </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
                      <br>
                      <br>
            <p><b>Total Number of Accounts with Unsettled Billings:</b> <?php echo($total_accounts); ?></p>
            <p><b>Total Collectible Amount:</b> <?php echo(to_peso($total_balance)); ?></p>

            </div>
    

