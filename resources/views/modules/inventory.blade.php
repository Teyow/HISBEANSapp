@extends('layouts.main')

@section('pagecontent')
    <div class="container">
        <div class="row justify-content-center">
            <legend class="text-4xl text-black text-center">INVENTORY</legend>
        </div>
        <div class="uk-card uk-card-default uk-card-body ml-5 mr-5 mt-10 rounded-xl">
            <table id="inventory_table" class="uk-table uk-table-hover uk-table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>Iitem ID</th>
                        <th>Name</th>
                        <th>Cost Price</th>
                        <th>Selling Price</th>
                        <th>Quantity</th>
                        <th>Product ID</th>
                        <th>Supplier</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Coffee Beans</td>
                        <td>500</td>
                        <td>700</td>
                        <td>5</td>
                        <td>115</td>
                        <td>Coffee Beans Inc.</td>
                        <td>NA</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Coffee Beans</td>
                        <td>500</td>
                        <td>700</td>
                        <td>5</td>
                        <td>115</td>
                        <td>Coffee Beans Inc.</td>
                        <td>NA</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Coffee Beans</td>
                        <td>500</td>
                        <td>700</td>
                        <td>5</td>
                        <td>115</td>
                        <td>Coffee Beans Inc.</td>
                        <td>NA</td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>Coffee Beans</td>
                        <td>500</td>
                        <td>700</td>
                        <td>5</td>
                        <td>115</td>
                        <td>Coffee Beans Inc.</td>
                        <td>NA</td>
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
            $('#inventory_table').DataTable();
        });
    </script>
@endsection
