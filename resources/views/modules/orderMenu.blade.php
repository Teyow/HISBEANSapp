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
        <input type="text" class="hidden" id="count" value="0">
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
                            <tbody>
                            </tbody>

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
                            <div class="col-span-1">Total: P<span class="" id="totalPrice">0</span></div>
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
                                    <button
                                        class="  bg-green-500 text-white rounded-xl p-2 w-40 text-center hover:no-underline hover:text-white hover:bg-slate-400 duration-50"
                                        type="button" id="payButton">PAY</button>
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
                    <div class="grid grid-cols-3">
                        @forelse ($menus as $menu)
                            <div class="col-span-1" id="menu{{ $menu->id }}"
                                uk-toggle="target: #menuModal{{ $menu->id }}">

                                <div>
                                    <div class="uk-card uk-card-default ml-5 mr-5 mb-10 rounded-xl ">
                                        <div class="rounded-3xl">
                                            <div class="flex justify-center items-center" href="#modal-center">
                                                <img src="{{ asset('image/menu/' . $menu->image_path) }}" width="500"
                                                    height="500">
                                            </div>


                                            <div class="uk-card-body bg-slate-200 rounded-b-2xl">

                                                <h3 class="uk-card-title text-center ">
                                                    {{ $menu->item_name }}

                                                </h3>
                                                <div class="uk-card-description text-center ">
                                                    {{ $menu->category }}

                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </div>

                            <div id="menuModal{{ $menu->id }}" uk-modal>
                                <div class="uk-modal-dialog uk-modal-body">
                                    <div class="flex justify-center items-center">
                                        <img src="{{ asset('image/menu/' . $menu->image_path) }}" width="500"
                                            height="500">
                                    </div>
                                    <div class="text-3xl">{{ $menu->item_name }}</div>
                                    <div class="text-xl font-bold">Quantity:<span class="flex flex-row">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                id="subQuantity{{ $menu->id }}" fill="currentColor"
                                                class="bi bi-dash-square" viewBox="0 0 16 16">
                                                <path
                                                    d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z" />
                                                <path d="M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8z" />
                                            </svg>
                                            <span class="text-xl" id="quantity{{ $menu->id }}">1</span>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                id="addQuantity{{ $menu->id }}" fill="currentColor"
                                                class="bi bi-plus-square" viewBox="0 0 16 16">
                                                <path
                                                    d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z" />
                                                <path
                                                    d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                                            </svg>
                                        </span>

                                    </div>
                                    <h3 class="text-3xl font-bold">Add Ons</h3>
                                    <div class="grid grid-cols-3 gap-1 mb-5">
                                        @foreach ($addons as $addon)
                                            @if ($addon->addons_price == 30)
                                                <div class="col-span-1">
                                                    <label><input class="uk-checkbox" type="checkbox"
                                                            value="{{ $addon->id }}" name="checkbox">
                                                        P<span id="price{{ $addon->id }}">30</span>
                                                        <span
                                                            id="name{{ $addon->id }}">{{ $addon->addons_name }}</span></label>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                    <div class="grid grid-cols-3 gap-1 mb-5">
                                        @foreach ($addons as $addon)
                                            @if ($addon->addons_price == 25)
                                                <div class="col-span-1">
                                                    <label><input class="uk-checkbox" type="checkbox"
                                                            value="{{ $addon->id }}" name="checkbox"> P<span
                                                            id="price{{ $addon->id }}">25</span>
                                                        <span
                                                            id="name{{ $addon->id }}">{{ $addon->addons_name }}</span></label>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                    <div class="grid grid-cols-3 gap-1 mb-5">
                                        @foreach ($addons as $addon)
                                            @if ($addon->addons_price == 20)
                                                <div class="col-span-1">
                                                    <label><input class="uk-checkbox" type="checkbox"
                                                            value="{{ $addon->id }}" name="checkbox"> P<span
                                                            id="price{{ $addon->id }}">20</span>
                                                        <span
                                                            id="name{{ $addon->id }}">{{ $addon->addons_name }}</span></label>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                    <div class="uk-modal-footer">
                                        <div class="uk-text-right">
                                            <button class="uk-button uk-button-default uk-modal-close"
                                                type="button">Cancel</button>
                                            <button class="uk-button uk-button-primary" type="button"
                                                id="onSave{{ $menu->id }}">Save</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <script>
                                $("#onSave{{ $menu->id }}").click(() => {
                                    let totalPrice = Number("{{ $menu->price }}")
                                    let mainTotalPrice = $("#totalPrice").html()
                                    let price = Number("{{ $menu->price }}")
                                    const quantity = $("#quantity{{ $menu->id }}").html()
                                    const menuName = "{{ $menu->item_name }}"
                                    let addOns = []
                                    let count = $("#count").val()
                                    let addOnsName = ''
                                    $("input:checkbox[name='checkbox']:checked").each(function() {
                                        addOns.push($(this).val());
                                    });

                                    addOns.map((item, index) => {
                                        totalPrice = totalPrice + Number($(`#price${item}`).html())
                                        price = price + Number($(`#price${item}`).html())
                                        addOnsName = addOnsName + " " + $(`#name${item}`).html()
                                    })

                                    totalPrice = totalPrice * quantity
                                    mainTotalPrice = Number(mainTotalPrice) + totalPrice
                                    $("#totalPrice").html(mainTotalPrice)

                                    $('#users_table tbody').append(`
                                    <tr id="order${count}">
                                        <td id="orderName${count}">${menuName}</td>
                                        <td id="orderQuantity${count}">${quantity}</td>
                                        <td>P<span id="orderPrice${count}">${price}</span></td>
                                        <td id="orderAddOns${count}">${addOnsName}</td>
                                        <td>P<span id="orderTotal${count}">${totalPrice}</span></td>
                                        </tr>
                                        `)
                                    count = Number(count) + 1
                                    $("#count").val(count)
                                })

                                $('#addQuantity{{ $menu->id }}').click(() => {
                                    const val = $("#quantity{{ $menu->id }}").html()
                                    const newVal = $("#quantity{{ $menu->id }}").html(Number(val) + 1)
                                })
                                $('#subQuantity{{ $menu->id }}').click(() => {
                                    const val = $("#quantity{{ $menu->id }}").html()
                                    const newVal = $("#quantity{{ $menu->id }}").html(Number(val) - 1)
                                })
                            </script>

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

                $("#payButton").click(() => {
                    const count = Number($("#count").val())

                    for (i = 0; i < count; i++) {
                        console.log($(`#orderName${i}`).html())
                        console.log($(`#orderQuantity${i}`).html())
                        console.log($(`#orderPrice${i}`).html())
                        console.log($(`#orderAddOns${i}`).html())
                        console.log($(`#orderTotal${i}`).html())
                    }
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
