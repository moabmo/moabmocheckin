<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Trainee;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use App\Models\User;
class TraineeController extends Controller
{
    /**
     * Show the form for adding a trainee.
     *
     * @return \Illuminate\View\View
     */
    public function showAddTraineeForm()
    {
        return view('admin.addtrainee');
    }

    /**
     * Store a new trainee record.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addTrainee(Request $request)
    {
        // Validate additional trainee
        $request->validate([
            'national_id' => 'required|unique:trainees,national_id',
            'name' => 'required',
            'phone' => 'required|unique:trainees,phone',
            'ward' => 'required',
            'polling_station' => 'required',
        ]);

        $trainee = new Trainee();
        $trainee->national_id = $request->national_id;
        $trainee->name = $request->name;
        $trainee->phone = $request->phone;
        $trainee->ward = $request->ward;
        $trainee->polling_station = $request->polling_station;
        try {
            $trainee->save();
            return redirect()->route('admin.addtrainee')->with('success', 'Trainee added successfully!');
        } catch (\Exception $e) {
            $errorMessage = 'Trainee already exists!';
            return redirect()->route('admin.addtrainee')->with('error', $errorMessage)->withInput();
        }

    }

    public function checkUniqueness(Request $request)
{
    // Check if the national ID or phone already exists
    $exists = DB::table('trainees')
        ->where('national_id', $request->national_id)
        ->orWhere('phone', $request->phone)
        ->exists();

    return response()->json(['exists' => $exists]);
}



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

    $searchTerm = $request->query('search');

    // Perform the search query based on the search term
    $trainees = Trainee::where('name', 'LIKE', "%$searchTerm%")
        ->orWhere('national_id', 'LIKE', "%$searchTerm%")
        ->orWhere('phone', 'LIKE', "%$searchTerm%")
        ->paginate(10);

    // Pass the trainees to the trainees list view
    return view('trainees.index', ['trainees' => $trainees]);
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

    // Create a new user
    $user = new User;
    $user->name = $request->name;
    $user->email = $request->email;
    $user->password = bcrypt($request->password); // Hash the password
    $user->admin_registered = "Yes";
    $user->save();

    // Redirect to the login page
    return redirect()->route('admin.register')->with('success', 'Clerk has been registered successfully!');
}

    
}