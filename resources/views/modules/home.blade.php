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




        <ul class="flex justify-center items-center uk-subnav uk-subnav-pill" uk-switcher>
            <li><a href="#">Coffee</a></li>
            <li><a href="#">Non-Coffee</a></li>
            <li><a href="#">Organic Brewed Tea</a></li>
            <li><a href="#">HISBEANCCINO</a></li>
            <li><a href="#">ADE</a></li>
        </ul>

        <ul class="uk-switcher uk-margin">
            {{-- COFFEE --}}
            <li>
                <div class="grid grid-cols-2">
                    <div class="col-span-1">
                        <div class="uk-card uk-card-default uk-card-body ml-2 rounded-3xl "
                            style="background: rgb(255, 255, 255)">
                            <legend class="text-center text-black pt-2">Products sold Analysis on Coffee</legend>
                            <canvas id="horizontalbarChartSalesCoffee" style="height: 7   px; width: 14px"></canvas>
                        </div>
                    </div>
                    <div class="col-span-1">
                        <div class="uk-card uk-card-default uk-card-body ml-2 rounded-3xl mt-2"
                            style="background: rgb(255, 255, 255)">
                            <legend class="text-center text-black pt-2"> Products sold by Quantity Analysis on Coffee
                            </legend>
                            <canvas id="horizontalbarChartQuantityCoffee" style="height: 7px; width: 14px"></canvas>
                        </div>
                    </div>
                </div>
            </li>

            {{-- NON-COFFEE --}}
            <li>
                <div class="grid grid-cols-2">
                    <div class="col-span-1">
                        <div class="uk-card uk-card-default uk-card-body ml-2 rounded-3xl "
                            style="background: rgb(255, 255, 255)">
                            <legend class="text-center text-black pt-2">Products sold Analysis on Non-Coffee</legend>
                            <canvas id="horizontalbarChartSalesNonCoffee" style="height: 7   px; width: 14px"></canvas>
                        </div>
                    </div>
                    <div class="col-span-1">
                        <div class="uk-card uk-card-default uk-card-body ml-2 rounded-3xl mt-2"
                            style="background: rgb(255, 255, 255)">
                            <legend class="text-center text-black pt-2"> Products sold by Quantity Analysis on Non-Coffee
                            </legend>
                            <canvas id="horizontalbarChartQuantityNonCoffee" style="height: 7px; width: 14px"></canvas>
                        </div>
                    </div>
                </div>
            </li>

            {{-- ORGANIC BREWED TEA --}}
            <li>
                <div class="grid grid-cols-2">
                    <div class="col-span-1">
                        <div class="uk-card uk-card-default uk-card-body ml-2 rounded-3xl "
                            style="background: rgb(255, 255, 255)">
                            <legend class="text-center text-black pt-2">Products sold Analysis on Organic Brewed Tea
                            </legend>
                            <canvas id="horizontalbarChartSales" style="height: 7   px; width: 14px"></canvas>
                        </div>
                    </div>
                    <div class="col-span-1">
                        <div class="uk-card uk-card-default uk-card-body ml-2 rounded-3xl mt-2"
                            style="background: rgb(255, 255, 255)">
                            <legend class="text-center text-black pt-2"> Products sold by Quantity Analysis on Organic
                                Brewed Tea
                            </legend>
                            <canvas id="horizontalbarChartQuantity" style="height: 7px; width: 14px"></canvas>
                        </div>
                    </div>
                </div>
            </li>

            {{-- HISBEANCCINO --}}
            <li>
                <div class="grid grid-cols-2">
                    <div class="col-span-1">
                        <div class="uk-card uk-card-default uk-card-body ml-2 rounded-3xl "
                            style="background: rgb(255, 255, 255)">
                            <legend class="text-center text-black pt-2">Products sold Analysis on HISBEANCCINO</legend>
                            <canvas id="horizontalbarChartSales" style="height: 7   px; width: 14px"></canvas>
                        </div>
                    </div>
                    <div class="col-span-1">
                        <div class="uk-card uk-card-default uk-card-body ml-2 rounded-3xl mt-2"
                            style="background: rgb(255, 255, 255)">
                            <legend class="text-center text-black pt-2"> Products sold by Quantity Analysis on HISBEANCCINO
                            </legend>
                            <canvas id="horizontalbarChartQuantity" style="height: 7px; width: 14px"></canvas>
                        </div>
                    </div>
                </div>
            </li>

            {{-- ADE --}}
            <li>
                <div class="grid grid-cols-2">
                    <div class="col-span-1">
                        <div class="uk-card uk-card-default uk-card-body ml-2 rounded-3xl "
                            style="background: rgb(255, 255, 255)">
                            <legend class="text-center text-black pt-2">Products sold Analysis on ADE</legend>
                            <canvas id="horizontalbarChartSales" style="height: 7   px; width: 14px"></canvas>
                        </div>
                    </div>
                    <div class="col-span-1">
                        <div class="uk-card uk-card-default uk-card-body ml-2 rounded-3xl mt-2"
                            style="background: rgb(255, 255, 255)">
                            <legend class="text-center text-black pt-2"> Products sold by Quantity Analysis on ADE
                            </legend>
                            <canvas id="horizontalbarChartQuantity" style="height: 7px; width: 14px"></canvas>
                        </div>
                    </div>
                </div>
            </li>





            {{-- horizontalbarChartSalesCoffee --}}
            <script>
                const horizontalbarChartSales = document.getElementById('horizontalbarChartSalesCoffee');
                const americano = [{{ $americano }}];
                const cafe_latte = [{{ $cafelatte }}];
                const cappuccino = [{{ $cappuccino }}];
                const caramel_macchiato = [{{ $caramel_macchiato }}];
                const cafe_mocha = [{{ $cafe_mocha }}];
                const vanilla_latte = [{{ $vanilla_latte }}];
                const spanish_latte = [{{ $spanish_latte }}];
                const cold_brew = [{{ $cold_brew }}];
                const cold_brew_latte = [{{ $cold_brew_latte }}];
                const einispanner = [{{ $einispanner }}];
                const einispanner_latte = [{{ $einispanner_latte }}];


                new Chart(horizontalbarChartSales, {
                    type: 'bar',
                    data: {
                        labels: ['Americano', 'Cafe Latte', 'Cappuccino', 'Caramel Macchiato', 'Cafe Mocha',
                            'Vanilla Latte', 'Spanish Latte', 'Cold Brew', 'Cold Brew Latte', 'Einspanner',
                            'Einspanner Latte'
                        ],
                        datasets: [{
                                label: 'Product Sold',
                                data: [americano, cafe_latte, cappuccino, caramel_macchiato, cafe_mocha, vanilla_latte,
                                    spanish_latte, cold_brew, cold_brew_latte, einispanner, einispanner_latte,
                                ],
                                backgroundColor: 'rgba(255, 99, 132, 0.2)', // Customize the colors
                                borderColor: 'rgba(255, 99, 132, 1)',
                                borderWidth: 1
                            },


                        ]
                    },

                    options: {
                        indexAxis: 'y',

                    }


                });
            </script>



            {{-- horizontalbarChartQuantityCoffee --}}
            <script>
                const horizontalbarChartQuantity = document.getElementById('horizontalbarChartQuantityCoffee');
                const americano_quantity = [{{ $americano_quantity }}];
                const cafe_latte_quantity = [{{ $cafelatte_quantity }}];
                const cappuccino_quantity = [{{ $cappuccino_quantity }}];
                const caramel_macchiato_quantity = [{{ $caramel_macchiato_quantity }}];
                const cafe_mocha_quantity = [{{ $cafe_mocha_quantity }}];
                const vanilla_latte_quantity = [{{ $vanilla_latte_quantity }}];
                const spanish_latte_quantity = [{{ $spanish_latte_quantity }}];
                const cold_brew_quantity = [{{ $cold_brew_quantity }}];
                const cold_brew_latte_quantity = [{{ $cold_brew_latte_quantity }}];
                const einispanner_quantity = [{{ $einispanner_quantity }}];
                const einispanner_latte_quantity = [{{ $einispanner_latte_quantity }}];



                new Chart(horizontalbarChartQuantity, {
                    type: 'bar',
                    data: {
                        labels: ['Americano', 'Cafe Latte', 'Cappuccino', 'Caramel Macchiato', 'Cafe Mocha',
                            'Vanilla Latte', 'Spanish Latte', 'Cold Brew', 'Cold Brew Latte', 'Einspanner',
                            'Einspanner Latte'
                        ],
                        datasets: [{
                            label: 'Total Quantity Sold',
                            data: [americano_quantity, cafe_latte_quantity, cappuccino_quantity,
                                caramel_macchiato_quantity, cafe_mocha_quantity, vanilla_latte_quantity,
                                spanish_latte_quantity, cold_brew_quantity, cold_brew_latte_quantity,
                                einispanner_quantity, einispanner_latte_quantity,
                            ],
                            borderWidth: 1,
                            borderColor: 'rgba(, 99, 132, 1)',
                            backgroundColor: [
                                'rgba(20, 99, 132, 0.3)',

                            ],
                        }, ]
                    },
                    options: {
                        indexAxis: 'y',

                    }


                });
            </script>



            {{-- horizontalbarChartSalesNonCoffee --}}
            <script>
                const horizontalbarChartSalesNonCoffee = document.getElementById('horizontalbarChartSalesNonCoffee');
                const chocolate_latte = [{{ $chocolate_latte }}];
                const earl_grey_latte = [{{ $earl_grey_latte }}];
                const greentea_latte = [{{ $greentea_latte }}];
                const real_strawberry_latte = [{{ $real_strawberry_latte }}];


                new Chart(horizontalbarChartSalesNonCoffee, {
                    type: 'bar',
                    data: {
                        labels: ['Chocolate Latte', 'Earl Grey Latte', 'Greentea Latte', 'Real Strawberry Latte', ],
                        datasets: [{
                                label: 'Product Sold',
                                data: [chocolate_latte, earl_grey_latte, greentea_latte, real_strawberry_latte],
                                backgroundColor: 'rgba(255, 99, 132, 0.2)', // Customize the colors
                                borderColor: 'rgba(255, 99, 132, 1)',
                                borderWidth: 1
                            },


                        ]
                    },

                    options: {
                        indexAxis: 'y',

                    }


                });
            </script>



            {{-- horizontalbarChartQuantityNonCoffee --}}
            <script>
                const horizontalbarChartQuantityNonCoffee = document.getElementById('horizontalbarChartQuantityNonCoffee');
                const chocolate_latte_quantity = [{{ $chocolate_latte_quantity }}];
                const earl_grey_latte_quantity = [{{ $earl_grey_latte_quantity }}];
                const greentea_latte_quantity = [{{ $greentea_latte_quantity }}];
                const real_strawberry_latte_quantity = [{{ $real_strawberry_latte_quantity }}];

                new Chart(horizontalbarChartQuantityNonCoffee, {
                    type: 'bar',
                    data: {
                        labels: ['Chocolate Latte', 'Earl Grey Latte', 'Greentea Latte', 'Real Strawberry Latte'],
                        datasets: [{
                            label: 'Total Quantity Sold',
                            data: [chocolate_latte_quantity, earl_grey_latte_quantity, greentea_latte_quantity,
                                real_strawberry_latte_quantity,
                            ],
                            borderWidth: 1,
                            borderColor: 'rgba(, 99, 132, 1)',
                            backgroundColor: [
                                'rgba(20, 99, 132, 0.3)',

                            ],
                        }, ]
                    },
                    options: {
                        indexAxis: 'y',

                    }


                });
            </script>




    </div>
    </div>
@endsection
