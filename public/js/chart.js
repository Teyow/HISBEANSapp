var LineChartHomePageTodaysQuantity;
(function ($) {
    $(document).ready(function () {
        var name = Object.keys(sample2);
        var quantity = Object.values(sample2);
        var data = Object.values(sampleq2);
        // var category_name = Object.keys($sampleqpie2);
        // var category_quantity = Object.values($sampleqpie2)

        var ctx = document.getElementById("linebarChart1");
        LineChartHomePageTodaysQuantity.ChartData(
            ctx,
            "bar",
            name,
            data,
            quantity
        );
    });
    //    linebarChart CHART Monthly Sale Status
    LineChartHomePageTodaysQuantity = {
        ChartData: function (ctx, type, name, data, quantity) {
            new Chart(ctx, {
                type: type,
                data: {
                    labels: name,
                    datasets: [
                        {
                            label: "Product Sales",
                            data: quantity,
                            backgroundColor: "rgba(255, 99, 132, 0.2)", // Customize the colors
                            borderColor: "rgba(255, 99, 132, 1)",
                            borderWidth: 1,
                        },
                        {
                            label: "Products sold by Quantity ",
                            data: data,
                            backgroundColor: "rgba(15, 99, 132, 0.2)", // Customize the colors
                            borderColor: "rgba(15, 99, 132, 1)",
                            borderWidth: 1,
                        },
                    ],
                },

                options: {
                    indexAxis: "y",
                },
            });
        },
    };
})(jQuery);

var monthlyChart;
(function ($) {
    $(document).ready(function () {
        var name = Object.keys(monthlyChartQuantity);
        var quantity = Object.values(monthlyChartQuantity);
        var data = Object.values(monthlyChartName);
        // var category_name = Object.keys($sampleqpie2);
        // var category_quantity = Object.values($sampleqpie2)

        var ctx = document.getElementById("lineChart2");
        monthlyChart.ChartData(ctx, "bar", name, data, quantity);
    });
    //    linebarChart CHART Monthly Sale Status
    monthlyChart = {
        ChartData: function (ctx, type, name, data, quantity) {
            new Chart(ctx, {
                type: type,
                data: {
                    labels: name,
                    datasets: [
                        {
                            label: "Product Sales",
                            data: quantity,
                            backgroundColor: "rgba(255, 99, 132, 0.2)", // Customize the colors
                            borderColor: "rgba(255, 99, 132, 1)",
                            borderWidth: 1,
                        },
                        {
                            label: "Products sold by Quantity ",
                            data: data,
                            backgroundColor: "rgba(15, 99, 132, 0.2)", // Customize the colors
                            borderColor: "rgba(15, 99, 132, 1)",
                            borderWidth: 1,
                        },
                    ],
                },

                options: {
                    indexAxis: "y",
                },
            });
        },
    };
})(jQuery);

var yearlyChart;
(function ($) {
    $(document).ready(function () {
        var name = Object.keys(yearlyChartQuantity);
        var quantity = Object.values(yearlyChartQuantity);
        var data = Object.values(yearlyChartName);
        // var category_name = Object.keys($sampleqpie2);
        // var category_quantity = Object.values($sampleqpie2)

        var ctx = document.getElementById("lineChart3");
        yearlyChart.ChartData(ctx, "bar", name, data, quantity);
    });
    //    linebarChart CHART Monthly Sale Status
    yearlyChart = {
        ChartData: function (ctx, type, name, data, quantity) {
            new Chart(ctx, {
                type: type,
                data: {
                    labels: name,
                    datasets: [
                        {
                            label: "Product Sales",
                            data: quantity,
                            backgroundColor: "rgba(255, 99, 132, 0.2)", // Customize the colors
                            borderColor: "rgba(255, 99, 132, 1)",
                            borderWidth: 1,
                        },
                        {
                            label: "Products sold by Quantity ",
                            data: data,
                            backgroundColor: "rgba(15, 99, 132, 0.2)", // Customize the colors
                            borderColor: "rgba(15, 99, 132, 1)",
                            borderWidth: 1,
                        },
                    ],
                },

                options: {
                    indexAxis: "y",
                },
            });
        },
    };
})(jQuery);

var pieChart;
(function ($) {
    $(document).ready(function () {
        var name = Object.keys(sampleqpie2);
        var quantity = Object.values(sampleqpie2);
        var data = Object.values(sampleq2);
        // var category_name = Object.keys($sampleqpie2);
        // var category_quantity = Object.values($sampleqpie2)

        var doughChart1s = document.getElementById("doughChart1s");
        pieChart.ChartData(doughChart1s, "doughnut", name, data, quantity);
    });
    //    linebarChart CHART Monthly Sale Status
    pieChart = {
        ChartData: function (ctx, type, name, data, quantity) {
            new Chart(ctx, {
                type: type,
                data: {
                    labels: name,
                    datasets: [
                        {
                            label: "Product Sales",
                            data: quantity,
                            backgroundColor: [
                                "rgb(255, 99, 132)",
                                "rgb(54, 162, 235)",
                                "rgb(255, 205, 86)",
                                "rgb(23, 205, 86)",
                                "rgb(75 , 34, 86)",
                                "rgb(97, 205, 86)",
                                "rgb(122, 205, 86)",
                                "rgb(355, 205, 86)",
                            ],
                            borderColor: "rgba(2, 99, 132, 1)",
                            borderWidth: 1,
                        },
                    ],
                },

                options: {
                    indexAxis: "y",
                },
            });
        },
    };
})(jQuery);
