@extends('layouts.main')

@section('pagecontent')
    <div class="container  h-screen">
        <div class="row justify-content-center">
            <legend class="text-4xl text-black text-center pt-10">DASHBOARD</legend>
        </div>

        <ul class="flex justify-center items-center uk-subnav uk-subnav-pill" uk-switcher>
            <li><a href="#">Day</a></li>
            <li><a href="#">Month</a></li>
            <li><a href="#">Year</a></li>
        </ul>

        <ul class="uk-switcher uk-margin">
            {{-- DAY --}}
            <li>
                <div class="grid grid-cols-3 pt-1">

                    <div class="col-span-1">
                        <div class="uk-card uk-card-default uk-card-body ml-5 mr-5 text-center rounded-xl">
                            <h3 class="uk-card-title text-xl">Total Orders</h3>
                            <p class="text-4xl text-black">{{ $order }}</p>
                        </div>
                    </div>
                    <div class="col-span-1">
                        <div class="uk-card uk-card-default uk-card-body ml-5 mr-5 text-center rounded-xl">
                            <h3 class="uk-card-title text-xl">Total Customers</h3>
                            <p class="text-4xl text-black">{{ $sale }}</p>
                        </div>
                    </div>
                    <div class="col-span-1">
                        <div class="uk-card uk-card-default uk-card-body ml-5 mr-5 text-center rounded-xl">
                            <h3 class="uk-card-title text-xl">Total Revenue</h3>
                            <p class="text-4xl text-black">₱{{ $total }}</p>
                        </div>
                    </div>
                </div>
            </li>
            {{-- MONTH --}}
            <li>
                <div class="grid grid-cols-3 pt-1">

                    <div class="col-span-1">
                        <div class="uk-card uk-card-default uk-card-body ml-5 mr-5 text-center rounded-xl">
                            <h3 class="uk-card-title text-xl">Total Orders</h3>
                            <p class="text-4xl text-black"></p>
                        </div>
                    </div>
                    <div class="col-span-1">
                        <div class="uk-card uk-card-default uk-card-body ml-5 mr-5 text-center rounded-xl">
                            <h3 class="uk-card-title text-xl">Total Customers</h3>
                            <p class="text-4xl text-black"></p>
                        </div>
                    </div>
                    <div class="col-span-1">
                        <div class="uk-card uk-card-default uk-card-body ml-5 mr-5 text-center rounded-xl">
                            <h3 class="uk-card-title text-xl">Total Revenue</h3>
                            <p class="text-4xl text-black">₱</p>
                        </div>
                    </div>
                </div>
            </li>
            {{-- YEAR --}}
            <li>
                <div class="grid grid-cols-3 pt-1">

                    <div class="col-span-1">
                        <div class="uk-card uk-card-default uk-card-body ml-5 mr-5 text-center rounded-xl">
                            <h3 class="uk-card-title text-xl">Total Orders</h3>
                            <p class="text-4xl text-black">{{ $order }}</p>
                        </div>
                    </div>
                    <div class="col-span-1">
                        <div class="uk-card uk-card-default uk-card-body ml-5 mr-5 text-center rounded-xl">
                            <h3 class="uk-card-title text-xl">Total Customers</h3>
                            <p class="text-4xl text-black">{{ $sale }}</p>
                        </div>
                    </div>
                    <div class="col-span-1">
                        <div class="uk-card uk-card-default uk-card-body ml-5 mr-5 text-center rounded-xl">
                            <h3 class="uk-card-title text-xl">Total Revenue</h3>
                            <p class="text-4xl text-black">₱{{ $total }}</p>
                        </div>
                    </div>
                </div>
            </li>
        </ul>




        <div class="">
            <ul class="flex justify-center items-center uk-subnav uk-subnav-pill" uk-switcher>
                <li><a href="#">Day</a></li>
                <li><a href="#">Month</a></li>
                <li><a href="#">Year</a></li>

            </ul>

            <ul class="uk-switcher uk-margin">
                {{-- day --}}
                <li>

                    <div class="uk-card uk-card-default uk-card-body rounded-3xl ml-20 mr-20 "
                        style="background: rgb(255, 255, 255)">
                        <legend class="text-center text-black pt-2 ">Top 10 Products Today</legend>
                        <canvas id="linebarChart1" style="height: 2px; width: 9px"></canvas>
                    </div>


                </li>

                {{-- month --}}
                <li>
                    <div class="uk-card uk-card-default uk-card-body  rounded-3xl ml-20 mr-20"
                        style="background: rgb(255, 255, 255)">
                        <legend class="text-center text-black pt-2">Top 10 Products this Month</legend>
                        <canvas id="myChart" style="height: 2px; width: 9px"></canvas>
                    </div>

                </li>

                {{-- year --}}
                <li>
                    <div class="uk-card uk-card-default uk-card-body  rounded-3xl ml-20 mr-20"
                        style="background: rgb(255, 255, 255)">
                        <legend class="text-center text-black pt-2">Top 10 Products this Year</legend>
                        <canvas id="linebarChart2" style="height: 2px; width: 9px"></canvas>
                    </div>

                </li>


        </div>
        <script>
            var sample2 = @json($sample2);
            var sampleq2 = @json($sampleq2);
        </script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script src="{{ asset('js/chart.js') }}"></script>


        <script>
            // Assuming you have your dataset with timestamps and values
            var dataset = [{
                    timestamp: '2023-06-16 10:00:00',
                    value: 10
                },
                {
                    timestamp: '2023-06-17 14:00:00',
                    value: 15
                },
                {
                    timestamp: '2023-06-18 09:00:00',
                    value: 20
                },
                // ... more data
            ];

            // Filter by day, month, or year
            var filteredData = dataset.filter(function(data) {
                var timestamp = new Date(data.timestamp);
                // Filter by day
                return timestamp.getDate() === 16;

                // Filter by month
                return timestamp.getMonth() === 5; // Note: JavaScript months are zero-based (0-11)

                // Filter by year
                return timestamp.getFullYear() === 2023;
            });

            // Extract timestamps and values from filtered data
            var labels = filteredData.map(function(data) {
                return data.timestamp;
            });

            var values = filteredData.map(function(data) {
                return data.value;
            });

            // Pass the filtered data to Chart.js
            var ctx = document.getElementById('myChart').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Data',
                        data: values,
                        backgroundColor: 'rgba(0, 123, 255, 0.6)' // Replace with your desired background color
                    }]
                },
                options: {
                    // Configure chart options as needed
                }
            });
        </script>

    </div>
    </div>
@endsection
