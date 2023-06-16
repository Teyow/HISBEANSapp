<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>HISBEANS</title>
    <style>
        h1 {
            text-align: center;
            padding-bottom: 5rem;
            color: #231F20;
            font-family: Arial, Helvetica, sans-serif;
        }

        .info {
            font-style: bold;
            padding-bottom: 2rem;
        }



        .signed {
            margin-right: 2rem;
            padding-bottom: 0;
            padding-left: 3.5rem;
            text-align: center;
        }

        #input {
            margin-right: 3rem;
            padding-top: 2rem;
        }

        .container {}

        #schedule {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #schedule td,
        #schedule th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #schedule tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #schedule tr:hover {
            background-color: #ddd;
        }

        #schedule th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #F15A38;
            color: white;
        }

        .footers {
            position: fixed;
            left: 0;
            bottom: 0;
            width: 100%;
            background-color: red;
            color: white;
            text-align: center;
            height: 1rem;
        }

        footer #footer {
            width: 100%;
            background-color: rgb(151, 0, 0);
            padding: 1px 0px;
            position: fixed;
            left: 0;
            bottom: 0;

        }

        footer #bottom-footer {
            background-color: white;

        }
    </style>
</head>

<body>



    <h1 class="title">HISBEANS <BR> INVENTORY SYSTEM</h1>

    <hr>
    <div class=" container">

        <br>
        <div class="uk-child-width-1-2@m uk-grid-small uk-grid-match" uk-grid>

            <div>

                <div class="uk-card uk-card-default uk-card-body rounded-3xl ">
                    <table class="uk-table uk-table-divider" id="schedule">
                        <thead>
                            <tr>
                                <th>Item ID</th>
                                <th>Name</th>
                                <th>Cost Price</th>
                                <th>Selling Price</th>
                                <th>Quantity</th>
                                <th>Product ID</th>
                                <th>Supplier</th>
                            </tr>
                        </thead>
                        @forelse ($inventory as $items)
                            <tbody>
                                <td>{{ $items->id }}</td>
                                <td>{{ $items->name }}</td>
                                <td>{{ $items->cost_price }}</td>
                                <td>{{ $items->selling_price }}</td>
                                <td>{{ $items->quantity }}</td>
                                <td>{{ $items->product_id }}</td>
                                <td>{{ $items->supplier }}</td>
                            </tbody>
                        @empty
                        @endforelse
                    </table>

                </div>

            </div>

        </div>
    </div>




    <footer>
        <div id="footer">
            <div class="inner-wrap clearfix">
                <div class="section about">

                </div>
            </div>
            <div id="bottom-footer">
                <div class="inner-wrap clearfix">
                    <p class="fotter-quote">
                    <div class="signed">
                        <legend id="input">___________________<br>Employee's Signature</legend>
                        <legend id="input">___________________<br>Supervisor's Signature</legend>
                        <legend id="input">___________________<br>Admin's Signature</legend>
                    </div>

                    </p>
                </div>
                <p>
            </div>
    </footer>
</body>

</html>
