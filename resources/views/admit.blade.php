@extends('layouts.app')
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
                    Here is where you shall be admitting the trainees from
                    
                    <form method="GET" action="{{ route('admit') }}">
                        <label for="national_id">Search by ID/Passport :</label>
                        <input type="text" id="national_id" name="national_id">
                        <button type="submit">Search</button> <br><br>

                        <label for="national_id">Search by Phone No  :</label>
                        <input type="number" id="phone" name="phone" max="799999999"> 
                        <button type="submit">Search</button>
                    </form>
                    @if (!empty($trainee))
                        @if ($trainee->admitted == 1)
                            <h4>Trainee Has Already Been Admitted!</h4>
                                <p>
                                    <b> {{ $trainee->name }} </b> of id number 
                                    <b> {{ $trainee->national_id }} </b> 
                                    was admitted at <b> {{ $trainee->updated_at }} <?php  ?> </b> by <b> {{ $trainee->admitted_by }} </b>
                                </p> 
                        @else
                            <p>Trainee Found:</p>
                                S/No:  <b> {{ $trainee->id }} </b><br>
                                Polling Station: <b> {{ $trainee->polling_station }} </b><br>
                                Name: <b> {{ $trainee->name }} </b><br>
                                National ID: <b> {{ $trainee->national_id }} </b><br>
                                Phone: <b> {{ $trainee->phone }} </b><br>
                                Ward: <b> {{ $trainee->ward }} </b><br>
                            </ul>
                            <form method="POST" action="{{ route('trainees.update', $trainee->id) }}">
                                @csrf
                                @method('PUT')

                                <label for="attended"></label>
                                <input type="text" id="admitted" name="admitted" value="1" placeholder="1" hidden><br>

                                <label for="admitted_by"></label>
                                <input type="text" id="admitted_by" name="admitted_by" value="{{ Auth::user()->name }}" hidden>

                                <button type="submit">Admit</button><br><br><br><br>
                                NB: All your admissions shall bear your name
                            </form>
                        @endif
                    @else
                        <p>Trainee not found!</p>
                    @endif      
                    <b>&copy; moabmo <?php print(date("Y")); ?></b>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection