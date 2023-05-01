<?php

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class AdminUserController extends Controller
{
    public function index()
    {
        $trainees = Trainee::all();
        return view('trainees', ['trainees' => $trainees]);
    }    
}
