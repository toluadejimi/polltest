<!doctype html>
<html lang="en">

<head>
    <meta name="csrf-token" content="content">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Store Data</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/pricing/">





    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        .b-example-divider {
            height: 3rem;
            background-color: rgba(0, 0, 0, .1);
            border: solid rgba(0, 0, 0, .15);
            border-width: 1px 0;
            box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
        }

        .b-example-vr {
            flex-shrink: 0;
            width: 1.5rem;
            height: 100vh;
        }

        .bi {
            vertical-align: -.125em;
            fill: currentColor;
        }

        .nav-scroller {
            position: relative;
            z-index: 2;
            height: 2.75rem;
            overflow-y: hidden;
        }

        .nav-scroller .nav {
            display: flex;
            flex-wrap: nowrap;
            padding-bottom: 1rem;
            margin-top: -1px;
            overflow-x: auto;
            text-align: center;
            white-space: nowrap;
            -webkit-overflow-scrolling: touch;
        }
    </style>


    <!-- Custom styles for this template -->
    <link href="pricing.css" rel="stylesheet">
</head>

<body>



    <div class="container py-3">
        <header>
            <div class="d-flex flex-column flex-md-row align-items-center pb-3 mb-4 border-bottom">

                <nav class="d-inline-flex mt-2 mt-md-0 ms-md-auto">
                    <a class="me-3 py-2 text-dark text-decoration-none" href="/">Home</a>
                    <a class="me-3 py-2 text-dark text-decoration-none" href="/pollingunit">Individual Polling Unit</a>
                    <a class="me-3 py-2 text-dark text-decoration-none" href="/totalpoll">Total of all polling unit</a>


                </nav>
            </div>


            <div class="row row-cols-1 row-cols-md-3 mb-3 text-center mt-4">

                <div class="col">
                    <div class="card mb-4 rounded-3 shadow-sm border-white">

                    </div>
                </div>

                <div class="col">

                </div>


            </div>


        </header>

        <div class="col-lg-6 mb-lg-0 mb-4">
            <div class="col-6 w-100">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if (session()->has('message'))
                    <div class="alert alert-success">
                        {{ session()->get('message') }}
                    </div>
                @endif
            </div>
        </div>

        <main>
            <div class="bg-light p-5 rounded mt-3">
                <h4>Add New Polling Entry</h4>



                <div class="row col-12 mb-5 mt-4">

                    <form class="row g-3" action="/store-now" method="post">
                        @csrf

                        <div class="col-md-6">
                            <label>Select State</label>
                            <select class="form-control selectpicker" id="state-dd" name="state_id"
                                id=""data-live-search="true" class="form-control">
                                @foreach ($state as $unit)
                                    <option value="}">Select State </option>
                                    <option value="{{ $unit->state_id }}">{{ $unit->state_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>





                        <div class="col-6">

                            <label for="inputPassword4" class="form-label">Select LGA</label>
                            <select id="lga-dd" name="lgas" value="value.lga_id" class="form-control">
                            </select>

                        </div>


                        <div class="col-6">
                            <label for="inputAddress" class="form-label">Select Polling Unit</label>
                            <select id="pollingunit-dd" name="polling_unit_id" value="polling_unit_id"
                                class="form-control">
                            </select>
                        </div>



                        <div class="col-6">
                            <label for="inputAddress" class="form-label">Select Polling Unit</label>
                            <select class="form-control" id="party" name="party_abbriviation">
                                @foreach ($party as $data)
                                    <option value="{{ $data->partyid }}">{{ $data->partyname }}</option>
                                @endforeach
                            </select>
                        </div>


                        <div class="col-6">
                            <label for="inputAddress" class="form-label">Enter Party Score</label>
                            <input type="number" name="party_score" class="form-control">
                            </select>
                        </div>


                        <div class="col-6 mt-5">
                            <button type="submit" class="btn btn-primary">Save Record</button>
                        </div>




                    </form>


                </div>













            </div>



            <h4 class="mt-5">Recent Entry</h4>

            <div class="card-body px-0 mt-4 mb-5 pb-2">
                <div class="table-responsive">
                    <table class="table align-items-center mb-0">
                        <thead>

                            <tr>
                                <th>Result ID</th>
                                <th>Polling Unit</th>
                                <th>Party</th>
                                <th>Party Score</th>
                                <th>Enterred By</th>
                                <th>Date Entered</th>
                            </tr>
                        </thead>

                        <tbody>

                            @forelse ($polling_unit as $item)
                                <tr>
                                    <td>{{ $item->result_id }}</td>
                                    <td>{{ $item->polling_unit_name }}</td>
                                    <td>{{ $item->party_abbreviation }}</td>
                                    <td>{{ $item->party_score }}</td>
                                    <td>{{ $item->entered_by_user }}</td>
                                    <td>{{ date('F d, Y', strtotime($item->created_at)) }}</td>
                                </tr>
                            @empty
                                <tr colspan="20" class="text-center">No Record Found</tr>
                            @endforelse


                        </tbody>



                    </table>
                    {!! $polling_unit->appends(Request::all())->links() !!}

                </div>
            </div>





        </main>


    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


    <script>

            $(document).ready(function() {
                $('#state-dd').on('change', function() {
                    var idLga = this.value;
                    $("#lga-dd").html('');
                    $.ajax({
                        url: "{{ url('/fetch-lgas') }}",
                        type: "POST",
                        data: {
                            state_id: idLga,
                            _token: '{{ csrf_token() }}'
                        },
                        dataType: 'json',
                        success: function(result) {

                            console.log(result);
                            $('#lga-dd').html('<option value="">Select Lga</option>');
                            $.each(result.lga, function(key, value) {
                                $("#lga-dd").append('<option value="' + value
                                    .lga_id + '">' + value.lga_name +
                                    '</option>');
                            });
                            $('#pollingunit-dd').html(
                                '<option value="">Select Polling Unit</option>');
                        }
                    });
                });
                $('#lga-dd').on('change', function() {
                    var idState = this.value;
                    $("#pollingunit-dd").html('');
                    $.ajax({
                        url: "{{ url('api/fetch-pollingunit') }}",
                        type: "POST",
                        data: {
                            lga_id: idState,
                            _token: '{{ csrf_token() }}'
                        },
                        dataType: 'json',
                        success: function(res) {

                            console.log(res);
                            $('#pollingunit-dd').html(
                                '<option value="">Select polling unit</option>');
                            $.each(res.pollingunit, function(key, value) {
                                $("#pollingunit-dd").append('<option value="' +
                                    value
                                    .polling_unit_id + '">' + value
                                    .polling_unit_name +
                                    '</option>');

                                document.getElementById('polling_unit_id')
                                    .value = value.polling_unit_id
                                document.getElementById('polling_unit_name')
                                    .value = value.polling_unit_name


                            });

                        }

                    });


                $.ajax({
                    url: "{{ url('/getparty') }}",
                    type: "GET",
                    data: {},
                    dataType: 'json',
                    success: function(res) {

                        console.log(res);
                        $('#party-dd').html('<option value="">Select polling unit</option>');
                        $.each(res.pollingunit, function(key, value) {
                            $("#party-dd").append('<option value="' + value
                                .polling_unit_id + '">' + value.polling_unit_name +
                                '</option>');
                        });
                    }
                });

            });
        });
    </script>


</body>



</html>
