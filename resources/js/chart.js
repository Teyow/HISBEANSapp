var sampleChartClass;
(function ($) {
    $(document).ready(function () {
        var ctx = document.getElementById("linebarChart").getContext("2d");
        sampleChartClass.ChartData(ctx);
    });
    //    linebarChart CHART Monthly Sale Status
    sampleChartClass = {
        ChartData: function (ctx) {
            new Chart(ctx, {
                type: "bar",
                data: {
                    labels: [
                        "January",
                        "February",
                        "March",
                        "April",
                        "May",
                        "June",
                        "July",
                        "August",
                        "September",
                        "October",
                        "November",
                        "December",
                    ],
                    datasets: [
                        {
                            label: "Total Quantity of Product Sold",
                            data: [6, 1, 3, 5, 2, 4],
                            borderWidth: 1,
                            backgroundColor: [
                                "rgba(255, 99, 132, 0.2)",
                                "rgba(255, 159, 64, 0.2)",
                                "rgba(255, 205, 86, 0.2)",
                                "rgba(75, 192, 192, 0.2)",
                                "rgba(54, 162, 235, 0.2)",
                                "rgba(153, 102, 255, 0.2)",
                                "rgba(201, 203, 207, 0.2)",
                            ],
                        },
                        {
                            type: "line",
                            label: "Total Sales",
                            data: [1, 4, 3, 6, 1, 5, 2],
                            fill: false,
                            borderColor: "rgb(54, 162, 235)",
                        },
                    ],
                },
                options: {
                    scales: {
                        horizontal: true,
                        y: {
                            beginAtZero: true,
                        },
                    },
                },
            });
        },
    };
})(jQuery);
