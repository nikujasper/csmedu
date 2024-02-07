<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{

    public function logout()
    {
        Session::flush();
        Auth::logout();
        return view('login');
    }

    public function studenthome(Request $request)
    {
        return view('studenthome');
    }




    public function sendMessage(Request $request)
    {
        // dd("hi");
        $data = $request->all();
        $message = new Message;
        $message->name = $data['name'];
        $message->email = $data['email'];
        $message->message = $data['message'];
        $message->save();
        return redirect("contact");
    }


    public function createSignin(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $name = Auth::user()->name;
            Session::put('name', $name);
            $email = Auth::user()->email;
            Session::put('email', $email);
            $role = Auth::user()->role;

            if ($role == "student") {
                return redirect()->intended('studenthome')->withSuccess('Logged-in');
            }
            if ($role == 'faculty') {
                return redirect()->intended('facultyhome')->withSuccess('Logged-in');
            }
        }
        return redirect("login")->withSuccess('Logged-in');
    }



    public function customSignup(Request $request)
    {
        //laravel validation

        // $request->validate([
        //     'email' => 'required',
        //     'password' => 'required',
        //     'name' => 'required'
        // ]);

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ], ['name.required' => 'name should not leave blank..!!']);



        $data = $request->all();
        User::create(['name' => $data['name'], 'email' => $data['email'], 'role' => $data['role'], 'password' => Hash::make($data['password'])]);
        return redirect("login")->withSuccess('Successfully logged-in!');
    }
}
