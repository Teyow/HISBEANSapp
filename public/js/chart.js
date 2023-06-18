var sampleChartClass;
(function ($) {
    $(document).ready(function () {
        var name = Object.keys(sample2);
        var quantity = Object.values(sample2);
        var data = Object.values(sampleq2);
        var ctx = document.getElementById("linebarChart1").getContext("2d");
        sampleChartClass.ChartData(ctx, "bar", name, data, quantity);
    });
    //    linebarChart CHART Monthly Sale Status
    sampleChartClass = {
        ChartData: function (ctx, type, name, data, quantity) {
            new Chart(ctx, {
                type: "bar",
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
