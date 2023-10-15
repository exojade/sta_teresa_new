<link rel="stylesheet" href="AdminLTE/dist/css/AdminLTE.min.css">
<link rel="stylesheet" href="AdminLTE/bower_components/bootstrap/dist/css/bootstrap.min.css">
<?php 

// dump($_GET);
$options = unserialize($_GET["options"]);
// dump($options);
$Guarantors=[];
$guarantors = query("select * from guarantors");
foreach($guarantors as $row):
  $Guarantors[$row["tbl_id"]] = $row;
endforeach;
// dump($Guarantors);
$where = "";
if(!empty($options["from_date"])):
      $where = $where . " and transaction_date >= '" . $options["from_date"] . "'";
endif;

if(!empty($_REQUEST["to_date"])):
      $where = $where . " and transaction_date <= '" . $options["to_date"] . "'";
endif;

$transaction_guarantors = query("select agency from transaction where 1=1 " . $where . " and agency is not null and agency != '' group by agency");
$transaction = query("SELECT transaction_date, payment_type, agency, SUM(amount) as amount FROM TRANSACTION WHERE 1=1 ".$where."
GROUP BY transaction_date, payment_type, agency ORDER BY transaction_date DESC");


// dump($transaction);
$Transactions = [];
foreach($transaction as $row):
  $Transactions[$row["transaction_date"]]["transaction_date"] = $row["transaction_date"];
  if($row["payment_type"] == "CASH")
    $Transactions[$row["transaction_date"]][$row["payment_type"]] = $row;
  else
   $Transactions[$row["transaction_date"]][$row["agency"]] = $row;
   
endforeach;
  
  // dump($Transactions);


$count = count($transaction_guarantors);
// dump($count);
$Total = [];
foreach($transaction_guarantors as $row):
  $Total[$row["agency"]]["total"] = 0;
endforeach;
$Total["CASH"] = 0;
$month = "";
$day = "";

// dump($Total);
?>
<div class="text-center"><img src="resources/stateresa_header.jpg" class="img-responsive"></div>
<hr>
<div class="row">
  <div class="col-xs-4 co-sm-4">
      <h3 style="font-weight: 900;" style="float:left;">SALES REPORT</h3>
  </div>

  <?php


if(!empty($options["from_date"])):
 
  echo("<div class='col-xs-4 col-sm-4'><h3 style='font-weight:700;'>From: ".readable_date($options["from_date"])."</h3></div>");
endif;
if(!empty($options["to_date"])):
  echo("<div class='col-xs-4 col-sm-4'><h3 style='font-weight:700;'>To: ".readable_date($options["to_date"])."</h3></div>");
endif;


?>
</div>




            <div class="box-body">
            <table class="table table-bordered table-striped">
              <thead>
                <th colspan="2">Date</th>
                <th rowspan="2">Cash</th>
                <th colspan="<?php echo($count); ?>">Guarantee Letters</th>
                <tr>
                <th>Month</th>
                <th>Day</th>
                  <?php foreach($transaction_guarantors as $row): ?>
                      <th><?php echo($Guarantors[$row["agency"]]["guarantor"]); ?></th>
                  <?php endforeach; ?>
                </tr>
              </thead>
              <tbody>
                
                <?php foreach($Transactions as $row): ?>
                  <tr>

                  <?php
                   if($month != full_month($row["transaction_date"])):
                      $month = full_month($row["transaction_date"]);
                      echo("<td>".$month."</td>");
                    else:
                      echo("<td></td>"); 
                    endif;


                    if($day != date_day($row["transaction_date"])):
                      $day = date_day($row["transaction_date"]);
                      echo("<td>".$day."</td>");
                    else:
                      echo("<td></td>"); 
                    endif;
                   ?>


                  <td style="text-align: right;"><?php if(isset($row["CASH"])): $Total["CASH"] = $Total["CASH"] + $row["CASH"]["amount"]; echo(to_peso($row["CASH"]["amount"])); else: echo(""); endif; ?></td>
                  <?php foreach($transaction_guarantors as $g): ?>
                    <?php if(isset($row[$g["agency"]])):
                        $Total[$g["agency"]]["total"] = $Total[$g["agency"]]["total"] + $row[$g["agency"]]["amount"];
                      ?>
                      <td style="text-align: right;"><?php echo(to_peso($row[$g["agency"]]["amount"])); ?></td>
                    <?php else: ?>
                      <td></td>
                    <?php endif; ?>
                  <?php endforeach; ?>
                    </tr>
                <?php endforeach; ?>
              </tbody>
              <tfooter>
                <th colspan="2" class="text-right">TOTAL</th>
                <th style="text-align: right;"><?php echo(to_peso($Total["CASH"])); ?></th>
                <?php foreach($Total as $key => $value):
                if($key != "CASH"):
                  // if($row):
                  ?>
                  <th style="text-align: right;"><?php echo(to_peso($value["total"])); ?></th>
                <?php 
                endif;
                endforeach ?>
              </tfooter>
            </table>
            </div>
    

