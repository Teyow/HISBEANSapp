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
                                    <th>Sub Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Iced Coffee Latte</td>
                                    <td>1 </td>
                                    <td>123</td>
                                    <td>123</td>
                                </tr>


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
                <div class="col-span-4 bg-slate-500">
                    <ul class="uk-subnav uk-subnav-pill tex" uk-switcher>
                        <li><a href="#">Coffee</a></li>
                        <li><a href="#">Non-Coffee</a></li>
                        <li><a href="#">Item</a></li>
                    </ul>

                    <ul class="uk-switcher uk-margin">
                        <li>
                            <form action="{{ route('CreateOrder') }}" method="post">
                                <div class="grid grid-cols-3">
                                    @forelse ($menus as $menu)
                                        <div class="col-span-1">

                                            <div>
                                                <div class="uk-card uk-card-default ml-5 mr-5 mb-10 rounded-xl">
                                                    <div class="uk-card-media-top">
                                                        <img src="{{ asset('image/menu/' . $menu->image_path) }}"
                                                            width="500" height="500">
                                                    </div>
                                                    <div class="uk-card-body">

                                                        <h3 class="uk-card-title text-center">{{ $menu->item_name }} <input
                                                                type="checkbox" name="checkbox" width="10px"
                                                                height="10px"
                                                                value="{{ $menu->id }} {{ $menu->item_name }} {{ $menu->price }}">
                                                        </h3>

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
    @endsection
