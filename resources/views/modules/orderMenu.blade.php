@extends('layouts.main')

@section('pagecontent')
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
                            <tbody>
                                @forelse ($order as $orders)
                                    <tr>
                                        <td>{{ $orders->item_name }}</td>
                                        <td>{{ $orders->quantity }} </td>
                                        <td>{{ $orders->price }}</td>
                                        @forelse ($addons as $addon)
                                            <td>{{ $addon->addons_name }}</td>
                                        @empty
                                        @endforelse
                                        <td>{{ $orders->price }}</td>
                                    </tr>

                                @empty
                                @endforelse
                            </tbody>

                        </table>

                    </div>
                    <div class="pt-5">
                        <legend>Customer 2</legend>
                        <div class="uk-margin mr-5">
                            <input class="uk-input" type="text" placeholder="Item Name" aria-label="Input"
                                name="item_name">
                        </div>
                    </div>
                    <div class="pt-36">
                        <div class="grid grid-cols-2 pl-4 pr-4">
                            <div class="col-span-1"><span class="">Total:</span></div>
                            <div class="col-span-1"><span class="flex justify-end">₱180</span></div>
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
                    <ul class="uk-subnav uk-subnav-pill flex justify-center items-center" uk-switcher>
                        <li><a href="#">Coffee</a></li>
                        <li><a href="#">Non-Coffee</a></li>
                        <li><a href="#">Item</a></li>
                    </ul>

                    <ul class="uk-switcher uk-margin">
                        <li>

                            <form action="{{ route('CreateOrder') }}" method="post">
                                @csrf
                                <div class="grid grid-cols-3">
                                    @forelse ($menus as $menu)
                                        <div class="col-span-1">

                                            <div>
                                                <div class="uk-card uk-card-default ml-5 mr-5 mb-10 rounded-xl ">
                                                    <div class="rounded-3xl">
                                                        <a class="flex justify-center items-center" href="#modal-center"
                                                            uk-toggle>
                                                            <img src="{{ asset('image/menu/' . $menu->image_path) }}"
                                                                width="500" height="500"></a>


                                                        <div class="uk-card-body bg-slate-200 rounded-b-2xl">

                                                            <h3 class="uk-card-title text-center ">
                                                                {{ $menu->item_name }}
                                                                <input type="checkbox" name="item_name" width="10px"
                                                                    height="10px"
                                                                    value="{{ $menu->id }}, {{ $menu->item_name }}, {{ $menu->price }}">
                                                            </h3>

                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                        </div>

                                    @empty
                                    @endforelse

                                </div>
                                <div class="pt-5  flex justify-center text-center pb-5">
                                    <button
                                        class="  bg-green-500 text-white rounded-xl p-2 w-40 text-center hover:no-underline hover:text-white hover:bg-slate-400 duration-50"
                                        type="submit">SAVE</button>
                                </div>
                            </form>



                        </li>
                        <li>Hello again!</li>
                        <li>Bazinga!</li>
                    </ul>
                </div>
            </div>
        </div>

        @forelse ($menus as $menu)
            <!--MODAL-->
            <div id="modal-center" class="uk-flex-top" uk-modal>

                <div class="uk-modal-dialog uk-modal-body uk-margin-auto-vertical rounded-3xl">

                    <button class="uk-modal-close-default" type="button" uk-close></button>
                    <form action="{{ route('CreateAddons') }}" method="post">
                        @csrf
                        <div class="text-center text-3xl mb-10 text-black">
                            ADD-ONS

                            <img src="{{ asset('image/menu/' . $menu->image_path) }}" width="500" height="500"
                                class="mt-10">
                            <legend class="text-center text-2xl text-black">
                                {{ $menu->item_name }}</legend>
                        </div>
                        <legend class="text-center text-black ">₱30</legend>
                        <div class="uk-margin uk-grid-small uk-child-width-auto" name='addons_name'>
                            <label><input class="uk-checkbox" type="checkbox" value="Espresso shot" name='addons_name'>
                                <span class="pl-1">Espresso shot</span>

                            </label>
                            <label><input class="uk-checkbox" type="checkbox" value="Whipping Cream" name='addons_name'>
                                <span class="pl-1">Whipping Cream</span>
                            </label>
                            <label><input class="uk-checkbox" type="checkbox" value="Ice Cream" name='addons_name'>
                                <span class="pl-1">Ice Cream</span>
                            </label>
                            <label><input class="uk-checkbox" type="checkbox" value="Choco Chips" name='addons_name'>
                                <span class="pl-1">Choco Chips</span>
                            </label>
                        </div>
                        <legend class="text-center text-black ">₱25</legend>
                        <div class="uk-margin uk-grid-small uk-child-width-auto text-center text-base">
                            <label><input class="uk-checkbox" type="checkbox" value="Chocolate Sauce" name='addons_name'>
                                <span class="pl-1">Chocolate Sauce</span>
                            </label>
                            <label><input class="uk-checkbox" type="checkbox" value="Caramel Sauce" name='addons_name'>
                                <span class="pl-1">Caramel Sauce</span>
                            </label>
                            <label><input class="uk-checkbox" type="checkbox" value="Strawberry Sauce"
                                    name='addons_name'>
                                <span class="pl-1">Strawberry Sauce</span><br>
                            </label>
                            <label><input class="uk-checkbox" type="checkbox" value="Honey" name='addons_name'>
                                <span class="pl-1 mt-5">Honey</span>
                            </label>
                        </div>
                        <legend class="text-center text-black ">₱20</legend>
                        <div class="uk-margin uk-grid-small uk-child-width-auto text-center" name='addons_name'>
                            <label><input class="uk-checkbox" type="checkbox" value="Vanilla Syrup" name='addons_name'>
                                <span class="pl-1">Vanilla Syrup</span>
                            </label>
                            <label><input class="uk-checkbox" type="checkbox" value="Caramel Syrup" name='addons_name'>
                                <span class="pl-1">Caramel Syrup</span>
                            </label>
                            <label><input class="uk-checkbox" type="checkbox" value="Condensed Milk" name='addons_name'>
                                <span class="pl-1">Condensed Milk</span>
                            </label>

                        </div>
                        <div class="col-span-1">
                            <div class="pt-5  flex justify-center text-center pb-5">
                                <button
                                    class="  bg-green-500 text-white rounded-xl p-2 w-40 text-center hover:no-underline hover:text-white hover:bg-slate-400 duration-50"
                                    type="submit">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            {{-- END MODAL --}}
        @empty
        @endforelse
    @endsection
