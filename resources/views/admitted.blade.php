@extends('layouts.app')
<title>
    Admitted Trainees
</title>
<style>
        table{
            margin-right: auto;
            margin-left:auto;
            background-color: #007eff;
            width: 100%;
            border-collapse: collapse;
            border-spacing: 0;
            border-radius:10px;  
            font-weight: bold;
        }
        tr:nth-child(even) {
            background-color: white;
            border: solid green 1px ;
            border-left: none;
            border-right: none;
            border-radius:10px;
            color: #007eff;
        }
        td, th{
            padding: 0.2%;
            border: 1px solid black;
        }
        th{
            border: 1px solid black;
        }
        .custom-list {
            list-style: none;
        }
        li{
            font-weight: bolder;
        }

    </style>
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-15">
            <div class="card">
                <div class="card-header"><b>{{ __('List of Admitted Trainees  ') }}</b></div>

                <div class="card-body">
                <table>
    <thead>
        <tr>
            <th>Code</th>
            <th>Polling Station</th>
            <th>Name</th>
            <th>National Id/Passport</th>
            <th>Phone Number</th>
            <th>Ward</th>
            <th>Admitted By</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($trainees as $trainee)
        <tr>
            <td>{{ $trainee->id }})</td>
            <td>{{ $trainee->polling_station }}</td>
            <td>{{ $trainee->name }}</td>
            <td>{{ $trainee->national_id }}</td>
            <td>{{ $trainee->phone }}</td>
            <td>{{ $trainee->ward }}</td>
            <td>{{ $trainee->admitted_by }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
