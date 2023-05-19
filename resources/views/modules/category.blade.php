@extends('layouts.main')

@section('pagecontent')
    <div class="container">
        <div class="row justify-content-center">
            <legend class="text-4xl text-black text-center">CATEGORY</legend>
        </div>

        <div class="uk-card uk-card-default uk-card-body ml-5 mr-5 mt-10 rounded-xl">
            <div class="pt-5  flex justify-end text-center pb-5">
                <a class="  bg-blue-500 text-white rounded-xl p-2 w-40 text-center hover:no-underline hover:text-white hover:bg-slate-400 duration-50"
                    href="{{ route('addCategory') }}">+ Add
                    Category</a>
            </div>
            <table id="category_list" class="uk-table uk-table-hover uk-table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>Category Name</th>
                        <th>Category Description</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($categories as $category)
                        <tr>
                            <td>{{ $category->category_name }}</td>
                            <td>{{ $category->category_description }}</td>
                            <td>{{ $category->status }}</td>
                            <td><span class="text-green-500">
                                    <a href="/editCategory/{{ $category->id }}" uk-icon="pencil"></a>
                                </span>

                                <span class="text-red-500 p-5">
                                    <button id="delete{{ $category->id }}" uk-icon="trash"></button>
                                </span>
                            </td>
                        </tr>
                        <script>
                            $("#delete{{ $category->id }}").click(function() {
                                const formdata = new FormData()
                                formdata.append("id", "{{ $category->id }}")
                                axios.post("/deleteCategory", formdata)
                                    .then(() => {
                                        swal({
                                            icon: "success",
                                            title: "Catergory Deleted!",
                                            text: "Catergory has been deleted successfully!",
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
                    @endforelse


                </tbody>

            </table>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#category_list').DataTable();
        });
    </script>
    </div>
@endsection
