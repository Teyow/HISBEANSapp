@extends('layouts.main')

@section('pagecontent')
    <style>
        div.a {
            height: 580px;

            overflow: auto;
        }
    </style>
    <div class=" pb-20">
        <div class="row justify-content-center ">

            <div class="uk-card  uk-card-body ">
                <ul class="uk-subnav uk-subnav-pill flex justify-center items-center" uk-switcher>
                    <li><a href="#">Sales Dashboard</a></li>
                    <li><a href="#">Sales Report</a></li>

                </ul>

                <ul class="uk-switcher uk-margin">
                    <li>
                        <div class="grid grid-cols-8 pb-5">
                            <div class="col-span-5 pb-5 ">
                                <div class="uk-card uk-card-default uk-card-body mr-2 rounded-3xl ">
                                    <div>
                                        <legend class="text-center text-black">Monthly Sale Status</legend>
                                        {{-- MONTHLY SALES --}}
                                        <canvas id="linebarChart23" style="height: 20px" width="60px"></canvas>

                                    </div>

                                </div>
                                <div class=" mt-5">
                                    <div class="">
                                        <div class="uk-card uk-card-default uk-card-body mr-4 rounded-3xl">
                                            <div>
                                                <legend class="text-center text-black">Sales Analysis Index</legend>
                                                <div class="grid grid-cols-3">
                                                    <div class="col-span-1 pt-10">

                                                        {{-- SALES ANALYSIS INDEX --}}
                                                        <canvas id="doughChart1s"></canvas>
                                                        <legend class="text-center text-black  pt-2">All
                                                            Product Type
                                                        </legend>
                                                    </div>
                                                    <div class="col-span-1">
                                                        {{-- SALES ANALYSIS INDEX --}}
                                                        <canvas id="DrinkOnlyChart"></canvas>
                                                        <legend class="text-center text-black pt-2">Drinks Only Sales
                                                        </legend>
                                                    </div>
                                                    <div class="col-span-1 pt-10">
                                                        {{-- SALES ANALYSIS INDEX --}}
                                                        <canvas id="samplesample"></canvas>
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
                                                            <div class="text-black">₱{{ $weekdays }}</div>
                                                            <div class="text-black">₱{{ $weekends }}</div>
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


                                <div class="uk-card uk-card-default uk-card-body ml-2 rounded-3xl ">
                                    <legend class="text-center text-black pt-2">Top 10 Products</legend>
                                    <canvas id="linebarChart1" style="height: 13px; width: 20px"></canvas>
                                </div>

                            </div>
                        </div>
                    </li>

                    <div class="uk-card uk-card-default uk-card-body mt-10  rounded-xl ">
                        <div class="a">
                            <table id="users_table" class="uk-table uk-table-hover uk-table-striped ">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Product Code</th>
                                        <th>Product Name</th>
                                        <th>Product Type</th>
                                        <th>Total Quantity</th>
                                        <th>Price</th>
                                        <th>Gross Sale</th>
                                        <th>Reg %</th>
                                        <th>Senior %</th>
                                        <th>PWD %</th>
                                        <th>Total Sale</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($orders as $order)
                                        <tr>

                                            <td>{{ $order->created_at }}</td>

                                            <td>{{ $order->menu_id }}</td>
                                            <td>{{ $order->drink_name }}</td>
                                            <td>{{ $order->category }}</td>
                                            <td>{{ $order->drink_quantity }}</td>
                                            <td>{{ $order->drink_price }}</td>
                                            <td>{{ $order->drink_price }}</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>{{ $order->drink_price }}</td>



                                        </tr>

                                    @empty
                                        <tr>
                                            <td colspan="5" class="text-center">No Data yet</td>
                                        </tr>
                                    @endforelse
                                    <script>
                                        $(document).ready(function() {
                                            $('#users_table').DataTable({
                                                dom: "Bfrltip",
                                                lengthMenu: [1, 5, 10, 20, 50],
                                                pageLength: 5,
                                            });
                                        });
                                    </script>


                                </tbody>

                            </table>
                        </div>
                    </div>
                    </li>

                </ul>



            </div>


        </div>
    </div>





    {{-- linebarChart CHART Monthly Sale Status --}}
    <script>
        const linebarChart23 = document.getElementById('linebarChart23');
        let month = {!! json_encode($month) !!};
        let total_sold = {!! json_encode($total_sold) !!};
        let total_sales = {!! json_encode($total_sales) !!};



        new Chart(linebarChart23, {
            type: 'bar',
            data: {
                labels: month,
                datasets: [{
                    label: 'Total Quantity of Product Sold',
                    data: total_sold,
                    borderWidth: 1,
                    borderColor: 'rgb(54, 162, 235)',
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',

                    ],

                }, {
                    type: 'line',
                    label: 'Total Sales',
                    data: total_sales,
                    fill: false,
                    borderColor: 'rgb(54, 162, 235)',
                    backgroundColor: 'rgb(42, 234, 123)'
                }]
            },
            options: {
                scales: {
                    // x: {
                    //     type: 'time',
                    //     time: {
                    //         unit: 'day'
                    //     }
                    // },
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
    {{-- <script>
        function filterChart(this) {
            console.log(month.value)
        }
    </script> --}}

    {{-- Doughnut2 CHART SALES ANALYSIS INDEX --}}
    {{-- <script>
        const doughChart2 = document.getElementById('doughChart2');
        let name = {!! json_encode($drinkQuantity) !!};

        new Chart(doughChart2, {
            type: 'doughnut',
            data: {
                labels: name,
                datasets: [{
                    label: 'Monthly Sale Status',
                    data: [6, 1, 3, 5, 2],
                    borderWidth: 1
                }]
            },

        });
    </script> --}}


    {{-- Doughnut2 CHART SALES ANALYSIS INDEX --}}
    <script>
        const doughChart3 = document.getElementById('samplesample');

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

    <script>
        var sample2 = @json($sample2);
        var sampleq2 = @json($sampleq2);
        var sampleqpie2 = @json($sampleqpie2);
        var drinks = @json($drinks);
        var drinkQuantity = @json($drinkQuantity);
    </script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="{{ asset('/js/chart.js') }}"></script>
    <script src="{{ asset('/js/piechart.js') }}"></script>
    <script src="{{ asset('/js/barchart.js') }}"></script>
@endsection
