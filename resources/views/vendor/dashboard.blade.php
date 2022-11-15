@extends('vendor.layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-left">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Barahi Logistic</a></li>
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                            <li class="breadcrumb-item active">{{Auth::guard('vendor')->user()->name}}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="row ">
            <div class="col-md-9">
            <div class="row">
            <div class="col-md-4 p-1">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title  text-center">
                            <h5 style="font-weight: bolder;">Packages</h5>
                        </div>
                        <a href="#">
                            <div class="card-content row">
                                <div class="col-md-6 text-left" style="font-size: 12px;">
                                    Total:
                                </div>
                                <div class="col-md-6 text-end" style="font-size: 12px;">
                                    <strong>{{App\Models\Vendor\Order::get()->count()}}</strong>
                                </div>
                            </div>
                        </a>
                        <a href="#">
                            <div class="card-content row">
                                <div class="col-md-8 text-left" style="font-size: 12px;">
                                    Delivered:
                                </div>
                                <div class="col-md-4 text-end" style="font-size: 12px;">
                                    <strong>{{App\Models\Vendor\Order::where('added_by',Auth::guard('vendor')->user()->id)->where('order_status','delivered')->get()->count()}}</strong>
                                </div>
                            </div>
                        </a>
                        <a href="#">
                            <div class="card-content row">
                                <div class="col-md-8 text-left" style="font-size: 12px;">
                                    Actual Returned:
                                </div>
                                <div class="col-md-4 text-end" style="font-size: 12px;">
                                    <strong>{{App\Models\Vendor\Order::where('added_by',Auth::guard('vendor')->user()->id)->where('order_status','returned_delivered')->get()->count()}}</strong>
                                </div>
                            </div>
                        </a>
                        <a href="#">
                            <div class="card-content row">
                                <div class="col-md-8 text-left" style="font-size: 12px;">
                                    Processing:
                                </div>
                                <div class="col-md-4 text-end" style="font-size: 12px;">
                                    <strong>{{App\Models\Vendor\Order::where('added_by',Auth::guard('vendor')->user()->id)->where('order_status','sent_for_delivery')->get()->count()}}</strong>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 p-1">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title  text-center">
                            <h5 style="font-weight: bolder;">Package Value</h5>
                        </div>
                        <a href="#">
                            <div class="card-content row">
                                <div class="col-md-6 text-left" style="font-size: 12px;">
                                    Total:
                                </div>
                                <div class="col-md-6 text-end" style="font-size: 12px;">
                                    <strong>{{App\Models\Vendor\Order::where('added_by',Auth::guard('vendor')->user()->id)->get()->sum('cod_charge') + App\Models\Vendor\Order::get()->sum('delivery_charge')}}</strong>
                                </div>
                            </div>
                        </a>
                        <a href="#">
                            <div class="card-content row">
                                <div class="col-md-8 text-left" style="font-size: 12px;">
                                    Delivered:
                                </div>
                                <div class="col-md-4 text-end" style="font-size: 12px;">
                                    <strong>{{App\Models\Vendor\Order::where('added_by',Auth::guard('vendor')->user()->id)->where('order_status','delivered')->get()->sum('cod_charge') + App\Models\Vendor\Order::where('order_status','delivered')->get()->sum('delivery_charge')}}</strong>
                                </div>
                            </div>
                        </a>
                        <a href="#">
                            <div class="card-content row">
                                <div class="col-md-8 text-left" style="font-size: 12px;">
                                    Actual Returned:
                                </div>
                                <div class="col-md-4 text-end" style="font-size: 12px;">
                                    <strong>{{App\Models\Vendor\Order::where('added_by',Auth::guard('vendor')->user()->id)->where('order_status','returned_delivered')->get()->sum('cod_charge') + App\Models\Vendor\Order::where('order_status','returned_delivered')->get()->sum('delivery_charge')}}</strong>
                                </div>
                            </div>
                        </a>
                        <a href="#">
                            <div class="card-content row">
                                <div class="col-md-8 text-left" style="font-size: 12px;">
                                    Processing:
                                </div>
                                <div class="col-md-4 text-end" style="font-size: 12px;">
                                    <strong>{{App\Models\Vendor\Order::where('added_by',Auth::guard('vendor')->user()->id)->where('order_status','sent_for_delivery')->get()->sum('cod_charge') + App\Models\Vendor\Order::where('order_status','sent_for_delivery')->get()->sum('delivery_charge')}}</strong>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 p-1">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title  text-center">
                            <h5 style="font-weight: bolder;">COD Details</h5>
                        </div>
                        <a href="#">
                            <div class="card-content row">
                                <div class="col-md-6 text-left" style="font-size: 12px;">
                                    Pending:
                                </div>
                                <div class="col-md-6 text-end" style="font-size: 12px;">
                                    <strong>{{App\Models\Vendor\Order::where('added_by',Auth::guard('vendor')->user()->id)->where('order_status','!=','delivered')->get()->sum('cod_charge')}}</strong>
                                </div>
                            </div>
                        </a>
                        <a href="#">
                            <div class="card-content row">
                                <div class="col-md-8 text-left" style="font-size: 12px;">
                                    Last COD Amt:
                                </div>
                                <div class="col-md-4 text-end" style="font-size: 12px;">
                                    <strong>{{optional(App\Models\Vendor\Order::where('added_by',Auth::guard('vendor')->user()->id)->orderBy('id','desc')->first())->cod_charge}}</strong>
                                </div>
                            </div>
                        </a>
                        <a href="#">
                            <div class="card-content row">
                                <div class="col-md-8 text-left" style="font-size: 12px;">
                                    Delivery Charges:
                                </div>
                                <div class="col-md-4 text-end" style="font-size: 12px;">
                                    <strong>{{App\Models\Vendor\Order::where('added_by',Auth::guard('vendor')->user()->id)->get()->sum('delivery_charge')}}</strong>
                                </div>
                            </div>
                        </a>
                        <a href="#">
                            <div class="card-content row">
                                <div class="col-md-6 text-left" style="font-size: 12px;">
                                    Last COD Transfer:
                                </div>
                                <div class="col-md-6 text-end" style="font-size: 12px;">
                                    <strong>{{optional(App\Models\Admin\Payment::where('vendor_id',Auth::guard('vendor')->user()->id)->orderBy('id','desc')->first())->created_at}}</strong>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-12 p-1">
                <div class="card card-success">
                    <div class="card-header">
                        <h3 class="card-title text-center">Order Status</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="chart">
                            <canvas id="barChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            </div>
            </div>
            
            <div class="col-md-3">
            <div class="row">
            <div class="col-md-12 p-1">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title  text-center "><h5>Today's Details</h5></div>
                        <div class="row">
                            <div class="col-md-6">
                                <a href="#">
                                    <div class="card-content text-center" style="font-size: 28px;color: black;font-weight: 600;">
                                        {{App\Models\Vendor\Order::where('added_by',Auth::guard('vendor')->user()->id)->where('order_status','delivered')->get()->count()}}
                                    </div>
                                    <div class="card-content text-center" style="font-size: 13px;color: black;">Delivered Orders</div>
                                </a>
                            </div>
                            <div class="col-md-6">
                                <a href="#">
                                    <div class="card-content text-center" style="font-size: 28px;color: black;font-weight: 600;">
                                        0
                                    </div>
                                    <div class="card-content text-center" style="font-size: 13px;color: black;">
                                        Returned Delivered
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-6">
                                <a href="#">
                                    <div class="card-content text-center" style="font-size: 28px;color: black;font-weight: 600;">
                                        0
                                    </div>
                                    <div class="card-content text-center " style="font-size: 13px;color: black;">Order Created</div>
                                </a>
                            </div>
                            <div class="col-md-6">
                                <a href="#">
                                    <div class="card-content text-center" style="font-size: 28px;color: black;font-weight: 600;">
                                        60
                                    </div>
                                    <div class="card-content text-center " style="font-size: 13px;color: black;">Order's Comment</div>
                                </a>
                            </div>
                            <div class="col-md-6">
                                <a href="#">
                                    <div class="card-content text-center" style="font-size: 28px;color: black;font-weight: 600;">
                                        31
                                    </div>
                                    <div class="card-content text-center"><a class="link" href="#" style="font-size: 13px;color: black;">Hold Orders</a></div>
                                </a>
                            </div>
                            <div class="col-md-6">
                                <a href="#">
                                    <div class="card-content text-center" style="font-size: 28px;color: black;font-weight: 600;">
                                        11
                                    </div>
                                    <div class="card-content text-center" ><a class="link" href="#" style="font-size: 13px;color: black;">RTV Orders</a></div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 p-1">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title  text-center " style="font-size: 13px;color: black;"><h5>Sales Statistics</h5></div>
                        <div class="row">
                            <div class="col-md-6">
                                <a href="#">
                                    <div class="card-content text-center" style="font-size: 28px;color: black;font-weight: 600;">
                                        80.65%
                                    </div>
                                    <div class="card-content text-center " style="font-size: 13px;color: black;">Successful Delivered</div>
                                </a>
                            </div>
                            <div class="col-md-6">
                                <a href="#">
                                    <div class="card-content text-center" style="font-size: 28px;color: black;font-weight: 600;">
                                        12.12%
                                    </div>
                                    <div class="card-content text-center " style="font-size: 13px;color: black;">
                                        Returned Delivered
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-6">
                                <a href="#">
                                    <div class="card-content text-center" style="font-size: 28px;color: black;font-weight: 600;">
                                        60
                                    </div>
                                    <div class="card-content text-center " style="font-size: 13px;color: black;">Redirect Delivered</div>
                                </a>
                            </div>
                            <div class="col-md-6">
                                <a href="#">
                                    <div class="card-content text-center" style="font-size: 28px;color: black;font-weight: 600;">
                                        60
                                    </div>
                                    <div class="card-content text-center " style="font-size: 13px;color: black;">Redirect Returned</div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            </div>
            </div>
            <div class="col-md-6 p-1">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title text-center">Daily Packet Value</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="chart">
                            <canvas id="areaChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 p-1">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title text-center">Daily Packets</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="chart">
                            <canvas id="lineChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>

    </div>

    <script src="{{asset('admins/js/jquery.min.js')}}"></script>
    <script src="{{asset('admins/js/bootstrap.bundle.min.js')}}"></script>
    <!-- ChartJS -->
    <script src="{{asset('admins/js/Chart.min.js')}}"></script>

    <script src="{{asset('admins/js/dashboard.js')}}"></script>
    <script>
        $(function ()
        {
            var areaChartCanvas = $('#areaChart').get(0).getContext('2d')
            var orderStatusChartData = {
                labels  : ['Dropoff Created', 'Pickup Order', 'Sent For Pickup', 'Pick Complete', 'Dispatched', 'RTV Dispatched', 'Arrived', 'RTV Arrived', 'Sent For Delivery', 'Return To Warehouse', 'Sent To Vendor', 'Hold'],
                datasets: [
                    {
                        label               : 'Orders',
                        backgroundColor     : 'rgba(60,141,188,0.9)',
                        borderColor         : 'rgba(60,141,188,0.8)',
                        pointRadius          : false,
                        pointColor          : '#3b8bba',
                        pointStrokeColor    : 'rgba(60,141,188,1)',
                        pointHighlightFill  : '#fff',
                        pointHighlightStroke: 'rgba(60,141,188,1)',
                        data                : [
                            @foreach ($order_statuses as $order_status)
                                {{ $order_status }},
                            @endforeach
                        ]
                    },
                ]
            }




          var dailePacketValueChartData = {
                labels  : [
                    @foreach($last_15_days as $last_15_day)
                        '{{ $last_15_day }}',
                    @endforeach
                ],
                datasets: [
                    {
                        label               : 'Daily Packet Value',
                        backgroundColor     : 'rgba(60,141,188,0.9)',
                        borderColor         : 'rgba(60,141,188,0.8)',
                        pointRadius          : false,
                        pointColor          : '#3b8bba',
                        pointStrokeColor    : 'rgba(60,141,188,1)',
                        pointHighlightFill  : '#fff',
                        pointHighlightStroke: 'rgba(60,141,188,1)',
                        data                : [
                            @foreach ($daily_packet_values as $daily_packet_value)
                                {{$daily_packet_value}},
                            @endforeach
                        ]
                    },
                ]
            }

            var areaChartOptions = {
                maintainAspectRatio : false,
                responsive : true,
                legend: {
                    display: false
                },
                scales: {
                    xAxes: [{
                        gridLines : {
                            display : false,
                        }
                    }],
                    yAxes: [{
                        gridLines : {
                            display : false,
                        }
                    }]
                }
            }

            new Chart(areaChartCanvas,
            {
                type: 'line',
                data: dailePacketValueChartData,
                options: areaChartOptions
            })

            var dailyPacketChartData = {
                labels  : [
                    @foreach($last_15_days as $last_15_day)
                        '{{ $last_15_day }}',
                    @endforeach],
                datasets: [
                    {
                        label               : 'Daily Packets',
                        backgroundColor     : 'rgba(60,141,188,0.9)',
                        borderColor         : 'rgba(60,141,188,0.8)',
                        pointRadius          : false,
                        pointColor          : '#3b8bba',
                        pointStrokeColor    : 'rgba(60,141,188,1)',
                        pointHighlightFill  : '#fff',
                        pointHighlightStroke: 'rgba(60,141,188,1)',
                        data                : [
                            @foreach ($daily_packets as $daily_packet)
                                {{$daily_packet}},
                            @endforeach
                        ]
                    },
                ]
            }

            //-------------
            //- LINE CHART -
            //--------------
            var lineChartCanvas = $('#lineChart').get(0).getContext('2d')
            var lineChartOptions = $.extend(true, {}, areaChartOptions)
            var dailyPacketChartData = $.extend(true, {}, dailyPacketChartData)
            dailyPacketChartData.datasets[0].fill = false;
            lineChartOptions.datasetFill = false

            var lineChart = new Chart(lineChartCanvas, {
            type: 'line',
            data: dailyPacketChartData,
            options: lineChartOptions
            })

          //-------------
          //- BAR CHART -
          //-------------


          var barChartCanvas = $('#barChart').get(0).getContext('2d')
          var barChartData = $.extend(true, {}, orderStatusChartData)
          var temp0 = orderStatusChartData.datasets[0]
          barChartData.datasets[0] = temp0

          var barChartOptions = {
            responsive              : true,
            maintainAspectRatio     : false,
            datasetFill             : false
          }

          new Chart(barChartCanvas, {
            type: 'bar',
            data: barChartData,
            options: barChartOptions
          })
        })
      </script>
@endsection
