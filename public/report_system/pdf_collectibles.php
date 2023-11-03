<link rel="stylesheet" href="AdminLTE/dist/css/AdminLTE.min.css">
<link rel="stylesheet" href="AdminLTE/bower_components/bootstrap/dist/css/bootstrap.min.css">
<style>

.table thead th{
  text-align: center !important;
}

</style>

<style>
  .table, th, td, thead, tbody{
    border: 2px solid black !important;
  }

  .table thead{
    background-color:#FFCCD5;border-color:#000;
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

<div class="row">
  <div class="col-xs-4 co-sm-4">
      <h4 style="font-weight: 900;" style="float:left;">COLLECTIBLES REPORT</h4>
  </div>

  <?php


if(!empty($options["from_date"])):
 
  echo("<div class='col-xs-4 col-sm-4'><h4 style='font-weight:700;'>From: ".readable_date($options["from_date"])."</h4></div>");
endif;
if(!empty($options["to_date"])):
  echo("<div class='col-xs-4 col-sm-4'><h4 style='font-weight:700;'>To: ".readable_date($options["to_date"])."</h4></div>");
endif;


?>
</div>
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
            <h4><b>Total Number of Accounts with Unsettled Billings:</b> <?php echo($total_accounts); ?></h4>
            <h4><b>Total Collectible Amount:</b> <?php echo(to_peso($total_balance)); ?></h4>

            </div>

            <div style="position: absolute; bottom: 0; left: 0; right: 0; text-align: center; border-top:2px solid black;padding-top:20px;">
              <div class="row">
                  <div class="col-xs-12">
                      <p><i>"Family Satisfaction is our Prime Objective"</i></p>
                  </div>
              </div>
            </div>
    

