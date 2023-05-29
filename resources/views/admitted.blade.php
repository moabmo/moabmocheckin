@extends('layouts.app')
<title>
    Admitted Trainees
</title>
<style>
        table{
            margin-right: auto;
            margin-left:auto;
            background-color: lightgrey;
            width: 100%;
            border-collapse: collapse;
            border-spacing: 0;
            border-radius:10px;  
            /* font-weight: bold; */
        }
        tr:nth-child(even) {
            background-color: white;
            border: solid green 1px ;
            border-left: none;
            border-right: none;
            border-radius:10px;
            /* color: #000; */
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
                    
            <thead style="background-color: blue; font-size: 120%; color: white; border-top-left-radius: 10px; border-top-right-radius: 10px;">
                <tr>
                    <th style="border-right: 1px solid black;">Code</th>
                    <th style="border-right: 1px solid black;">Polling Station</th>
                    <th style="border-right: 1px solid black;">Name</th>
                    <th style="border-right: 1px solid black;">National Id/Passport</th>
                    <th style="border-right: 1px solid black;">Phone Number</th>
                    <th style="border-right: 1px solid black;">Ward</th>
                    <th style="border-right: 1px solid black;">Admitted By</th>
                </tr>
            </thead>

    <tbody>
        @foreach ($trainees as $trainee)
        <tr>
            <td style="border-right: 1px solid black;">{{ $trainee->id }}</td>
            <td style="border-right: 1px solid black;">{{ $trainee->polling_station }}</td>
            <td style="border-right: 1px solid black;">{{ $trainee->name }}</td>
            <td style="border-right: 1px solid black;">{{ $trainee->national_id }}</td>
            <td style="border-right: 1px solid black;">{{ $trainee->phone }}</td>
            <td style="border-right: 1px solid black;">{{ $trainee->ward }}</td>
            <td style="background-color: #00FFC7; color:blue;">{{ $trainee->admitted_by }}</td>

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
