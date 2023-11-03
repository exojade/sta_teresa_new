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

// dump($_GET);
$options = unserialize($_GET["options"]);
// dump($options);

// dump($Guarantors);
$where = "";
if(!empty($options["from_date"])):
      $where = $where . " and contract_date >= '" . $options["from_date"] . "'";
endif;

if(!empty($options["to_date"])):
      $where = $where . " and contract_date <= '" . $options["to_date"] . "'";
endif;
$month = "";
$day = "";
$total = 0;

$casket = query("SELECT contract_date, casket_type, COUNT(*) AS quantity FROM burial_service_contract where 1=1 ".$where." GROUP BY contract_date, casket_type order by contract_date desc");
?>
<div class="text-center"><img src="resources/stateresa_header.jpg" class="img-responsive"></div>
<hr>

<div class="row">
  <div class="col-xs-4 co-sm-4">
      <h4 style="font-weight: 900;" style="float:left;">CASKET SOLD REPORT</h4>
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
              <thead>
                <th>Month</th>
                <th>Day</th>
                <th>Casket</th>
                <th>Quantity</th>
              </thead>
              <tbody>
                
                <?php foreach($casket as $row): 
                
                  
                  $total = $total + $row["quantity"];
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
                   ?>

                  <td><?php echo($row["casket_type"]); ?></td>
                  <td><?php echo($row["quantity"]); ?></td>
           
                    </tr>
                <?php endforeach; ?>
              </tbody>
            
            </table>
                    <br>
                    
            <h4><b>Total Casket Sold:</b> <?php echo($total); ?></h4>
            </div>

            <div style="position: absolute; bottom: 0; left: 0; right: 0; text-align: center; border-top:2px solid black;padding-top:20px;">
              <div class="row">
                  <div class="col-xs-12">
                      <p><i>"Family Satisfaction is our Prime Objective"</i></p>
                  </div>
              </div>
            </div>
    

