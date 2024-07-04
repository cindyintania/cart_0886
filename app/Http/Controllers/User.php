<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class User extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(UserModel $userModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UserModel $userModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, UserModel $userModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UserModel $userModel)
    {
        //
    }

    public function login()
 {
 //
 return view('login/form');
 }
 public function loginProcess(Request $request)
 {
 $credentials = $request->only('username', 'password');
 $user = UserModel::where('username', $credentials['username'])
 ->where('password', sha1($credentials['password']))
 ->first();
 if (!$user) {
 // Authentication failed
 return back()->withErrors([
 'username' => 'Username & Password Salah',
 ]);
 }
 // Authentication passed
 Auth::login($user);
 $request->session()->regenerate();
session(['nama' => $user->nama]);
session(['id_user' => $user->id_user]);

 return redirect()->intended('/transaksi');
 }

 public function logout(Request $request)
 {
 Auth::guard('auth_user')->logout();
 $request->session()->invalidate();
 $request->session()->regenerateToken();
 return redirect('/');
 }
}
