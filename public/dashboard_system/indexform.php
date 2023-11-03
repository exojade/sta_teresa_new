<link rel="stylesheet" href="AdminLTE/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
<link rel="stylesheet" href="AdminLTE/bower_components/sweetalert/sweetalert2.min.css">

<style>
.products-list {
	padding-right: 10px;
    height: 200px;
    overflow: auto;
}

.OVERDUE{
  color: red;
}

.UNPAID{
  color: green;
}
</style>

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <div class="container">
    <section class="content">


    <div class="row">
            <div class="col-md-4">
            <div class="box box-primary direct-chat direct-chat-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Guarantors without SOA yet</h3>
          
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="direct-chat-messages">

              <?php if(!empty($ambot)): ?>
                <table class="table table-bordered table-striped sample-datatable">
                  <thead>
                    <tr>
                      <th>Guarantor</th>
                      <th>Count</th>
                    </tr>
                  </thead>
                <tbody>
                <?php foreach($ambot as $g):?>
                  <tr>
                    <td><a href="soa?action=list&id=<?php echo($g["agency"]); ?>"><?php echo($g["guarantor"]); ?></a></td>
                    <td><?php echo($g["count"]); ?></td>
                  </tr>
                <?php endforeach; ?>
                </tbody>
              </table>
              <?php else: ?>
                <h3>No data yet</h3>
              <?php endif; ?>


              
                
              </div>
            </div>
          </div>
            </div>
            <div class="col-md-4">

            <div class="box box-primary direct-chat direct-chat-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Collectibles SOA</h3>
          
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="direct-chat-messages">
                <div class="direct-chat-msg">

                <?php if(!empty($soa)): 
                 
                  
                  ?>
                <table class="table table-bordered table-striped sample-datatable">
                  <thead>
                    <tr>
                      <th>Guarantor</th>
                      <th>Amount</th>
                    </tr>
                  </thead>
                <tbody>
                <?php foreach($soa as $s):
                   $amount = query("select sum(amount) as amount from transaction where account_status = 'UNSETTLED' and soa_id = ?", $s["soa_id"]);
                  ?>
                  <tr>
                    <td><a href="soa?action=details&id=<?php echo($s["soa_id"]); ?>"><?php echo($s["agency"]); ?></a></td>
                    <td><?php echo($amount[0]["amount"]); ?></td>
                  </tr>
                <?php endforeach; ?>
                </tbody>
              </table>
              <?php else: ?>
                <h3>No data yet</h3>
              <?php endif; ?>
             
   
                </div>
              </div>
            </div>
          </div>
              
            </div>


            <div class="col-md-4">

            <div class="box box-primary direct-chat direct-chat-primary">
            <div class="box-header with-border">
              <h3 class="box-title">UNPAID / OVERDUE Clients</h3>
          
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="direct-chat-messages">
                <div class="direct-chat-msg">

                <?php if(!empty($clients)): ?>
                <table class="table table-bordered table-striped sample-datatable">
                  <thead>
                    <tr>
                      <th>Client</th>
                      <th>Remarks</th>
                    </tr>
                  </thead>
                <tbody>
                <?php foreach($clients as $row):?>
                  <tr>
                    <td><a href="soa?action=list&id=<?php echo($row["contract_id"]); ?>"><?php echo($row["client"]); ?></a></td>
                    <td class="<?php echo($row["remarks"]); ?>"><?php echo($row["remarks"]); ?></td>
                  </tr>
                <?php endforeach; ?>
                </tbody>
              </table>
              <?php else: ?>
                <h3>No data yet</h3>
              <?php endif; ?>
             
   
                </div>
              </div>
            </div>
          </div>
              
            </div>
          </div>
  
    <div class="row">
      <div class="col-md-12">

      <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Deceased Chart [Line Represents number of deceased]</h3>
              <form class="deceased_chart_form pull-right" url="index">
              <input type="hidden" name="action" value="deceased">
              <button style="margin-left: 5px;" class="btn btn-primary btn-flat pull-right" type="submit">Filter</button>
              <div style="margin-left: 5px;" class="form-group pull-right">
                  <input name="year" type="number" value="<?php echo(date("Y")); ?>" class="form-control" id="exampleInputEmail1" placeholder="---">
                </div>
                <div style="margin-left: 5px;" class="form-group pull-right">
                  <select name="to" class="form-control">
                    <option value="01">January</option>
                    <option value="02">February</option>
                    <option value="03">March</option>
                    <option value="04">April</option>
                    <option value="05">May</option>
                    <option value="06">June</option>
                    <option value="07">July</option>
                    <option value="08">August</option>
                    <option value="09">September</option>
                    <option value="10">October</option>
                    <option value="11">November</option>
                    <option selected value="12">December</option>
                    <!-- <option selected value="<?php echo(date("m")); ?>"><?php echo(date("F")); ?></option> -->
                  </select>
                </div>
              <div style="margin-left: 5px;" class="form-group pull-right">
                  <select name="from" class="form-control">
                    <option selected value="01">January</option>
                    <option value="02">February</option>
                    <option value="03">March</option>
                    <option value="04">April</option>
                    <option value="05">May</option>
                    <option value="06">June</option>
                    <option value="07">July</option>
                    <option value="08">August</option>
                    <option value="09">September</option>
                    <option value="10">October</option>
                    <option value="11">November</option>
                    <option value="12">December</option>
                  </select>
                </div>
            </form>
         
            </div>
            <div class="box-body">
              <div class="row">
                <div class="col-md-9" style="border-right: 1px solid black;">
                <div class="chart">
                <canvas id="lineChart" style="height:250px"></canvas>
              </div>

                </div>
                <div class="col-md-3" >
                <div class="row">
              <canvas id="pieChart" style="height:250px"></canvas>
              <ul class="chart-legend clearfix text-left" style="margin-left: 20px;">
                    <li><i class="fa fa-circle-o text-red"></i> Male</li>
                    <li><i class="fa fa-circle-o text-green"></i> Female</li>
                  </ul>
              </div>
                </div>
              </div>
              
            </div>
          </div>

      </div>
      <div class="col-md-12">

      <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Sales Chart [Line Represents Cash Sales]</h3>
              <form class="sales_chart_form pull-right" url="index">
              <input type="hidden" name="action" value="sales">
              <button style="margin-left: 5px;" class="btn btn-primary btn-flat pull-right" type="submit">Filter</button>
              <div style="margin-left: 5px;" class="form-group pull-right">
                  <input name="year" type="number" value="<?php echo(date("Y")); ?>" class="form-control" id="exampleInputEmail1" placeholder="---">
                </div>
                <div style="margin-left: 5px;" class="form-group pull-right">
                  <select name="to" class="form-control">
                    <option value="01">January</option>
                    <option value="02">February</option>
                    <option value="03">March</option>
                    <option value="04">April</option>
                    <option value="05">May</option>
                    <option value="06">June</option>
                    <option value="07">July</option>
                    <option value="08">August</option>
                    <option value="09">September</option>
                    <option value="10">October</option>
                    <option value="11">November</option>
                    <option selected value="12">December</option>
                    <!-- <option selected value="<?php echo(date("m")); ?>"><?php echo(date("F")); ?></option> -->
                  </select>
                </div>
              <div style="margin-left: 5px;" class="form-group pull-right">
                  <select name="from" class="form-control">
                    <option selected value="01">January</option>
                    <option value="02">February</option>
                    <option value="03">March</option>
                    <option value="04">April</option>
                    <option value="05">May</option>
                    <option value="06">June</option>
                    <option value="07">July</option>
                    <option value="08">August</option>
                    <option value="09">September</option>
                    <option value="10">October</option>
                    <option value="11">November</option>
                    <option value="12">December</option>
                  </select>
                </div>
            </form>
            </div>
            <div class="box-body">
              <div class="chart">
                <canvas id="lineChart2" style="height:250px"></canvas>
              </div>
            </div>
          </div>

      </div>
    </div>

      
          
         


	
	  
    </section>
    <!-- /.content -->
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

  <script>
$(document).ready(function() {
      // Trigger the form submit during document ready
      $('.deceased_chart_form').submit();
      $('.sales_chart_form').submit();
    });
  </script>


  <script>
  


$('.deceased_chart_form').submit(function(e) {
var form = $(this)[0];
var formData = new FormData(form);
console.log(formData);
  var promptmessage = 'This form will be submitted. Are you sure you want to continue?';
  var prompttitle = 'Data submission';
e.preventDefault();
  var url = $(this).data('url');
    var promptmessage = 'This form will be submitted. Are you sure you want to continue?';
    var prompttitle = 'Data submission';
    e.preventDefault();

    swal({title: 'Please wait...', imageUrl: 'AdminLTE/dist/img/loader.gif', showConfirmButton: false});
    $.ajax({
            type: 'post',
            url: url,
            data: formData,
            processData: false,
            contentType: false,
            success: function (results) {
            var o = jQuery.parseJSON(results);
            console.log(o);
            areaChartData.labels = o.labels;
            areaChartData.datasets[0].data = o.dataset;
              lineChart.destroy();
              // pieChart.clear();
              var lineChartCanvas = $('#lineChart').get(0).getContext('2d');
              lineChart = new Chart(lineChartCanvas).Line(areaChartData, areaChartOptions);
              console.log(pieChart);

              pieChart.destroy();
              PieData = o.gender;
              var pieChartCanvas = $('#pieChart').get(0).getContext('2d');
              console.log(o.gender);
              pieChart = new Chart(pieChartCanvas).Doughnut(PieData, pieOptions);
              


              swal.close();
            }
        });
});



$('.sales_chart_form').submit(function(e) {
var form = $(this)[0];
var formData = new FormData(form);
console.log(formData);
  var promptmessage = 'This form will be submitted. Are you sure you want to continue?';
  var prompttitle = 'Data submission';
e.preventDefault();
  var url = $(this).data('url');
    var promptmessage = 'This form will be submitted. Are you sure you want to continue?';
    var prompttitle = 'Data submission';
    e.preventDefault();

    swal({title: 'Please wait...', imageUrl: 'AdminLTE/dist/img/loader.gif', showConfirmButton: false});
    $.ajax({
            type: 'post',
            url: url,
            data: formData,
            processData: false,
            contentType: false,
            success: function (results) {
            var o = jQuery.parseJSON(results);
            
            areaChartData.labels = o.labels;
            areaChartData.datasets[0].data = o.dataset;
            lineChart2.destroy();
            var lineChartCanvas2 = $('#lineChart2').get(0).getContext('2d');
            lineChart2 = new Chart(lineChartCanvas2).Line(areaChartData, areaChartOptions);
            swal.close();
            }
        });
});



    var areaChartData = {
      labels  : ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
      datasets: [
        
        {
          label               : 'Digital Goods',
          fillColor           : 'rgba(60,141,188,0.9)',
          strokeColor         : 'rgba(60,141,188,0.8)',
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : [28, 48, 40, 19, 86, 27, 90]
        }
      ]
    }


    var areaChartOptions = {
      bezierCurve: false,
      scales: {
    yAxes: [{
      ticks: {
        beginAtZero: true,
        callback: function (value, index, values) {
          return value.toLocaleString();
        }
      }
    }]
  },
      //Boolean - If we should show the scale at all
      showScale               : true,

      tooltips: {
    callbacks: {
      label: function (tooltipItem, data) {
        return data.datasets[tooltipItem.datasetIndex].label + ': ' + tooltipItem.yLabel.toLocaleString();
      }
    }
  },
      //Boolean - Whether grid lines are shown across the chart
      scaleShowGridLines      : true,
      //String - Colour of the grid lines
      scaleGridLineColor      : 'rgba(0,0,0,.05)',
      //Number - Width of the grid lines
      scaleGridLineWidth      : 1,
      //Boolean - Whether to show horizontal lines (except X axis)
      scaleShowHorizontalLines: true,
      //Boolean - Whether to show vertical lines (except Y axis)
      scaleShowVerticalLines  : true,
      //Boolean - Whether the line is curved between points
      // bezierCurve             : true,
      //Number - Tension of the bezier curve between points
      bezierCurveTension      : 0.3,
      //Boolean - Whether to show a dot for each point
      pointDot                : false,
      //Number - Radius of each point dot in pixels
      pointDotRadius          : 4,
      //Number - Pixel width of point dot stroke
      pointDotStrokeWidth     : 1,
      //Number - amount extra to add to the radius to cater for hit detection outside the drawn point
      pointHitDetectionRadius : 20,
      //Boolean - Whether to show a stroke for datasets
      datasetStroke           : true,
      //Number - Pixel width of dataset stroke
      datasetStrokeWidth      : 2,
      //Boolean - Whether to fill the dataset with a color
      datasetFill             : true,
      //String - A legend template
      legendTemplate          : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].lineColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
      //Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
      maintainAspectRatio     : true,
      //Boolean - whether to make the chart responsive to window resizing
      responsive              : true
    }

    //Create the line chart
    // areaChart.Line(areaChartData, areaChartOptions)

    //-------------
    //- LINE CHART -
    //--------------
    var lineChartCanvas          = $('#lineChart').get(0).getContext('2d')
    areaChartOptions.datasetFill = false
    lineChart = new Chart(lineChartCanvas).Line(areaChartData, areaChartOptions);
    // lineChart.Line(areaChartData, lineChartOptions)
    


    var lineChartCanvas2          = $('#lineChart2').get(0).getContext('2d')
    lineChart2 = new Chart(lineChartCanvas2).Line(areaChartData, areaChartOptions);
    //-------------
    //- PIE CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.

    // var pieChart = new Chart(pieChartCanvas);
    // var pieChart       = new Chart(pieChartCanvas)
   

    var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
    var PieData        = [
      {
        value    : 700,
        color    : '#f56954',
        highlight: '#f56954',
        label    : 'Chrome'
      },
      {
        value    : 500,
        color    : '#00a65a',
        highlight: '#00a65a',
        label    : 'IE'
      },
      {
        value    : 400,
        color    : '#f39c12',
        highlight: '#f39c12',
        label    : 'FireFox'
      },
      {
        value    : 600,
        color    : '#00c0ef',
        highlight: '#00c0ef',
        label    : 'Safari'
      },
      {
        value    : 300,
        color    : '#3c8dbc',
        highlight: '#3c8dbc',
        label    : 'Opera'
      },
      {
        value    : 100,
        color    : '#d2d6de',
        highlight: '#d2d6de',
        label    : 'Navigator'
      }
    ]
    var pieOptions     = {
      //Boolean - Whether we should show a stroke on each segment
      segmentShowStroke    : true,
      //String - The colour of each segment stroke
      segmentStrokeColor   : '#fff',
      //Number - The width of each segment stroke
      segmentStrokeWidth   : 2,
      //Number - The percentage of the chart that we cut out of the middle
      percentageInnerCutout: 50, // This is 0 for Pie charts
      //Number - Amount of animation steps
      animationSteps       : 100,
      //String - Animation easing effect
      animationEasing      : 'easeOutBounce',
      //Boolean - Whether we animate the rotation of the Doughnut
      animateRotate        : true,
      //Boolean - Whether we animate scaling the Doughnut from the centre
      animateScale         : false,
      //Boolean - whether to make the chart responsive to window resizing
      responsive           : true,
      // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
      maintainAspectRatio  : true,
      //String - A legend template
      legendTemplate       : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<segments.length; i++){%><li><span style="background-color:<%=segments[i].fillColor%>"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>'
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    lineChart2 = new Chart(lineChartCanvas2).Line(areaChartData, areaChartOptions);
    pieChart = new Chart(pieChartCanvas).Doughnut(PieData, pieOptions);
    
    


</script>

  <?php
	// render footer 2
	require("layouts/footer_end.php");
  ?>

<script>
  $(function () {
    $('#example2').DataTable()
   
  })
</script>