@extends('layouts.app')
<style>
        table{
            margin-right: auto;
            margin-left:auto;
            background-color: grey;
            border-collapse: collapse;
            text: bold;
            width: 100%;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        td{
            border: groove blue 5px ;
        }
        /* Pagination */
        .pagination {
            margin-top: 20px;
            display: flex;
            justify-content: center;
        }

        .pagination li {
            display: inline-block;
            margin-right: 5px;
            padding: 5px;
            border: 1px solid #ccc;
        }

        .pagination li a {
            display: block;
            text-align: center;
            color: #333;
        }

        .pagination li.active {
            background-color: #007bff;
        }

        .pagination li.active a {
            color: #fff;
        }

        .pagination li.disabled {
            color: #ccc;
            pointer-events: none;
        }



</style>
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-15">
            <div class="card">
                <div class="card-header">{{ __('Trainees Admission  ') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    List of all Trainees
                   
                    <table>
    <thead>
        <tr>
            <th>Code</th>
            <th>Polling Station</th>
            <th>Name</th>
            <th>National Id/Passport</th>
            <th>Phone Number</th>
            <th>ward</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($trainees as $trainee)
        <tr>
            <td>{{ $trainee->id }}</td>
            <td>{{ $trainee->polling_station }}</td>
            <td>{{ $trainee->name }}</td>
            <td>{{ $trainee->national_id }}</td>
            <td>{{ $trainee->phone }}</td>
            <td>{{ $trainee->ward }}</td>
        </tr>
        @endforeach
    </tbody>
</table>        
                    <div class="pagination">
                        {{ $trainees->links('pagination::bootstrap-5', ['maxPages' => 5]) }}
                    </div>          
                    <b>&copy; moabmo <?php print(date("Y")); ?></b>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

<!-- @section('styles')
    <link href="{{ asset('css/pagination.css') }}" rel="stylesheet">
@endsection -->