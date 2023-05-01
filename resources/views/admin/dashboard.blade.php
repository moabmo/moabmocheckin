<title>
    Admin Dashboard
</title>
<style>
    button{
        border-radius: 10px;
        box-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
        padding:0.5%;
        border: none;
        color:yellow;
        background-color: blue;
        font-weight: bolder;
        margin-right: 2px;
        width: 100%;

    }
    button:hover{
        background-color: black;
    }
</style>
@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-15">
            <div class="card">
                <center><div class="card-header">{{ __('Admin Dashboard  ') }}</div></center> 

                <div class="card-body">
                    <a href="{{ route('trainees') }}" target="blank"><button>View All Trainees</button> <br><br></a>
                    
                    <button>Admited Trainees</button> <br><br>
                    <b>&copy; moabmo <?php print(date("Y")); ?></b>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection