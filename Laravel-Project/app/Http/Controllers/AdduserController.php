<?php

namespace App\Http\Controllers;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\AdduserRequest;
use App\Models\Country;
use App\Models\State;
use App\Models\City;
use App\Models\Branch;
use App\Models\User;

use Illuminate\Http\Request;

class AdduserController extends Controller
{
public function edit($email)
{
  
    $user = User::where('email', $email)->firstOrFail();
    $countries = Country::all();
    $states = State::where('country_id', $user->country_id)->get();
    $cities = City::where('state_id', $user->state_id)->get();
    $branches = Branch::where('city_id',$user->city_id)->get();

    return view('admin.edit-user', compact('user','countries','states','cities','branches'));
}
public function update(Request $request)
{
    
    $request->validate([
        'email' => 'required|email|exists:users,email',
        'first_name' => 'required|string|max:255',
        'last_name' => 'required|string|max:255',
        'phone_number' => 'required|string|max:15',
        'branch' => 'required|string|max:255',
    ]);

    $user = User::where('email', $request->email)->firstOrFail();

    
    $user->update([
        'first_name' => $request->first_name,
        'last_name' => $request->last_name,
        'phone_number' => $request->phone_number,
        'branch' => $request->branch,
    ]);
    return redirect()->route('index')->with('success', 'User updated successfully.');
}


    public function index()
    {
        return view('admin.index');
    }
    public function getUser(Request $request)
    {
      if($request->ajax()) {
        $data =User::with('branch')->get();
        
        return Datatables::of($data)
        // ->addIndexColumn()
        ->addColumn('action', function ($row) {
            return '<a href="/users/edit/' . $row->email . '" class="btn btn-sm btn-primary">Edit</a>
                    <button class="btn btn-sm btn-danger delete-btn" data-email="' . $row->email . '">Delete</button>';           
        })
        ->addColumn('branch',function($row){
            return $row->branch->name ?? 'N/A';
        })
        ->rawColumns(['action']) 
        ->make(true);
      }  
    }
    public function adduser(Request $request){
        
        $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|email',
            'role' => 'required|string|in:admin,user',
            'phone_number' => 'required|string',
            'address' => 'required|string',
            'country' => 'required',
            'state' => 'required',
            'city' => 'required',
            'pincode' => 'required',
            'branch' => 'required',
        ]);
        dd($request->role);
        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'role' => $request->role,
            'phone_number' => $request->phone_number,
            'address' => $request->address,
            'country' => $request->country,
            'state' => $request->state,
            'city' => $request->city,
            'pincode' => $request->pincode,
            'branch_id' => $request->branch,
            
        ]);

        return response()->json([
           'status' => true,
                'message' => 'User registered Successfully, Password sent via email', //trans(key: 'lang.key')
                'user' => $user,
            ],200); 
    }
    
    public function destroy(Request $request)
{
    $email = $request->email; 

    $user = User::where('email', $email)->first();

    if ($user) {
        $user->delete();
        return response()->json(['success' => 'User deleted successfully.']);
    } else {
        return response()->json(['error' => 'User not found.'], 404);
    }
}
    public function getCountries()
    {
        $countries = Country::all();
        return view('admin.add-user', compact('countries'));
    }
    
    public function getStates($country_id)
    {
        $states = State::where('country_id', $country_id)->get();
        return response()->json($states);
    }

    public function getCities($state_id)
    {
        $cities = City::where('state_id', $state_id)->get();
        return response()->json($cities);
    }
    public function getBranches($city_id)
    {
        $branches = Branch::where('city_id', $city_id)->get(); 
        return response()->json($branches);
    }
}
