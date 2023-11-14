<link rel="stylesheet" href="AdminLTE/dist/css/AdminLTE.min.css">
<link rel="stylesheet" href="AdminLTE/bower_components/bootstrap/dist/css/bootstrap.min.css">
<?php 
// dump($_GET);
$payroll = query("select * from payroll where payroll_id = ?", $_GET["payroll_id"]);
$employee = query("select * from employees where employee_id = ?", $_GET["employee_id"]);
$pemployee = query("select * from payroll_employee where employee_id = ? and payroll_id = ?", $_GET["employee_id"], $_GET["payroll_id"]);


$payroll[0]["from_date"] = date("F d, Y", strtotime($payroll[0]["from_date"]));
$payroll[0]["to_date"] = date("F d, Y", strtotime($payroll[0]["to_date"]));

?>
<div class="text-center"><img src="AdminLTE/dist/img/header_soa.png"></div>
            <h3 class="text-center">Employee's Payslip</h3>
            <br>
            <br>
            <br>
            <div class="row">
              <div class="col-xs-4">
                <img class="img-responsive" style="border: 8px solid black;" src="<?php echo($employee[0]["profile"]); ?>">
              </div>
              <div class="col-xs-8">
                <h4><b>Employee's Name</b>: <?php echo($employee[0]["employee_name"]); ?></h4>
                <h4><b>Position</b>: <?php echo($employee[0]["position"]); ?></h4>
                <h4><b>Branch</b>: <?php echo($employee[0]["branch"]); ?></h4>
                <h4><b>Base Salary</b>: <?php echo(to_peso($employee[0]["base_salary"])); ?></h4>
                <br>
                <br>
                <h4><b>Payroll Period</b>: <?php echo($payroll[0]["from_date"]); ?> - <?php echo($payroll[0]["to_date"]); ?></h4>
              </div>
            </div>
            <div class="box-body">
            <table class="table table-bordered">
              <thead>
                <th>Base Rate</th>
                <th>Days Rendered</th>
                <th>Gross Pay</th>
                <th>Benefits</th>
                <th>Deductions</th>
                <th>Net Pay</th>
              </thead>
              <tbody>
                    <tr>
                      <td><?php echo($pemployee[0]["base_salary"]); ?></td>
                      <td><?php echo($pemployee[0]["number_days"]); ?></td>
                      <td><?php echo(to_peso($pemployee[0]["base_salary"] * $pemployee[0]["number_days"])); ?></td>
                      <td><?php echo($pemployee[0]["benefits"]); ?></td>
                      <td><?php echo($pemployee[0]["cash_advance"]); ?></td>
                      <td><?php echo(to_peso(($pemployee[0]["base_salary"] * $pemployee[0]["number_days"]) - to_amount($pemployee[0]["cash_advance"]))); ?></td>
                    </tr>
                </tbody>
            </table>
            </div>
    

