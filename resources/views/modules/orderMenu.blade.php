@extends('layouts.main')

@section('pagecontent')
    <style>
        #myform {
            text-align: center;
            padding: 5px;
            border: 1px dotted #ccc;
            margin: 2%;
        }

        .qty {
            width: 40px;
            height: 25px;
            text-align: center;
        }

        input.qtyplus {
            width: 25px;
            height: 25px;
        }

        input.qtyminus {
            width: 25px;
            height: 25px;
        }
    </style>
    <div class="row justify-content-center">
        <legend class="text-4xl text-black text-center">ORDER/POS</legend>
    </div>
    <div class="flex justify-center pt-20">

        <div class="uk-card uk-card-default uk-card-body rounded-2xl">
            <div class="grid grid-cols-6">
                <div class="col-span-2 ">
                    <div class="mr-5">


                        <table id="users_table" class="uk-table uk-table-hover uk-table-striped">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th>Extra</th>
                                    <th>Sub Total</th>
                                </tr>
                            </thead>
                            {{-- <tbody>
                                @forelse ($order as $orders)
                                    <tr>
                                        <td>{{ $orders->item_name }}</td>
                                        <td>{{ $orders->quantity }} </td>
                                        <td>{{ $orders->item_price * $orders->quantity }}</td>
                                        <td></td>
                                        @forelse ($addons as $addon)
                                            <td hidden> {{ $addon->price }} </td>
                                        @empty
                                        @endforelse
                                        <td>{{ $orders->item_price * $orders->quantity + $addon->price }} </td>
                                    </tr>

                                @empty
                                @endforelse
                            </tbody> --}}

                        </table>

                    </div>
                    <div class="pt-5">
                        <div class="flex justify-between items-center">
                            <label><input class="uk-radio" type="radio" name="radio2" id="registeredRadio" checked>
                                Registered
                                Customer</label>
                            <label><input class="uk-radio" type="radio" name="radio2" id="unregisteredRadio">
                                Unregistered Customer</label>
                        </div>

                        <div class="uk-margin" id="customerList">
                            <select class="uk-select" aria-label="Select">
                                @forelse ($users as $user)
                                    <option>{{ $user->fname . ' ' . $user->lname }}</option>
                                @empty
                                    <option>No users yet...</option>
                                @endforelse
                            </select>
                        </div>

                        <div class="uk-margin ">
                            <input class="uk-input" type="text" placeholder="Item Name" aria-label="Input"
                                name="item_name">
                        </div>

                    </div>
                    <div class="pt-36">

                        <div class="grid grid-cols-2 pl-4 pr-4">
                            <div class="col-span-1"><span class="">Total:</span></div>
                            {{-- @forelse ($order as $orders)
                                <div class="col-span-1"><span
                                        class="flex justify-end">{{ $orders->item_price + $addon->price }}</span></div>
                            @empty
                            @endforelse --}}
                        </div>

                        <div class="grid grid-cols-2">
                            <div class="col-span-1">
                                <div class="pt-5  flex justify-center text-center pb-5">
                                    <a class="  bg-blue-500 text-white rounded-xl p-2 w-40 text-center hover:no-underline hover:text-white hover:bg-slate-400 duration-50"
                                        href="{{ route('PrintReceipt') }}" type="submit">Print Receipt</a>
                                </div>
                            </div>
                            <div class="col-span-1">
                                <div class="pt-5  flex justify-center text-center pb-5">
                                    <a class="  bg-green-500 text-white rounded-xl p-2 w-40 text-center hover:no-underline hover:text-white hover:bg-slate-400 duration-50"
                                        href="{{ route('PayOrder') }}" type="submit">PAY</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- <script>
                    $(document).ready(function() {
                        $('#users_table').DataTable();
                    });
                </script> --}}

                </div>
                <div class="col-span-4 ">
                    {{-- <ul class="uk-subnav uk-subnav-pill flex justify-center items-center" uk-switcher>
                        @forelse ($categories as $category)
                            <li><a href="#">{{ $category->category_name }}</a></li>
                        @empty
                            <li><a href="#">No Categories yet</a></li>
                        @endforelse
                    </ul> --}}

                    @forelse ($menus as $menu)
                        <div>{{ $menu->item_name }}</div>
                    @empty
                    @endforelse
                </div>
            </div>
        </div>

        <script>
            $("#registeredRadio").click(() => {
                $("#customerList").removeClass("hidden")
            })
            $("#unregisteredRadio").click(() => {
                $("#customerList").addClass("hidden")
            })
            jQuery(document).ready(($) => {
                $('.quantity').on('click', '.plus', function(e) {
                    let $input = $(this).prev('input.qty');
                    let val = parseInt($input.val());
                    $input.val(val + 1).change();
                });

                $('.quantity').on('click', '.minus',
                    function(e) {
                        let $input = $(this).next('input.qty');
                        var val = parseInt($input.val());
                        if (val > 0) {
                            $input.val(val - 1).change();
                        }
                    });
            });
        </script>
    @endsection
