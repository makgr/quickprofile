<?php

namespace App\Http\Controllers;

use App\Models\Register;
use App\Rules\isValidPassword;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function registration(Request $request) {

        $validate = $request->validate([
            'full_name' => 'required',
            'email' => 'required|email|unique:registers',
            'user_name' => 'unique:registers',
            'mobile' => 'required',
            'about_me' => 'max:500',
            'password' => [
                new isValidPassword(),
            ],
        ]);

        $register = Register::create([
            'full_name' => $request->full_name,
            'email' => $request->email,
            'user_name' => $request->user_name,
            'mobile' => $request->mobile,
            'about_me' => $request->about_me,
            'password' => $request->password,
        ]);

        return redirect()->route('registration')->with('message','Registration Successful!');
    }

    public function showProfileData($username)
    {
        $profileData = Register::select("*")
                        ->where("user_name", "=", $username)
                        ->first();
        return view('profile', compact('profileData'));
    }

}
