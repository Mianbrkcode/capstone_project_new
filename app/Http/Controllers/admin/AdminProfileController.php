<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\Rule;
use App\Models\Report;


class AdminProfileController extends Controller
{
    public function show(){

        $totalActiveReport = Report::where('status','0')->count();
        return view('admin.profile' ,compact('totalActiveReport'));

    }


    public function updateInformation(Request $request){
        
        $id = Auth::user()->id;
        $user = User::find($id);

        $request->validate([
            'responder_name' => 'required|string|max:255',
            'username' => [
                'required',
                'string',
                'max:255',
                Rule::unique('users')->ignore($user->id), // Ignore the current user's email
            ],
            'email' => [
                'required',
                'email',
                'string',
                'max:255',
                Rule::unique('users')->ignore($user->id), // Ignore the current user's email
            ],
        ]);

        $user->update([
            'responder_name' => $request->input('responder_name'),
            'username' => $request->input('username'),
            'email' => $request->input('email'),
            // Add more fields as needed
        ]);
        return redirect()->back()->with('success-bt', 'Profile updated successfully');

    } 
}
