@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-15">
            <div class="card">
                <div class="card-header">{{ __('Trainees Admission') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    Here is where you shall be admitting the trainees from

                    <form method="GET" action="{{ route('admit') }}">
                        <label for="national_id">Search by ID/Passport :</label>
                        <input type="number" id="national_id" name="national_id">
                        <button type="submit">Search</button> <br><br>

                        <label for="phone">Search by Phone No  :</label>
                        <input type="number" id="phone" name="phone" max="799999999">
                        <button type="submit">Search</button>
                    </form>

                    @isset($trainee)
                        @if ($trainee)
                            @if ($trainee->admitted == 1)
                                <h4>Trainee Has Already Been Admitted!</h4>
                                <p>
                                    <b>{{ $trainee->name }}</b> of id number <b>{{ $trainee->national_id }}</b>
                                    was admitted at <b>{{ $trainee->updated_at }}</b> by <b>{{ $trainee->admitted_by }}</b>
                                </p>
                            @else
                                <p>Trainee Found:</p>
                                <ul>
                                    <li>S/No:  <b>{{ $trainee->id }}</b></li>
                                    <li>Polling Station: <b>{{ $trainee->polling_station }}</b></li>
                                    <li>Name: <b>{{ $trainee->name }}</b></li>
                                    <li>National ID: <b>{{ $trainee->national_id }}</b></li>
                                    <li>Phone: <b>{{ $trainee->phone }}</b></li>
                                    <li>Ward: <b>{{ $trainee->ward }}</b></li>
                                </ul>
                                <form method="POST" action="{{ route('trainees.update', $trainee->id) }}">
                                    @csrf
                                    @method('PUT')

                                    <input type="hidden" id="admitted" name="admitted" value="1">
                                    <input type="hidden" id="admitted_by" name="admitted_by" value="{{ Auth::user()->name }}">

                                    <button type="submit">Admit</button><br><br><br><br>
                                    NB: All your admissions shall bear your name
                                </form>
                            @endif
                        @else
                            <p>Trainee not found!</p>
                        @endif
                    @endisset
                </div>
            </div>
        </div>
    </div>
</div>
@include('footer')
@endsection
