<title>
    Admin Dashboard
</title>
<style>
    .button {
        border-radius: 10px;
        border: none;
        color: white;
        background-color: grey;
        font-size: 150%;
        font-weight: 900;
        width: 100%;
        box-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
        margin: 0.5%;
    }

    button:hover {
        background-color: lightgrey;
        font-size: 150%;
        color: black;
        transition: 0.4s;
    }

    a {
        /* padding: 5%; */
        color:white;
    }
    .link-white {
        color: white;
        text-decoration: none;
        background-color: cadetblue;
        padding:1%;
        font-weight: 900;
        font-size: 150%;
        min-width: 100%;
        border-radius: 10px;
        margin: 2%;
    }
    .link-white:hover{
        background: lightgreen;
        color:white;
    }
</style>

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-15">
            <div class="card">
            @auth
                        @if (Auth::user()->admin_registered)
                
                    <div class="card-header">{{ __('Admin Dashboard') }}</div>
                
                <div class="card-body">
                    
                            <!-- Admin dashboard content -->
                            <a href="{{ route('admin.addtrainee') }}" target="_blank" class="link-white">Add trainees</a>
                            <a href="{{ route('admin.register') }}" target="_blank" class="link-white">Add a registration clerk</a>
                            <a href="{{ route('trainees') }}" target="_blank" class="link-white">View list of all trainees</a>
                            <a href="{{ route('admitted') }}" target="_blank" class="link-white">View list of admitted trainees</a>
                            
                        @else
                            <p>Access denied! Please login as an admin to access this page.</p>
                        @endif
                    @else
                        <p>Please <a href="{{ route('admin.login') }}">login as an admin</a> to access this page.</p>
                    @endauth

                    <p style="text-align:center; padding-top: 10%;">
                        <b>&copy; moabmo <?php print(date("Y")); ?></b>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
