<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class EditprofileController extends Controller
{
    

        
    public function edit($user_id)
{
    $user = User::find($user_id);
    return view('admin.profile', compact('user'));
}


    public function editprofile(RegistrationRequest $request){

    }
   

public function update(Request $request, $user_id)
{
   
    $validated = $request->validate([
        'first_name' => 'required|string|max:255',
        'last_name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'phone' => 'nullable|string|max:15',
        'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $user = User::find($user_id);
    
   
    $user->first_name = $validated['first_name'];
    $user->last_name = $validated['last_name'];
    $user->email = $validated['email'];
    $user->phone_number = $validated['phone'] ?? $user->phone;

    
    if ($request->hasFile('profile_picture')) {
        
        if ($user->profile_picture) {
            Storage::delete('public/' . $user->profile_picture);
        }

        $path = $request->file('profile_picture')->store('profile_pictures', 'public');
        $user->profile_picture = $path;
    }

   
    $user->save();
    

    return redirect()->route('profile.edit', ['user_id' => $user->id])
                     ->with('success', 'Profile updated successfully!');
}

    
}
