@extends('layouts.main')

@section('pagecontent')
    <div class="container">
        <div class="row justify-content-center">
            <legend class="text-4xl text-black text-center">SALES</legend>
            <div class="uk-card uk-card-default uk-card-body">
                <div class="text-center  w-full">
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
                </div>
            </div>

            <script>
                $(document).ready(function() {
                    $('#users_table').DataTable();
                });
            </script>
        </div>
    </div>

    </div>
    </div>

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
    </script>
@endsection
