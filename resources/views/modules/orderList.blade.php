@extends('layouts.main')

@section('pagecontent')
    <div class="container">
        <div class="row justify-content-center">
            <legend class="text-4xl text-black text-center">ORDER</legend>
        </div>

        <div class="uk-card uk-card-default uk-card-body ml-5 mr-5 mt-10 rounded-xl">
            <div class="a">
                <table id="order_list" class="uk-table uk-table-hover uk-table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>Customer</th>
                            <th>Total Price</th>
                            <th>Order Items</th>
                            <th>Order Status</th>
                            <th>Mode Of Payment</th>
                            <th>Payment Status</th>
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($orders as $order)
                            <tr>
                                @if (is_null($order->createdBy))
                                    <td>Order Number {{ $order->id }}</td>
                                @else
                                    <td>{{ $order->createdBy->fname }} {{ $order->createdBy->lname }} <span class="hidden"
                                            id="notif{{ $order->id }}">{{ $order->createdBy->notification_token }}</span>
                                    </td>
                                @endif
                                <td>₱{{ $order->total_price }}</td>
                                <td>
                                    @foreach (json_decode($order->orderItems) as $drink)
                                        •{{ $drink->drink_name }} <br>
                                    @endforeach
                                </td>
                                <td>{{ $order->order_status }}</td>
                                <td>{{ $order->mode_of_payment }}
                                    @if ($order->payment_status == 'Pending')
                                        Ref No.: {{ $order->gcash_ref_number }}
                                    @endif
                                </td>
                                <td>{{ $order->payment_status }}</td>
                                <td>
                                    <button id="deleteOrder{{ $order->id }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#dc3545"
                                            class="bi bi-trash" viewBox="0 0 16 16">
                                            <path
                                                d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z" />
                                            <path
                                                d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z" />
                                        </svg>
                                    </button>
                                    @if ($order->payment_status == 'Pending')
                                        <button id="paymentStatus{{ $order->id }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="#6610f2" class="bi bi-cash-coin" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd"
                                                    d="M11 15a4 4 0 1 0 0-8 4 4 0 0 0 0 8zm5-4a5 5 0 1 1-10 0 5 5 0 0 1 10 0z" />
                                                <path
                                                    d="M9.438 11.944c.047.596.518 1.06 1.363 1.116v.44h.375v-.443c.875-.061 1.386-.529 1.386-1.207 0-.618-.39-.936-1.09-1.1l-.296-.07v-1.2c.376.043.614.248.671.532h.658c-.047-.575-.54-1.024-1.329-1.073V8.5h-.375v.45c-.747.073-1.255.522-1.255 1.158 0 .562.378.92 1.007 1.066l.248.061v1.272c-.384-.058-.639-.27-.696-.563h-.668zm1.36-1.354c-.369-.085-.569-.26-.569-.522 0-.294.216-.514.572-.578v1.1h-.003zm.432.746c.449.104.655.272.655.569 0 .339-.257.571-.709.614v-1.195l.054.012z" />
                                                <path
                                                    d="M1 0a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h4.083c.058-.344.145-.678.258-1H3a2 2 0 0 0-2-2V3a2 2 0 0 0 2-2h10a2 2 0 0 0 2 2v3.528c.38.34.717.728 1 1.154V1a1 1 0 0 0-1-1H1z" />
                                                <path
                                                    d="M9.998 5.083 10 5a2 2 0 1 0-3.132 1.65 5.982 5.982 0 0 1 3.13-1.567z" />
                                            </svg>
                                        </button>
                                    @endif
                                    @if ($order->order_status == 'Pending')
                                        <button id="changeStatus{{ $order->id }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="#198754" class="bi bi-check2-square" viewBox="0 0 16 16">
                                                <path
                                                    d="M3 14.5A1.5 1.5 0 0 1 1.5 13V3A1.5 1.5 0 0 1 3 1.5h8a.5.5 0 0 1 0 1H3a.5.5 0 0 0-.5.5v10a.5.5 0 0 0 .5.5h10a.5.5 0 0 0 .5-.5V8a.5.5 0 0 1 1 0v5a1.5 1.5 0 0 1-1.5 1.5H3z" />
                                                <path
                                                    d="m8.354 10.354 7-7a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0z" />
                                            </svg>
                                        </button>
                                    @endif
                                </td>
                            </tr>
                            <script>
                                $("#deleteOrder{{ $order->id }}").click(() => {
                                    swal({
                                        icon: "warning",
                                        title: "Delete Order?",
                                        text: "Are you sure you want to delete this order?",
                                        buttons: true
                                    }).then((response) => {
                                        if (response) {
                                            const formdata = new FormData()
                                            formdata.append("id", "{{ $order->id }}")
                                            axios.post('/deleteOrder', formdata).then(() => {
                                                swal({
                                                    icon: "success",
                                                    title: "Order Deleted!",
                                                    text: "The order has been deleted!",
                                                    buttons: true
                                                }).then((res) => {
                                                    if (res) {
                                                        location.reload();
                                                    }
                                                })
                                            })
                                        }
                                    })
                                })
                                $("#paymentStatus{{ $order->id }}").click(() => {
                                    swal({
                                        icon: "warning",
                                        title: "Complete Payment?",
                                        text: "Are you sure you want to complete the payment?",
                                        buttons: true,
                                    }).then((response) => {
                                        const formdata = new FormData()
                                        formdata.append('id', "{{ $order->id }}")
                                        axios.post('/validatePayment', formdata)
                                            .then((res) => {
                                                if (res) {
                                                    location.reload();
                                                }
                                            })
                                    })
                                })
                                $("#changeStatus{{ $order->id }}").click(function() {
                                    const notif = $("#notif{{ $order->id }}").text()
                                    axios.post('/completeStatus', {
                                        order_id: "{{ $order->id }}",
                                        deviceToken: notif
                                    }).then(response => {
                                        swal({
                                            icon: "success",
                                            title: "Order Completed!",
                                            text: "The order has been completed!"
                                        }).then((res) => {
                                            console.log(res.data)
                                        })
                                    }).catch(err => {
                                        swal({
                                            icon: "error",
                                            title: "Error!",
                                            text: "There was a problem in processing your request!"
                                        })
                                    })
                                })

                                $(document).ready(function() {
                                    $('#users_table').DataTable();
                                });
                            </script>
                        @empty
                        @endforelse

                    </tbody>

                </table>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#menu_list').DataTable();
            $('#order_list').DataTable();
        });
    </script>
@endsection
