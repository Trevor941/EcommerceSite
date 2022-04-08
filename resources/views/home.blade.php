@extends('layouts.master')

@section('content')
<div class="row mt-5 mb-5">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                           Total Products</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{$products_total}}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-calendar fa-2x text-gray-300"></i> 
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Annual) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                           Total Sales</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{$orders_total}}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Tasks Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Customers
                        </div>
                        <div class="row no-gutters align-items-center">
                            <div class="col-auto">
                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{$customers_total}}</div>
                            </div>
                            <div class="col">
                                <div class="progress progress-sm mr-2">
                                    <div class="progress-bar bg-info" role="progressbar"
                                        style="width: 50%" aria-valuenow="50" aria-valuemin="0"
                                        aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Pending Requests Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            Total Users</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{$users_total}}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    <div class="row justify-content-center mt-5 mb-5">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="chart-pie pt-4">
                        <canvas id="myPieChart"></canvas>
                    </div>
                    <hr>
                    Pie Chart, data representation of orders created on a monthly basis for the year  2022
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
            <div class="card-body">
                <div class="chart-bar">
                    <canvas id="myBarChart"></canvas>
                </div>
                <hr>
              Bar Chart, data representation of orders created on a monthly basis for the year  2022
            </div>
        </div>
        </div>
    </div>


    <div class="row justify-content-center mt-5 mb-5">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="chart-area">
                        <canvas id="myAreaChart"></canvas>
                    </div>
                    <hr>
                    Highchart, data representation of orders created on a monthly basis for the year  2022
                </div>
            </div>
        </div>
    </div>


@endsection
@section('scripts')
<script>
    // Pie Chart Example
var ctx = document.getElementById("myPieChart");
var myPieChart = new Chart(ctx, {
type: 'doughnut',
data: {
labels: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
datasets: [{
data: [{{$janorders}}, {{$feborders}}, {{$marorders}}, {{$aprilorders}}, {{$mayorders}}, {{$junorders}}, {{$julyorders}}, {{$augorders}}, {{$septorders}}, {{$octorders}}, {{$novorders}}, {{$decorders}}],
backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc'],
hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf'],
hoverBorderColor: "rgba(234, 236, 244, 1)",
}],
},
options: {
maintainAspectRatio: false,
tooltips: {
backgroundColor: "rgb(255,255,255)",
bodyFontColor: "#858796",
borderColor: '#dddfeb',
borderWidth: 1,
xPadding: 15,
yPadding: 15,
displayColors: false,
caretPadding: 10,
},
legend: {
display: false
},
cutoutPercentage: 80,
},
});

</script>

<script>
    // Bar Chart Example
var ctx = document.getElementById("myBarChart");
var myBarChart = new Chart(ctx, {
type: 'bar',
data: {
labels: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
datasets: [{
label: "Orders",
backgroundColor: "#FF6F61",
hoverBackgroundColor: "#FF6F61",
borderColor: "#000",
data: [{{$janorders}}, {{$feborders}}, {{$marorders}}, {{$aprilorders}}, {{$mayorders}}, {{$junorders}}, {{$julyorders}}, {{$augorders}}, {{$septorders}}, {{$octorders}}, {{$novorders}}, {{$decorders}}],
}],
},
options: {
maintainAspectRatio: false,
layout: {
padding: {
left: 10,
right: 25,
top: 25,
bottom: 0
}
},
scales: {
xAxes: [{
time: {
unit: 'month'
},
gridLines: {
display: false,
drawBorder: false
},
ticks: {
maxTicksLimit: 12
},
maxBarThickness: 25,
}],
yAxes: [{
ticks: {
min: 0,
max: 10,
maxTicksLimit: 8,
padding: 10,
// Include a dollar sign in the ticks
callback: function(value, index, values) {
return  number_format(value);
}
},
gridLines: {
color: "rgb(234, 236, 244)",
zeroLineColor: "rgb(234, 236, 244)",
drawBorder: false,
borderDash: [2],
zeroLineBorderDash: [2]
}
}],
},
legend: {
display: false
},
tooltips: {
titleMarginBottom: 10,
titleFontColor: '#6e707e',
titleFontSize: 14,
backgroundColor: "rgb(255,255,255)",
bodyFontColor: "#858796",
borderColor: '#dddfeb',
borderWidth: 1,
xPadding: 15,
yPadding: 15,
displayColors: false,
caretPadding: 10,
callbacks: {
label: function(tooltipItem, chart) {
var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
return  number_format(tooltipItem.yLabel) + ' ' + datasetLabel;
}
}
},
}
});
</script>

<script>
    // Area Chart Example
var ctx = document.getElementById("myAreaChart");
var myLineChart = new Chart(ctx, {
type: 'line',
data: {
labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
datasets: [{
label: "Sales",
lineTension: 0.3,
backgroundColor: "rgba(78, 115, 223, 0.05)",
borderColor: "#FF6F61",
pointRadius: 3,
pointBackgroundColor: "#fff",
pointBorderColor: "#FF6F61",
pointHoverRadius: 3,
pointHoverBackgroundColor: "#FF6F61",
pointHoverBorderColor: "#fff",
pointHitRadius: 10,
pointBorderWidth: 2,
data: [{{$janorders}}, {{$feborders}}, {{$marorders}}],
}],
},
options: {
maintainAspectRatio: false,
layout: {
padding: {
left: 10,
right: 25,
top: 25,
bottom: 0
}
},
scales: {
xAxes: [{
time: {
unit: 'date'
},
gridLines: {
display: false,
drawBorder: false
},
ticks: {
maxTicksLimit: 7
}
}],
yAxes: [{
ticks: {
maxTicksLimit: 5,
padding: 10,
// Include a dollar sign in the ticks
callback: function(value, index, values) {
return '$' + number_format(value);
}
},
gridLines: {
color: "rgb(234, 236, 244)",
zeroLineColor: "rgb(234, 236, 244)",
drawBorder: false,
borderDash: [2],
zeroLineBorderDash: [2]
}
}],
},
legend: {
display: false
},
tooltips: {
backgroundColor: "rgb(255,255,255)",
bodyFontColor: "#858796",
titleMarginBottom: 10,
titleFontColor: '#6e707e',
titleFontSize: 14,
borderColor: '#dddfeb',
borderWidth: 1,
xPadding: 15,
yPadding: 15,
displayColors: false,
intersect: false,
mode: 'index',
caretPadding: 10,
callbacks: {
label: function(tooltipItem, chart) {
var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
return datasetLabel + ': $' + number_format(tooltipItem.yLabel);
}
}
}
}
});

</script>
@endsection