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
            <legend class="text-4xl text-black text-center">PROMOTIONS</legend>
        </div>
        <div class="uk-card uk-card-default uk-card-body ml-5 mr-5 mt-10 rounded-xl">
            <div class="pt-5  flex justify-end text-center pb-5">
                <a class="  bg-blue-500 text-white rounded-xl p-2 w-40 text-center hover:no-underline hover:text-white hover:bg-slate-400 duration-50"
                    href="{{ route('AddPromotions') }}">+ Add
                    Promo</a>
            </div>
            <div class="a">
                <table id="inventory_table" class="uk-table uk-table-hover uk-table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>Picture</th>
                            <th>Name</th>
                            <th>Details</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        @forelse ($promos as $promo)
                            <tr>

                                <td><img src="{{ asset('image/promo/' . $promo->image_path) }}" class="w-40"></td>
                                <td>{{ $promo->name }}</td>
                                <td> {{ $promo->details }}</td>
                                <td> {{ $promo->status }}</td>

                                <td><span class="text-green-500">
                                        <a href="/editPromo/{{ $promo->id }}" uk-icon="pencil"></a>
                                    </span>

                                    <span class="text-red-500 p-5">
                                        <button id="delete{{ $promo->id }}" uk-icon="trash"></button>
                                    </span>
                                </td>
                            </tr>
                            <script>
                                $("#delete{{ $promo->id }}").click(function() {
                                    const formdata = new FormData()
                                    formdata.append("id", "{{ $promo->id }}")
                                    axios.post("/deletePromo", formdata)
                                        .then(() => {
                                            swal({
                                                icon: "success",
                                                title: "Item Deleted!",
                                                text: "Item has been deleted successfully!",
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
                                <td colspan="5" class="text-center">No Items yet</td>

                            </tr>
                        @endforelse



                    </tbody>

                </table>
            </div>

        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#inventory_table').DataTable();
        });
    </script>
@endsection
