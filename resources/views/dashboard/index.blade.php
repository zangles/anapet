@extends('layouts.app')

@section('content')
    <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <span class="label label-success pull-right">Last Month</span>
                            <h5>Income</h5>
                        </div>
                        <div class="ibox-content">
                            <h1 class="no-margins"> <i class="fa fa-euro"></i> 6,200</h1>
                            <div class="stat-percent font-bold text-success">98% <i class="fa fa-bolt"></i></div>
                            <small>Total income</small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <span class="label label-info pull-right">Last Month</span>
                            <h5>Turns</h5>
                        </div>
                        <div class="ibox-content">
                            <h1 class="no-margins">{{ $totalTurns1Month }}</h1>
                            <div class="stat-percent font-bold text-info">{{ $porcentajeTurnos }}% <i class="fa @if($porcentajeTurnos >=0) fa-level-up-alt @else fa-level-down-alt @endif"></i></div>
                            <small>New turns</small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <span class="label label-primary pull-right">Last Month</span>
                            <h5>Contacts</h5>
                        </div>
                        <div class="ibox-content">
                            <h1 class="no-margins">{{ $totalContacts1Month }}</h1>
                            <div class="stat-percent font-bold text-navy">{{ $porcentajeContactos }}% <i class="fa @if($porcentajeTurnos >=0) fa-level-up-alt @else fa-level-down-alt @endif"></i></div>
                            <small>New contacts</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Income</h5>
                            <div class="pull-right">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-xs btn-white active">Today</button>
                                    <button type="button" class="btn btn-xs btn-white">Monthly</button>
                                    <button type="button" class="btn btn-xs btn-white">Annual</button>
                                </div>
                            </div>
                        </div>
                        <div class="ibox-content">
                            <div class="row">
                                <div class="col-lg-9">
                                    <div class="flot-chart">
                                        <div class="flot-chart-content" id="flot-dashboard-chart"></div>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <ul class="stat-list">
                                        <li>
                                            <h2 class="no-margins">2,346</h2>
                                            <small>Total turns in period</small>
                                            <div class="stat-percent">48% <i class="fa fa-level-up text-navy"></i></div>
                                            <div class="progress progress-mini">
                                                <div style="width: 48%;" class="progress-bar"></div>
                                            </div>
                                        </li>
                                        <li>
                                            <h2 class="no-margins ">4,422</h2>
                                            <small>Turns in last month</small>
                                            <div class="stat-percent">60% <i class="fa fa-level-down text-navy"></i></div>
                                            <div class="progress progress-mini">
                                                <div style="width: 60%;" class="progress-bar"></div>
                                            </div>
                                        </li>
                                        <li>
                                            <h2 class="no-margins ">9,180</h2>
                                            <small>Monthly income from turns</small>
                                            <div class="stat-percent">22% <i class="fa fa-bolt text-navy"></i></div>
                                            <div class="progress progress-mini">
                                                <div style="width: 22%;" class="progress-bar"></div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="ibox float-e-margins">
                                <div class="ibox-title">
                                    <h5>Today turns</h5>
                                    <div class="ibox-tools">
                                        <a class="collapse-link">
                                            <i class="fa fa-chevron-up"></i>
                                        </a>
                                        <a class="close-link">
                                            <i class="fa fa-times"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="ibox-content">
                                    <table class="table table-hover no-margins">
                                        <thead>
                                        <tr>
                                            <th>Status</th>
                                            <th>Date</th>
                                            <th>Contact</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td><span class="label label-primary">Completed</span></td>
                                            <td><i class="fa fa-clock-o"></i> 11:20pm</td>
                                            <td>Samantha</td>
                                        </tr>
                                        <tr>
                                            <td><span class="label label-warning">Canceled</span> </td>
                                            <td><i class="fa fa-clock-o"></i> 10:40am</td>
                                            <td>Monica</td>
                                        </tr>
                                        <tr>
                                            <td><span class="label label-primary">Completed</span> </td>
                                            <td><i class="fa fa-clock-o"></i> 01:30pm</td>
                                            <td>John</td>
                                        </tr>
                                        <tr>
                                            <td><small>Pending...</small> </td>
                                            <td><i class="fa fa-clock-o"></i> 02:20pm</td>
                                            <td>Agnes</td>
                                        </tr>
                                        <tr>
                                            <td><small>Pending...</small> </td>
                                            <td><i class="fa fa-clock-o"></i> 09:40pm</td>
                                            <td>Janet</td>
                                        </tr>
                                        <tr>
                                            <td><small>Pending...</small> </td>
                                            <td><i class="fa fa-clock-o"></i> 04:10am</td>
                                            <td>Amelia</td>
                                        </tr>
                                        <tr>
                                            <td><small>Pending...</small> </td>
                                            <td><i class="fa fa-clock-o"></i> 12:08am</td>
                                            <td>Damian</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="ibox float-e-margins">
                                <div class="ibox-title">
                                    <h5>Small todo list</h5>
                                    <div class="ibox-tools">
                                        <a class="collapse-link">
                                            <i class="fa fa-chevron-up"></i>
                                        </a>
                                        <a class="close-link">
                                            <i class="fa fa-times"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="ibox-content">
                                    <ul class="todo-list m-t small-list">
                                        <li>
                                            <a href="#" class="check-link"><i class="fa fa-check-square"></i> </a>
                                            <span class="m-l-xs todo-completed">Buy a milk</span>

                                        </li>
                                        <li>
                                            <a href="#" class="check-link"><i class="fa fa-square-o"></i> </a>
                                            <span class="m-l-xs">Go to shop and find some products.</span>

                                        </li>
                                        <li>
                                            <a href="#" class="check-link"><i class="fa fa-square-o"></i> </a>
                                            <span class="m-l-xs">Send documents to Mike</span>
                                            <small class="label label-primary"><i class="fa fa-clock-o"></i> 1 mins</small>
                                        </li>
                                        <li>
                                            <a href="#" class="check-link"><i class="fa fa-square-o"></i> </a>
                                            <span class="m-l-xs">Go to the doctor dr Smith</span>
                                        </li>
                                        <li>
                                            <a href="#" class="check-link"><i class="fa fa-check-square"></i> </a>
                                            <span class="m-l-xs todo-completed">Plan vacation</span>
                                        </li>
                                        <li>
                                            <a href="#" class="check-link"><i class="fa fa-square-o"></i> </a>
                                            <span class="m-l-xs">Create new stuff</span>
                                        </li>
                                        <li>
                                            <a href="#" class="check-link"><i class="fa fa-square-o"></i> </a>
                                            <span class="m-l-xs">Call to Anna for dinner</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
@endsection
@section('script')
    <script src="{{ asset('js/plugins/flot/jquery.flot.js') }}"></script>
    <script src="{{ asset('js/plugins/flot/jquery.flot.tooltip.min.js') }}"></script>
    <script src="{{ asset('js/plugins/flot/jquery.flot.spline.js') }}"></script>
    <script src="{{ asset('js/plugins/flot/jquery.flot.resize.js') }}"></script>
    <script src="{{ asset('js/plugins/flot/jquery.flot.pie.js') }}"></script>
    <script src="{{ asset('js/plugins/flot/jquery.flot.symbol.js') }}"></script>
    <script src="{{ asset('js/plugins/flot/jquery.flot.time.js') }}"></script>

    <script>
        $(document).ready(function() {

            var data2 = [
                [gd(2012, 1, 1), 7], [gd(2012, 1, 2), 6], [gd(2012, 1, 3), 4], [gd(2012, 1, 4), 8],
                [gd(2012, 1, 5), 9], [gd(2012, 1, 6), 7], [gd(2012, 1, 7), 5], [gd(2012, 1, 8), 4],
                [gd(2012, 1, 9), 7], [gd(2012, 1, 10), 8], [gd(2012, 1, 11), 9], [gd(2012, 1, 12), 6],
                [gd(2012, 1, 13), 4], [gd(2012, 1, 14), 5], [gd(2012, 1, 15), 11], [gd(2012, 1, 16), 8],
                [gd(2012, 1, 17), 8], [gd(2012, 1, 18), 11], [gd(2012, 1, 19), 11], [gd(2012, 1, 20), 6],
                [gd(2012, 1, 21), 6], [gd(2012, 1, 22), 8], [gd(2012, 1, 23), 11], [gd(2012, 1, 24), 13],
                [gd(2012, 1, 25), 7], [gd(2012, 1, 26), 9], [gd(2012, 1, 27), 9], [gd(2012, 1, 28), 8],
                [gd(2012, 1, 29), 5], [gd(2012, 1, 30), 8], [gd(2012, 1, 31), 25]
            ];

            var data3 = [
                [gd(2012, 1, 1), 800], [gd(2012, 1, 2), 500], [gd(2012, 1, 3), 600], [gd(2012, 1, 4), 700],
                [gd(2012, 1, 5), 500], [gd(2012, 1, 6), 456], [gd(2012, 1, 7), 800], [gd(2012, 1, 8), 589],
                [gd(2012, 1, 9), 467], [gd(2012, 1, 10), 876], [gd(2012, 1, 11), 689], [gd(2012, 1, 12), 700],
                [gd(2012, 1, 13), 500], [gd(2012, 1, 14), 600], [gd(2012, 1, 15), 700], [gd(2012, 1, 16), 786],
                [gd(2012, 1, 17), 345], [gd(2012, 1, 18), 888], [gd(2012, 1, 19), 888], [gd(2012, 1, 20), 888],
                [gd(2012, 1, 21), 987], [gd(2012, 1, 22), 444], [gd(2012, 1, 23), 999], [gd(2012, 1, 24), 567],
                [gd(2012, 1, 25), 786], [gd(2012, 1, 26), 666], [gd(2012, 1, 27), 888], [gd(2012, 1, 28), 900],
                [gd(2012, 1, 29), 178], [gd(2012, 1, 30), 555], [gd(2012, 1, 31), 993]
            ];

            var dataset = [
                {
                    label: "Number of Turns",
                    data: data3,
                    color: "#1ab394",
                    bars: {
                        show: true,
                        align: "center",
                        barWidth: 24 * 60 * 60 * 600,
                        lineWidth:0
                    }

                }, {
                    label: "Payments",
                    data: data2,
                    yaxis: 2,
                    color: "#1C84C6",
                    lines: {
                        lineWidth:1,
                        show: true,
                        fill: true,
                        fillColor: {
                            colors: [{
                                opacity: 0.2
                            }, {
                                opacity: 0.4
                            }]
                        }
                    },
                    splines: {
                        show: false,
                        tension: 0.6,
                        lineWidth: 1,
                        fill: 0.1
                    },
                }
            ];

            var options = {
                xaxis: {
                    mode: "time",
                    tickSize: [3, "day"],
                    tickLength: 0,
                    axisLabel: "Date",
                    axisLabelUseCanvas: true,
                    axisLabelFontSizePixels: 12,
                    axisLabelFontFamily: 'Arial',
                    axisLabelPadding: 10,
                    color: "#d5d5d5"
                },
                yaxes: [{
                    position: "left",
                    max: 1070,
                    color: "#d5d5d5",
                    axisLabelUseCanvas: true,
                    axisLabelFontSizePixels: 12,
                    axisLabelFontFamily: 'Arial',
                    axisLabelPadding: 3
                }, {
                    position: "right",
                    clolor: "#d5d5d5",
                    axisLabelUseCanvas: true,
                    axisLabelFontSizePixels: 12,
                    axisLabelFontFamily: ' Arial',
                    axisLabelPadding: 67
                }
                ],
                legend: {
                    noColumns: 1,
                    labelBoxBorderColor: "#000000",
                    position: "nw"
                },
                grid: {
                    hoverable: false,
                    borderWidth: 0
                }
            };

            $.plot($("#flot-dashboard-chart"), dataset, options);
        });

        function gd(year, month, day) {
            return new Date(year, month - 1, day).getTime();
        }
    </script>
@endsection