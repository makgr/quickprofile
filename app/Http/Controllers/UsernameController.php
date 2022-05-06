<?php

namespace App\Http\Controllers;

use App\Models\Register;
use Illuminate\Http\Request;

class UsernameController extends Controller
{
    public function checkUsername(Request $request) {
        $username = $request->get('username');
        $users = Register::select("*")
                        ->where("user_name", "=", $username)
                        ->get();
        $userCount = $users->count();
        if($userCount > 0){
             return $response = "<span style='color: red;'>Not Available.</span>";
        }else{
            return $response = "<span style='color: green;'>Available.</span>";
        }
     }
}
