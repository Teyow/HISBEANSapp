@extends('layouts.main')

@section('pagecontent')
    <div class="  h-full">
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
                            <div class="grid grid-cols-5">
                                <div class="col-span-4">
                                    <h3 class="uk-card-title text-xl">Total Orders</h3>
                                    <p class="text-4xl text-black">{{ $order }}</p>
                                </div>
                                <div class="col-span-1">
                                    <div class="pt-5" style="color: #f15a38">
                                        <span uk-icon="icon:cart; ratio:3" class="flex justify-center items-center"></span>
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
                                    <p class="text-4xl text-black">{{ $sale }}</p>
                                </div>
                                <div class="col-span-1">
                                    <div class="pt-5" style="color: #f15a38">
                                        <span uk-icon="icon:user; ratio:3" class="flex justify-center items-center"></span>
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
                                    <p class="text-4xl text-black">{{ $total }}</p>
                                </div>
                                <div class="col-span-1">
                                    <div class="pt-5" style="color: #f15a38">
                                        <span uk-icon="icon:cart; ratio:3" class="flex justify-center items-center"></span>
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
                                    <p class="text-4xl text-black"></p>
                                </div>
                                <div class="col-span-1">
                                    <div class="pt-5" style="color: #f15a38">
                                        <span uk-icon="icon:cart; ratio:3" class="flex justify-center items-center"></span>
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
                                    <p class="text-4xl text-black"></p>
                                </div>
                                <div class="col-span-1">
                                    <div class="pt-5" style="color: #f15a38">
                                        <span uk-icon="icon:user; ratio:3" class="flex justify-center items-center"></span>
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
                                    <p class="text-4xl text-black"></p>
                                </div>
                                <div class="col-span-1">
                                    <div class="pt-5" style="color: #f15a38">
                                        <span uk-icon="icon:cart; ratio:3" class="flex justify-center items-center"></span>
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
                                    <p class="text-4xl text-black">{{ $order }}</p>
                                </div>
                                <div class="col-span-1">
                                    <div class="pt-5" style="color: #f15a38">
                                        <span uk-icon="icon:cart; ratio:3" class="flex justify-center items-center"></span>
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
                                    <p class="text-4xl text-black">{{ $sale }}</p>
                                </div>
                                <div class="col-span-1">
                                    <div class="pt-5" style="color: #f15a38">
                                        <span uk-icon="icon:user; ratio:3" class="flex justify-center items-center"></span>
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
                                    <p class="text-4xl text-black">{{ $total }}</p>
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

                    <div class="uk-card uk-card-default uk-card-body rounded-3xl " style="background: rgb(255, 255, 255)">
                        <legend class="text-center text-black pt-2 ">Top 10 Products Today</legend>
                        <canvas id="linebarChart1" style="height: 2px; width: 9px"></canvas>
                    </div>


                </li>

                {{-- month --}}
                <li>
                    <div class="uk-card uk-card-default uk-card-body  rounded-3xl" style="background: rgb(255, 255, 255)">
                        <legend class="text-center text-black pt-2">Top 10 Products this Month</legend>
                        <canvas id="" style="height: 2px; width: 9px"></canvas>
                    </div>

                </li>

                {{-- year --}}
                <li>
                    <div class="uk-card uk-card-default uk-card-body  rounded-3xl" style="background: rgb(255, 255, 255)">
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




    </div>
    </div>
@endsection
