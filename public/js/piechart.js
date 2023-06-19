var chart2;
(function ($) {
    $(document).ready(function () {
        // var name = Object.keys(sample2);
        // var quantity = Object.values(sample2);
        // var data = Object.values(sampleq2);
        var ctx1 = document.getElementById("pieChart1").getContext("2d");
        chart2.ChartData(ctx1, "doughnut", name, data, quantity);
    });
    //    linebarChart CHART Monthly Sale Status
    chart2 = {
        ChartData: function (ctx1, type, name, data, quantity) {
            new Chart(ctx1, {
                type: "doughnut",
                data: {
                    labels: [
                        "COFFEE",
                        "NON-COFFEE",
                        "HIBEANCCINO",
                        "BREWED TEA",
                        "ADE",
                        "PARTIES",
                        "PASTA",
                    ],
                    datasets: [
                        {
                            label: "Monthly Sale Status",
                            data: [6, 1, 3, 5, 2, 3, 1],
                            borderWidth: 1,
                        },
                    ],
                },
            });
        },
    };
})(jQuery);
