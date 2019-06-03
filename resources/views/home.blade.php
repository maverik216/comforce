@extends('layouts.app')

@section('content')

<section class="content">

    <!-- =========================================================== -->

    <!-- Small boxes (Stat box) -->
    <div class="row">
      
      <div class="col-lg-4 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-green">
          <div class="inner">
            <h3>{{$countRequester}}</h3>

            <p>@lang('global.process.title')@lang('global.app_to')@lang('global.users.title1')</p>
          </div>
          <div class="icon">
            <i class="fa fa-user"></i>
          </div>
          @can('requester_manage')
          <a href="{{ route('admin.processes.requester') }}" class="small-box-footer">
            @lang('global.app_view') <i class="fa fa-arrow-circle-right"></i>
          </a> 
          @endcan
          
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-4 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-yellow">
          <div class="inner">
            <h3>{{$countApprover}}</h3>
            
            <p>@lang('global.process.title')@lang('global.app_to')@lang('global.users.title2')</p>
          </div>
          <div class="icon">
            <i class="fa fa-bolt"></i>
          </div>
          @can('approver_manage')
          <a href="{{ route('admin.processes.approver') }}" class="small-box-footer">
              @lang('global.app_view') <i class="fa fa-arrow-circle-right"></i>
          </a> 
          @endcan
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-4 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-red">
          <div class="inner">
            <h3>{{$countProcess}}</h3>
            
            <p>@lang('global.process.title')</p>
          </div>
          <div class="icon">
            <i class="fa fa-check"></i>
          </div>
          
          <a href="{{ route('admin.processes.index') }}" class="small-box-footer">
              @lang('global.app_view') <i class="fa fa-arrow-circle-right"></i>
          </a> 
          
        </div>
      </div>
      <!-- ./col -->
    </div>
    <!-- /.row -->

    
  
  </div>
  <div class="row">
    <div class="col-lg-6">
      <canvas id="pieChart" style="height:250px"></canvas>
    </div>
    <div class="col-lg-6">
      <canvas id="barChart" style="height:250px"></canvas>
    </div>
  </div>
</section>

@endsection

@section('javascript') 

<script src="{{ url('adminlte/plugins/chartjs/Chart.min.js') }}"></script>
<script>
$(document).ready(function(){
  
    //-------------
    //- PIE CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
    var pieChart       = new Chart(pieChartCanvas)
    var PieData        = [
      {
        value    : {{$countUnapproved}},
        color    : '#f56954',
        highlight: '#f56954',
        label    : '@lang('global.process.unapproved')'
      },
      {
        value    : {{$countApproved}},
        color    : '#00a65a',
        highlight: '#00a65a',
        label    : '@lang('global.process.approved')'
      },
      {
        value    : {{$countFinished}},
        color    : '#f39c12',
        highlight: '#f39c12',
        label    : '@lang('global.process.finished')'
      }
    ]
    var pieOptions     = {
      //Boolean - Whether we should show a stroke on each segment
      segmentShowStroke    : true,
      //String - The colour of each segment stroke
      segmentStrokeColor   : '#fff',
      //Number - The width of each segment stroke
      segmentStrokeWidth   : 1,
      //Number - The percentage of the chart that we cut out of the middle
      percentageInnerCutout: 0, // This is 0 for Pie charts
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
    pieChart.Pie(PieData, pieOptions)


  // var ctx = document.getElementById('myChart').getContext('2d');

  var barChartData = {
      labels  : ['Solicitudes Actuales'],
      datasets: [
        {
          label               : '@lang('global.process.title')',
          fillColor           : '#d94b3a',
          strokeColor         : '#d94b3a',
          pointColor          : '#d94b3a',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data                : [{{$countProcess}}]
        },
        {
          label               : '@lang('global.users.title1')',
          fillColor           : 'rgba(60,141,188,0.9)',
          strokeColor         : 'rgba(60,141,188,0.8)',
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : [{{$countRequester}}]
        },
        {
          label               : '@lang('global.users.title2')',
          fillColor           : '#f39c12',
          strokeColor         : '#f39c12',
          pointColor          : '#f39c12',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : [{{$countApprover}}]
        }
      ]
    }


    //-------------
    //- BAR CHART -
    //-------------
    var barChartCanvas                   = $('#barChart').get(0).getContext('2d')
    var barChart                         = new Chart(barChartCanvas)
    var barChartData                     = barChartData
    barChartData.datasets[1].fillColor   = '#00a65a'
    barChartData.datasets[1].strokeColor = '#00a65a'
    barChartData.datasets[1].pointColor  = '#00a65a'
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
    barChartOptions.datasetFill = false
    barChart.Bar(barChartData, barChartOptions)
  
});
  </script>
  @endsection
  