var barchart;
(function ($) {
    $(document).ready(function () {
        var name = Object.values(dates);
        var quantity = Object.values(dates);
        var linebarChart = document.getElementById("monthlysales");
        barchart.ChartData(linebarChart, "bar", name, quantity);
    });

    barchart = {
        ChartData: function (linebarChart, name, quantity) {
            new Chart(linebarChart, {
                type: "bar",
                data: {
                    labels: quantity,
                    datasets: [
                        {
                            label: "Total Quantity of Product Sold",
                            data: quantity,
                            borderWidth: 1,
                            backgroundColor: "rgba(255, 99, 132, 0.2)",
                        },
                        {
                            type: "line",
                            label: "Total Sales",
                            data: ["1", "2", "3"],
                            fill: false,
                            borderColor: "rgb(54, 162, 235)",
                        },
                    ],
                },
                options: {
                    scales: {
                        x: {
                            type: "time",
                            time: {
                                unit: "day",
                            },
                        },
                        y: {
                            beginAtZero: true,
                        },
                    },
                },
            });
        },
    };
})(jQuery);
