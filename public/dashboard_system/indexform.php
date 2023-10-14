<link rel="stylesheet" href="AdminLTE/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
<link rel="stylesheet" href="AdminLTE/bower_components/sweetalert/sweetalert2.min.css">

<style>
.products-list {
	padding-right: 10px;
    height: 200px;
    overflow: auto;
}
</style>

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <div class="container">
    <section class="content">
  
    <div class="row">
      <div class="col-md-12">

      <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Deceased <?php echo(date("Y")); ?>: Line represents the deceased per month</h3>
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
              <div class="chart">
                <canvas id="lineChart" style="height:250px"></canvas>
              </div>
            </div>
          </div>

      </div>
      <div class="col-md-12">

      <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Cash Sales <?php echo(date("Y")); ?>: Line represents the cash sales</h3>
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

      
          <div class="row">
            <div class="col-md-4">
               <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">Deceased per Gender for this month of <?php echo(date("F, Y")); ?></h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
              <div class="row">
              <div class="col-md-6">
              <canvas id="pieChart" style="height:250px"></canvas>
              </div>
              <div class="col-md-4">
                  <ul class="chart-legend clearfix">
                    <li><i class="fa fa-circle-o text-red"></i> Male</li>
                    <li><i class="fa fa-circle-o text-green"></i> Female</li>
                  </ul>
                </div>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
            </div>
            <div class="col-md-8">

              <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Collectibles for this month of  <?php echo(date("F, Y")); ?></h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
              <table class="table">
                <thead>
                  <th>SOA</th>
                  <th>Collectible</th>
                </thead>
                <tbody>
                  <tr>
                    <td>DSWD</td>
                    <td>6,000.00</td>
                  </tr>
                  <tr>
                    <td>CSWDO</td>
                    <td>7,000.00</td>
                  </tr>
                </tbody>

              </table>
            </div>
            <!-- /.box-body -->
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
            
            areaChartData.labels = o.labels;
            areaChartData.datasets[0].data = o.dataset;
              lineChart.destroy();
              var lineChartCanvas = $('#lineChart').get(0).getContext('2d');
              lineChart = new Chart(lineChartCanvas).Line(areaChartData, areaChartOptions);
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


    /* ChartJS
     * -------
     * Here we will create a few charts using ChartJS
     */

    //--------------
    //- AREA CHART -
    //--------------

    // Get context with jQuery - using jQuery's .get() method.
    // var areaChartCanvas = $('#areaChart').get(0).getContext('2d')
    // This will get the first returned node in the jQuery collection.
    // var areaChart       = new Chart(areaChartCanvas)

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
    
    console.log(lineChart);


    var lineChartCanvas2          = $('#lineChart2').get(0).getContext('2d')
    lineChart2 = new Chart(lineChartCanvas2).Line(areaChartData, areaChartOptions);
    //-------------
    //- PIE CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
    var pieChart       = new Chart(pieChartCanvas)
    var PieData        = [
      {
        value    : 700,
        color    : '#f56954',
        highlight: '#f56954',
        label    : 'Male'
      },
      {
        value    : 500,
        color    : '#00a65a',
        highlight: '#00a65a',
        label    : 'Female'
      },
      
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
    pieChart.Doughnut(PieData, pieOptions)

    //-------------
    //- BAR CHART -
    //-------------
    // var barChartCanvas                   = $('#barChart').get(0).getContext('2d')
    // var barChart                         = new Chart(barChartCanvas)
    // var barChartData                     = areaChartData
    // barChartData.datasets[1].fillColor   = '#00a65a'
    // barChartData.datasets[1].strokeColor = '#00a65a'
    // barChartData.datasets[1].pointColor  = '#00a65a'
    var barChartOptions                  = {
      //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
      scaleBeginAtZero        : true,
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
      //Boolean - If there is a stroke on each bar
      barShowStroke           : true,
      //Number - Pixel width of the bar stroke
      barStrokeWidth          : 2,
      //Number - Spacing between each of the X value sets
      barValueSpacing         : 5,
      //Number - Spacing between data sets within X values
      barDatasetSpacing       : 1,
      //String - A legend template
      legendTemplate          : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].fillColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
      //Boolean - whether to make the chart responsive
      responsive              : true,
      maintainAspectRatio     : true
    }

    // barChartOptions.datasetFill = false
    // barChart.Bar(barChartData, barChartOptions)


var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
    var pieChart       = new Chart(pieChartCanvas)
    var PieData        = [
      {
        value    : 700,
        color    : '#f56954',
        highlight: '#f56954',
        label    : 'Male'
      },
      {
        value    : 500,
        color    : '#00a65a',
        highlight: '#00a65a',
        label    : 'Female'
      },
     
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
    pieChart.Doughnut(PieData, pieOptions)
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