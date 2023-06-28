@extends('layouts.main')

@section('pagecontent')
    @if (Auth::user()->role == 'Admin')
        <div class="  h-full">
            <div class="row justify-content-center">
                <legend class="text-4xl text-black text-center pt-10">DASHBOARD</legend>
            </div>

            <ul class="flex justify-center items-center uk-subnav uk-subnav-pill" name="date_filter" uk-switcher>
                <li value="Day"><a href="Day">Day</a></li>
                <li value="Month"><a href="Month">Month</a></li>
                <li value="Year"><a href="Year">Year</a></li>
            </ul>

            <ul class="uk-switcher uk-margin">
                {{-- DAY --}}
                <li>
                    <div class="grid grid-cols-3 pt-1">

                        <div class="col-span-1">
                            <div class="uk-card uk-card-default uk-card-body ml-5 mr-5 text-center rounded-xl">
                                <div class="grid grid-cols-5">
                                    <div class="col-span-4">
                                        <h3 class="uk-card-title text-xl">Total Orders</h3>
                                        <p class="text-4xl text-black">{{ $today_total_order }}</p>
                                    </div>
                                    <div class="col-span-1">
                                        <div class="pt-5" style="color: #f15a38">
                                            <span uk-icon="icon:cart; ratio:3"
                                                class="flex justify-center items-center"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-span-1">
                            <div class="uk-card uk-card-default uk-card-body ml-5 mr-5 text-center rounded-xl">
                                <div class="grid grid-cols-6">
                                    <div class="col-span-5">
                                        <h3 class="uk-card-title text-xl">Total Customers</h3>
                                        <p class="text-4xl text-black">{{ $today_total_customer }}</p>
                                    </div>
                                    <div class="col-span-1">
                                        <div class="pt-5" style="color: #f15a38">
                                            <span uk-icon="icon:user; ratio:3"
                                                class="flex justify-center items-center"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-span-1">
                            <div class="uk-card uk-card-default uk-card-body ml-5 mr-5 text-center rounded-xl">
                                <div class="grid grid-cols-5">
                                    <div class="col-span-4">
                                        <h3 class="uk-card-title text-xl">Total Revenue</h3>
                                        <p class="text-4xl text-black">₱{{ $today_total_revenue }}</p>
                                    </div>
                                    <div class="col-span-1">
                                        <div class="pt-5" style="color: #f15a38">
                                            <span uk-icon="icon:cart; ratio:3"
                                                class="flex justify-center items-center"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                {{-- MONTH --}}
                <li>
                    <div class="grid grid-cols-3 pt-1">

                        <div class="col-span-1">
                            <div class="uk-card uk-card-default uk-card-body ml-5 mr-5 text-center rounded-xl">
                                <div class="grid grid-cols-5">
                                    <div class="col-span-4">
                                        <h3 class="uk-card-title text-xl">Total Orders</h3>
                                        <p class="text-4xl text-black">{{ $monthly_total_order }}</p>
                                    </div>
                                    <div class="col-span-1">
                                        <div class="pt-5" style="color: #f15a38">
                                            <span uk-icon="icon:cart; ratio:3"
                                                class="flex justify-center items-center"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-span-1">
                            <div class="uk-card uk-card-default uk-card-body ml-5 mr-5 text-center rounded-xl">
                                <div class="grid grid-cols-6">
                                    <div class="col-span-5">
                                        <h3 class="uk-card-title text-xl">Total Customers</h3>
                                        <p class="text-4xl text-black">{{ $monthly_total_customer }}</p>
                                    </div>
                                    <div class="col-span-1">
                                        <div class="pt-5" style="color: #f15a38">
                                            <span uk-icon="icon:user; ratio:3"
                                                class="flex justify-center items-center"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-span-1">
                            <div class="uk-card uk-card-default uk-card-body ml-5 mr-5 text-center rounded-xl">
                                <div class="grid grid-cols-5">
                                    <div class="col-span-4">
                                        <h3 class="uk-card-title text-xl">Total Revenue</h3>
                                        <p class="text-4xl text-black">₱{{ $monthly_total_revenue }}</p>
                                    </div>
                                    <div class="col-span-1">
                                        <div class="pt-5" style="color: #f15a38">
                                            <span uk-icon="icon:cart; ratio:3"
                                                class="flex justify-center items-center"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                {{-- YEAR --}}
                <li>
                    <div class="grid grid-cols-3 pt-1">

                        <div class="col-span-1">
                            <div class="uk-card uk-card-default uk-card-body ml-5 mr-5 text-center rounded-xl">
                                <div class="grid grid-cols-5">
                                    <div class="col-span-4">
                                        <h3 class="uk-card-title text-xl">Total Orders</h3>
                                        <p class="text-4xl text-black">{{ $yearly_total_order }}</p>
                                    </div>
                                    <div class="col-span-1">
                                        <div class="pt-5" style="color: #f15a38">
                                            <span uk-icon="icon:cart; ratio:3"
                                                class="flex justify-center items-center"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-span-1">
                            <div class="uk-card uk-card-default uk-card-body ml-5 mr-5 text-center rounded-xl">
                                <div class="grid grid-cols-6">
                                    <div class="col-span-5">
                                        <h3 class="uk-card-title text-xl">Total Customers</h3>
                                        <p class="text-4xl text-black">{{ $yearly_total_customer }}</p>
                                    </div>
                                    <div class="col-span-1">
                                        <div class="pt-5" style="color: #f15a38">
                                            <span uk-icon="icon:user; ratio:3"
                                                class="flex justify-center items-center"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-span-1">
                            <div class="uk-card uk-card-default uk-card-body ml-5 mr-5 text-center rounded-xl">
                                <div class="grid grid-cols-5">
                                    <div class="col-span-4">
                                        <h3 class="uk-card-title text-xl">Total Revenue</h3>
                                        <p class="text-4xl text-black">₱{{ $yearly_total_revenue }}</p>
                                    </div>
                                    <div class="col-span-1">
                                        <div class="pt-5" style="color: #f15a38">
                                            <span uk-icon="icon:cart; ratio:3"
                                                class="flex justify-center items-center"></span>
                                        </div>
                                    </div>
                                </div>
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
                        <div class="uk-card uk-card-default uk-card-body rounded-3xl "
                            style="background: rgb(255, 255, 255)">
                            <legend class="text-center text-black pt-2 ">Top 10 Products Today</legend>
                            <canvas id="linebarChart1" style="height: 2px; width: 9px"></canvas>
                        </div>
                    </li>

                    {{-- month --}}
                    <li>
                        <div class="uk-card uk-card-default uk-card-body  rounded-3xl"
                            style="background: rgb(255, 255, 255)">
                            <legend class="text-center text-black pt-2">Top 10 Products this Month</legend>
                            <canvas id="lineChart2" style="height: 2px; width: 9px"></canvas>
                        </div>
                    </li>

                    {{-- year --}}
                    <li>
                        <div class="uk-card uk-card-default uk-card-body  rounded-3xl"
                            style="background: rgb(255, 255, 255)">
                            <legend class="text-center text-black pt-2">Top 10 Products this Year</legend>
                            <canvas id="lineChart3" style="height: 2px; width: 9px"></canvas>
                        </div>
                    </li>
            </div>

            <script>
                var sample2 = @json($sample2);
                var sampleq2 = @json($sampleq2);
                var monthlyChartQuantity = @json($monthlyChartQuantity);
                var monthlyChartName = @json($monthlyChartName);
                var yearlyChartQuantity = @json($yearlyChartName);
                var yearlyChartName = @json($yearlyChartName);
            </script>
            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
            <script src="{{ asset('js/chart.js') }}"></script>




        </div>
    @else
        @include('modules.orderPOS')
    @endif
@endsection
