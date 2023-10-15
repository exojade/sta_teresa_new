<link rel="stylesheet" href="AdminLTE/dist/css/AdminLTE.min.css">
<link rel="stylesheet" href="AdminLTE/bower_components/bootstrap/dist/css/bootstrap.min.css">
<?php 

// dump($_GET);
$options = unserialize($_GET["options"]);
// dump($options);


$month = "";
$day = "";
$total = 0;
$payroll = query("select * from payroll where payroll_id = ?", $options["payroll_id"]);
$payroll = $payroll[0];
$payroll_employees = query("select pe.*, e.employee_name from payroll_employee pe left join
									employees e on e.employee_id = pe.employee_id
									where pe.payroll_id = ?", $options["payroll_id"]);


?>
<div class="text-center"><img src="resources/stateresa_header.jpg" class="img-responsive"></div>
<hr>
<h4 style="font-weight: 900;">PAYROLL REPORT</h4>
<h4 style="font-weight: 900;">PERIOD: <?php echo(readable_date($payroll["from_date"]) . " - " . readable_date($payroll["to_date"])); ?></h4>
            <div class="box-body">
            <table class="table table-bordered table-striped">
            <thead>
                  <tr>
                    <th>Employee</th>
                    <th>Base Rate</th>
                    <th>Days</th>
                    <th>Gross Pay</th>
                    <th>Benefits</th>
                    <th>Deductions</th>
                    <th>Net Pay</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($payroll_employees as $row): ?>
                    <tr>
                      <td><?php echo($row["employee_name"]); ?></td>
                      <td><?php echo(to_peso($row["base_salary"])); ?></td>
                      <td><?php echo($row["number_days"]); ?></td>
                      <td><?php echo(to_peso($row["base_salary"] * $row["number_days"])); ?></td>
                      <td><?php echo(to_peso($row["benefits"])); ?></td>
                      <td><?php echo(to_peso($row["cash_advance"])); ?></td>
                      <td><?php echo(to_peso(($row["base_salary"] * $row["number_days"]) - to_amount($row["cash_advance"]))); ?></td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
            </table>
            </div>
    

