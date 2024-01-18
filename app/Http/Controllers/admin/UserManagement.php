<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mail\RegisterMail;
use App\Models\User;
use App\Mail\NewUser;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class UserManagement extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $responder = Auth::id();
        $data = User::where('id', '!=', $responder)->get();

        if (request()->ajax()) {
            return datatables()->of($data)
                ->addColumn('action', 'admin.user_management.action')
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('admin.user_management.userList');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user_management.addUser');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        //=================================
        // $verificationLink = url('/verify/' . $token . '/' . $request->email . '/');
        // $mailSubject = 'E-Ligtas Email Verification';
        // $userData = [
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'link' => $verificationLink
        // ];
        // Mail::to($request->email)->send(new RegisterMail($mailSubject, $userData));



        $token = " ";
        $defaultpassword = Str::random(12, 'abcdefghijklmnopqrstuvwxyz1234567890');
        $status = 'pending';

        $request->validate([
            'responder_name' => 'required|string|max:100',
            'email' => 'required|email|max:75|unique:users,email',
            'userfrom' => 'required|string|max:100',
            'role' => 'required|string|max:100'
        ]);

        $email = $request->email;
        $emailParts = explode('@', $email);
        $username = $emailParts[0];

        $user = new User();

        $user->responder_name = $request->responder_name;
        $user->email = $request->email;
        $user->userfrom = $request->userfrom;
        $user->role = $request->role;
        $user->username = $username;
        $user->password = $defaultpassword;
        $user->status = $status;
        $user->token = $token;
        $user->save();

        $verificationLink = url('/verify/' . $token . '/' . $request->email . '/');
        $mailAdduser = 'E-ligtas, New Registered Email';
        $addUserdata = [
            'responder_name' => $request->responder_name,
            'email' => $request->email,
            'username' => $username,
            'password' => $user->password = $defaultpassword,
            'link' => $verificationLink
        ];
        Mail::to($request->email)->send(new NewUser($mailAdduser, $addUserdata));

        return redirect()->route('users.index')->with('success', 'Users has been Added successfully');
    }


    public function show(User $user)
    {
        return view('admin.user_management.showUser', compact('user'));
    }


    public function edit(User $user)
    {
        return view('admin.user_management.editUser', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\user  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $request->validate([
            'responder_name' => 'required|string|max:100',
            'email' => 'required|email|max:75',
            'userfrom' => 'required|string|max:100',
            'role' => 'required|string|max:100'
        ]);

        $user = User::find($id);

        $user->update([
            'responder_name' => $request->input('responder_name'),
            'email' => $request->input('email'),
            'userfrom' => $request->input('userfrom'),
            'role' => $request->input('role')
        ]);

        return redirect()->route('users.index')->with('success', ' Updated successfully');
    }


    public function destroy(Request $request)
    {

        $com = User::where('id', $request->id)->delete();
        return Response()->json($com);
    }


    public function resetpassword(Request $request, $id)
    {

        $passreset = Str::random(12, 'abcdefghijklmnopqrstuvwxyz123456789');


        $user = User::find($id);

        $user->update([
            'responder_name' => $request->input('responder_name'),
            'email' => $request->input('email'),
            'password' => $user->password = $passreset
        ]);

        $mailAdduser = 'E-ligtas, Requested Reset of Password';
        $addUserdata = [
            'responder_name' => $request->responder_name,
            'email' => $request->email,
            'password' => $user->password = $passreset
        ];
        Mail::to($request->email)->send(new NewUser($mailAdduser, $addUserdata));
        return redirect()->back()->with('success', 'Successful Password Reset');
    }



    public function userchangepass(Request $request, $id)
    {

        $user = User::find($id);

        //  $request->validate([
        //     'password_confirmation' => 'required',
        //     'password' => [
        //     'required',
        //     'string', 'confirmed',
        //     Password::min(8)->letters()->numbers()->mixedCase()->symbols()
        // ],
        // ]);

        $validator = Validator::make($request->all(), [
            'password_confirmation' => 'required',
            'password' => [
                'required',
                'string', 'confirmed',
                Password::min(8)->letters()->numbers()->mixedCase()->symbols()
            ],
        ]);

        if ($validator->fails()) {

            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }


        // Update password if a new one is provided
        if ($request->filled('password')) {
            $user->update(['password' => Hash::make($request->input('password'))]);

            return redirect()->back()->with('success', 'You have successfully change your password');
        }
    }
}
