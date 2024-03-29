@extends('layouts.main')

@section('pagecontent')
    <style>
        div.a {
            height: 580px;

            overflow: auto;
        }
    </style>
    <div class="">
        <div class="row justify-content-center">
            <legend class="text-4xl text-black text-center">VOUCHERS</legend>
        </div>
        <div class="uk-card uk-card-default uk-card-body ml-5 mr-5 mt-10 rounded-xl">
            <div class="pt-5  flex justify-end text-center pb-5">
                <a class="  bg-blue-500 text-white rounded-xl p-2 w-40 text-center hover:no-underline hover:text-white hover:bg-slate-400 duration-50"
                    href="{{ route('addVoucher') }}">+ Add
                    Voucher</a>
            </div>
            <div class="a">
                <table id="users_table" class="uk-table uk-table-hover uk-table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>Type</th>
                            <th>Name</th>
                            <th>Code</th>
                            <th>Min. Order</th>
                            <th>Valid Until</th>
                            <th>Promo Details</th>
                            <th>Voucher Discount</th>
                            <th>Discount Type</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($vouchers as $voucher)
                            <tr>
                                <td>{{ $voucher->type_of_voucher }}</td>
                                <td>{{ $voucher->voucher_name }}</td>
                                <td>{{ $voucher->voucher_code }}</td>
                                <td>{{ $voucher->minimum_order }}</td>
                                <td id="date{{ $voucher->id }}">{{ $voucher->valid_until }}</td>
                                <td>{{ $voucher->promo_details }}</td>
                                <td>{{ $voucher->voucher_discount }}</td>
                                <td>{{ $voucher->discount_type }}</td>
                                <td>{{ $voucher->status }}</td>
                                <td><span class="text-green-500">
                                        <a href="/editVoucher/{{ $voucher->id }}" uk-icon="pencil"></a>
                                    </span>

                                    <span class="text-red-500 p-5">
                                        <button id="delete{{ $voucher->id }}" uk-icon="trash"></button>
                                    </span>
                                </td>
                            </tr>
                            <script>
                                $(document).ready(() => {
                                    const date = $("#date{{ $voucher->id }}").text()
                                    const newDate = moment(date).format("LL")
                                    $("#date{{ $voucher->id }}").text(newDate)
                                })
                                $("#delete{{ $voucher->id }}").click(function() {
                                    const formdata = new FormData()
                                    formdata.append("id", "{{ $voucher->id }}")
                                    axios.post("/deleteVoucher", formdata)
                                        .then(() => {
                                            swal({
                                                icon: "success",
                                                title: "Voucher Deleted!",
                                                text: "Voucher has been deleted successfully!",
                                                buttons: false
                                            }).then(() => {
                                                location.reload()
                                            })
                                        })
                                })

                                $(document).ready(function() {
                                    $('#users_table').DataTable();
                                });
                            </script>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">No Employees yet</td>
                            </tr>
                        @endforelse

                    </tbody>

                </table>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#users_table').DataTable();
        });
    </script>
@endsection
