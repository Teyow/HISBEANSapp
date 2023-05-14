@extends('layouts.main')

@section('pagecontent')
    <div class="container">
        <div class="row justify-content-center">
            <legend class="text-4xl text-black text-center">VOUCHERS</legend>
        </div>
        <div class="uk-card uk-card-default uk-card-body ml-5 mr-5 mt-10 rounded-xl">
            <div class="pt-5  flex justify-end text-center pb-5">
                <a class="  bg-blue-500 text-white rounded-xl p-2 w-40 text-center hover:no-underline hover:text-white hover:bg-slate-400 duration-50"
                    href="{{ route('addVoucher') }}">+ Add
                    Voucher</a>
            </div>
            <table id="users_table" class="uk-table uk-table-hover uk-table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>Type</th>
                        <th>Name</th>
                        <th>Code</th>
                        <th>Min. Order</th>
                        <th>Valid Until</th>
                        <th>Promo Details</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>December Promo</td>
                        <td>Free Coffee</td>
                        <td>GETFREECOFFEE123</td>
                        <td>2 CUPS</td>
                        <td>2/15/2023</td>
                        <td>Sample Text</td>
                        <td>Enable</td>
                        <td>NA</td>
                    </tr>
                    <tr>
                        <td>Garrett Winters</td>
                        <td>g.winter@gmail.com</td>
                        <td>Staff</td>
                        <td>0926545484</td>
                        <td>*******</td>
                        <td>Enable</td>
                    </tr>
                    <tr>
                        <td>Ashton Cox</td>
                        <td>Junior Technical Author</td>
                        <td>San Francisco</td>
                        <td>66</td>
                        <td>2009-01-12</td>
                        <td>$86,000</td>
                    </tr>
                    <tr>
                        <td>Cedric Kelly</td>
                        <td>Senior Javascript Developer</td>
                        <td>Edinburgh</td>
                        <td>22</td>
                        <td>2012-03-29</td>
                        <td>$433,060</td>
                    </tr>
                    <tr>
                        <td>Airi Satou</td>
                        <td>Accountant</td>
                        <td>Tokyo</td>
                        <td>33</td>
                        <td>2008-11-28</td>
                        <td>$162,700</td>
                    </tr>
                    <tr>
                        <td>Brielle Williamson</td>
                        <td>Integration Specialist</td>
                        <td>New York</td>
                        <td>61</td>
                        <td>2012-12-02</td>
                        <td>$372,000</td>
                    </tr>
                    <tr>
                        <td>Herrod Chandler</td>
                        <td>Sales Assistant</td>
                        <td>San Francisco</td>
                        <td>59</td>
                        <td>2012-08-06</td>
                        <td>$137,500</td>
                    </tr>

                </tbody>

            </table>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#users_table').DataTable();
        });
    </script>
@endsection
