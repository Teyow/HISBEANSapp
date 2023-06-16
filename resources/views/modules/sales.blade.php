@extends('layouts.main')

@section('pagecontent')
    <div class="container pb-20" style="background: rgb(238, 238, 238)">
        <div class="row justify-content-center ">

            <div class="uk-card uk-card-default uk-card-body " style="background: rgb(238, 238, 238)">
                <ul class="uk-subnav uk-subnav-pill flex justify-center items-center" uk-switcher>
                    <li><a href="#">Sales Dashboard</a></li>
                    <li><a href="#">POS Report</a></li>

                </ul>

                <ul class="uk-switcher uk-margin">
                    <li>
                        <div class="grid grid-cols-8 pb-5">
                            <div class="col-span-5 pb-5 ">
                                <div class="uk-card uk-card-default uk-card-body mr-2 rounded-3xl "
                                    style="background: rgb(255, 255, 255)">
                                    <div>
                                        <legend class="text-center text-black">Monthly Sale Status</legend>
                                        {{-- MONTHLY SALES --}}
                                        <canvas id="linebarChart" style="height: 80px"></canvas>
                                    </div>

                                </div>
                                <div class=" mt-5">
                                    <div class="">
                                        <div class="uk-card uk-card-default uk-card-body mr-4 rounded-3xl"
                                            style="background: rgb(255, 255, 255)">
                                            <div>
                                                <legend class="text-center text-black">Sales Analysis Index</legend>
                                                <div class="grid grid-cols-3">
                                                    <div class="col-span-1 pt-10">

                                                        {{-- SALES ANALYSIS INDEX --}}
                                                        <canvas id="doughChart1"></canvas>
                                                        <legend class="text-center text-black  pt-2">All
                                                            Product Type
                                                        </legend>
                                                    </div>
                                                    <div class="col-span-1">
                                                        {{-- SALES ANALYSIS INDEX --}}
                                                        <canvas id="doughChart2"></canvas>
                                                        <legend class="text-center text-black pt-2">Drinks Only Sales
                                                        </legend>
                                                    </div>
                                                    <div class="col-span-1 pt-10">
                                                        {{-- SALES ANALYSIS INDEX --}}
                                                        <canvas id="doughChart3"></canvas>
                                                        <legend class="text-center text-black pt-2">By Sales Type</legend>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="grid grid-cols-2 pt-5 text-center">
                                                <div class="col-span-1 ">
                                                    <div class="grid grid-cols-2">
                                                        <div class="col-span-1">
                                                            <div class="">Total Sales:</div>
                                                            <div class="">Weekdays</div>
                                                            <div class="">Weekends/Holiday</div>
                                                        </div>
                                                        <div class="col-span-1">
                                                            <div class="text-black">₱{{ $total }}</div>
                                                            <div class="">P5464</div>
                                                            <div class="">P5464</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-span-1 ">
                                                    <div class="grid grid-cols-2">
                                                        <div class="col-span-1">
                                                            <div class="">Sales Quantity:</div>
                                                            <div class=""># of Customers</div>
                                                        </div>
                                                        <div class="col-span-1">
                                                            <div class="text-black">{{ $order_quantity }}</div>
                                                            <div class="text-black">{{ $data }}</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="col-span-3">
                                <div class="grid grid-rows-2">
                                    <div class="row-span-1">
                                        <div class="uk-card uk-card-default uk-card-body ml-2 rounded-3xl "
                                            style="background: rgb(255, 255, 255)">
                                            <legend class="text-center text-black pt-2">Top 10 Products sold</legend>
                                            <canvas id="horizontalbarChartSales" style="height: 10px; width: 14px"></canvas>
                                        </div>
                                    </div>
                                    <div class="row-span-1">
                                        <div class="uk-card uk-card-default uk-card-body ml-2 rounded-3xl mt-2"
                                            style="background: rgb(255, 255, 255)">
                                            <legend class="text-center text-black pt-2">Top 10 Products sold by Quantity
                                            </legend>
                                            <canvas id="horizontalbarChartQuantity"
                                                style="height: 10px; width: 14px"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>Hello again!</li>

                </ul>

                {{-- linebarChart CHART Monthly Sale Status --}}
                <script>
                    const linebarChart = document.getElementById('linebarChart').getContext('2d');


                    new Chart(linebarChart, {
                        type: 'bar',
                        data: {
                            labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September',
                                'October',
                                'November', 'December'
                            ],
                            datasets: [{
                                label: 'Total Quantity of Product Sold',
                                data: [{{ $order_quantity }}],
                                borderWidth: 1,
                                backgroundColor: [
                                    'rgba(255, 99, 132, 0.2)',

                                ],

                            }, {
                                type: 'line',
                                label: 'Total Sales',
                                data: [{{ $data }}],
                                fill: false,
                                borderColor: 'rgb(54, 162, 235)'
                            }]
                        },
                        options: {
                            scales: {

                                y: {
                                    beginAtZero: true
                                }
                            }
                        }
                    });
                </script>

                {{-- Doughnut1 CHART SALES ANALYSIS INDEX --}}
                <script>
                    const doughChart1 = document.getElementById('doughChart1');

                    new Chart(doughChart1, {
                        type: 'doughnut',
                        data: {
                            labels: ['COFFEE', 'NON-COFFEE', 'HIBEANCCINO', 'BREWED TEA', 'ADE', 'PARTIES', 'PASTA'],
                            datasets: [{
                                label: 'Monthly Sale Status',
                                data: [6, 1, 3, 5, 2, 3, 1],
                                borderWidth: 1
                            }]
                        },

                    });
                </script>

                {{-- Doughnut2 CHART SALES ANALYSIS INDEX --}}
                <script>
                    const doughChart2 = document.getElementById('doughChart2');

                    new Chart(doughChart2, {
                        type: 'doughnut',
                        data: {
                            labels: ['COFFEE', 'NON-COFFEE', 'HIBEANCCINO', 'BREWED TEA', 'ADE'],
                            datasets: [{
                                label: 'Monthly Sale Status',
                                data: [6, 1, 3, 5, 2],
                                borderWidth: 1
                            }]
                        },

                    });
                </script>


                {{-- Doughnut2 CHART SALES ANALYSIS INDEX --}}
                <script>
                    const doughChart3 = document.getElementById('doughChart3');

                    new Chart(doughChart3, {
                        type: 'doughnut',
                        data: {
                            labels: ['GENERAL SALES', 'SENIOR DISCOUNT', 'PWD DISCOUNT'],
                            datasets: [{
                                label: 'Monthly Sale Status',
                                data: [6, 1, 3],
                                borderWidth: 1
                            }]
                        },

                    });
                </script>


                {{-- horizontalbarChartSales1 --}}
                <script>
                    const horizontalbarChartSales = document.getElementById('horizontalbarChartSales');

                    new Chart(horizontalbarChartSales, {
                        type: 'bar',
                        data: {
                            labels: ['1', '2', '3', '4', '5', '6', '7', '8', '9',
                                '10',

                            ],
                            datasets: [{
                                label: 'Total Sales',
                                data: [6, 1, 3, 5, 2, 3],
                                borderWidth: 1,
                                backgroundColor: [
                                    '#23442b',

                                ],
                            }]
                        },

                        options: {
                            indexAxis: 'y',

                        }


                    });
                </script>



                {{-- horizontalbarChartSales2 --}}
                <script>
                    const horizontalbarChartQuantity = document.getElementById('horizontalbarChartQuantity');

                    new Chart(horizontalbarChartQuantity, {
                        type: 'bar',
                        data: {
                            labels: ['1', '2', '3', '4', '5', '6', '7', '8', '9',
                                '10',

                            ],
                            datasets: [{
                                label: 'Total Quantity Sold',
                                data: [6, 1, 3, 5, 2, 3],
                                borderWidth: 1,
                                backgroundColor: [
                                    '#f15a38',

                                ],
                            }]
                        },
                        options: {
                            indexAxis: 'y',

                        }


                    });
                </script>



                {{-- <div class="text-center  w-full">
                    <legend class="text-2xl text-black pb-5">Year 2022-2023 </legend>
                    <canvas id="myChart"></canvas>
                </div>
                <div class="">
                    <table id="users_table" class="uk-table uk-table-hover uk-table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>Order #</th>
                                <th>Order</th>
                                <th>Staff</th>
                                <th>Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>12255</td>
                                <td>1 Cappoccino</td>
                                <td>Theo</td>
                                <td>160</td>
                            </tr>


                        </tbody>

                    </table>
                </div> --}}
            </div>

            {{-- <script>
                $(document).ready(function() {
                    $('#users_table').DataTable();
                });
            </script> --}}
        </div>
    </div>

    {{--
    <script>
        const ctx = document.getElementById("myChart").getContext("2d");
        const labels = [
            "January", "Febuary", "March", "April", "May", "June"
        ]
        @isset($graphData['label'])
            const myChart = new Chart(ctx, {
                type: "bar",
                data: {
                    labels: {!! json_encode($graphData['label']) !!},
                    datasets: [{
                        label: "# of Attendances",
                        data: {!! json_encode($graphData['data']) !!},
                        backgroundColor: [
                            "rgba(255, 99, 132, 0.2)",
                            "rgba(54, 162, 235, 0.2)",
                            "rgba(255, 206, 86, 0.2)",
                            "rgba(75, 192, 192, 0.2)",
                            "rgba(153, 102, 255, 0.2)",
                            "rgba(255, 159, 64, 0.2)",
                        ],
                        borderColor: [
                            "rgba(255, 99, 132, 1)",
                            "rgba(54, 162, 235, 1)",
                            "rgba(255, 206, 86, 1)",
                            "rgba(75, 192, 192, 1)",
                            "rgba(153, 102, 255, 1)",
                            "rgba(255, 159, 64, 1)",
                        ],
                        borderWidth: 1,
                    }, ],
                },
                options: {
                    responsive: true,
                },
            });
        @else
            const myChart = new Chart(ctx, {
                type: "bar",
                data: {
                    labels: labels,
                    datasets: [{
                        label: "# of Attendances",
                        data: [0, 0, 0, 0, 0, 0],
                        backgroundColor: [
                            "rgba(255, 99, 132, 0.2)",
                            "rgba(54, 162, 235, 0.2)",
                            "rgba(255, 206, 86, 0.2)",
                            "rgba(75, 192, 192, 0.2)",
                            "rgba(153, 102, 255, 0.2)",
                            "rgba(255, 159, 64, 0.2)",
                        ],
                        borderColor: [
                            "rgba(255, 99, 132, 1)",
                            "rgba(54, 162, 235, 1)",
                            "rgba(255, 206, 86, 1)",
                            "rgba(75, 192, 192, 1)",
                            "rgba(153, 102, 255, 1)",
                            "rgba(255, 159, 64, 1)",
                        ],
                        borderWidth: 1,
                    }, ],
                },
                options: {
                    responsive: true,
                },
            });
        @endisset
    </script> --}}
@endsection
