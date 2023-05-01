<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Trainee;
use App\Models\User;
use App\Http\Controllers\Hash;
class TraineeController extends Controller
{
    public function update(Request $request, $id) {
        $trainee = Trainee::findOrFail($id);
      
        $trainee->admitted = $request->has('admitted');
        $trainee->admitted_by = $request->input('admitted_by');
      
        $trainee->save();
      
        return redirect()->route('admit', $trainee->id)
                         ->with('success', 'Trainee has been admitted successfully.');
      }
      
   
      public function search(Request $request) {
        $trainee = Trainee::where(function ($query) use ($request) {
            $query->where('national_id', $request->national_id)
                  ->orWhere('phone', $request->phone);
        })->where(function ($query) {
            $query->where('admitted', 1)
                  ->orWhere('admitted', 0);
        })->first();
    
        return view('admit')->with('trainee', $trainee);
    }
    

      public function admitted(Request $request) {        
        $trainees = Trainee::where('admitted', 1)->get();
        return view('admitted', ['trainees' => $trainees]);
      }
  

    
    public function index()
{
    $trainees = Trainee::paginate(20);
    return view('trainees', compact('trainees'));
}
public function showRegistrationForm()
    {
        return view('admin.register');
    }

    public function register(Request $request)
    {
        // Validate the form data
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required',
        ]);

        // Create a new user and set the admin_registered flag based on the checkbox value
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->admin_registered = $request->has('admin_registered');
        $user->save();

        // Redirect to the login page
        return redirect()->route('login');
    }
}




