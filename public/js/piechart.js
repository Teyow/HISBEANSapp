var DrinkOnly;
(function ($) {
    $(document).ready(function () {
        var name = Object.keys(drinkQuantity);
        var quantity = Object.values(drinkQuantity);

        var sample = document.getElementById("DrinkOnlyChart");
        DrinkOnly.ChartData(sample, "doughnut", name, quantity);
    });
    //    linebarChart CHART Monthly Sale Status
    DrinkOnly = {
        ChartData: function (sample, type, name, quantity) {
            new Chart(sample, {
                type: type,
                data: {
                    labels: name,
                    datasets: [
                        {
                            label: "Monthly Sale Status",
                            data: quantity,

                            backgroundColor: [
                                "rgb(2, 99, 132)",
                                "rgb(54, 162, 235)",
                                "rgb(255, 205, 86)",
                                "rgb(23, 205, 86)",
                                "rgb(75 , 34, 86)",
                                "rgb(97, 205, 86)",
                                "rgb(122, 205, 86)",
                                "rgb(40, 205, 86)",
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
