<?php

namespace App\Http\Controllers;
use\Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    function login(Request $req){
        //return $req->input();
        $user_r =  User::where(['email'=>$req->email])->first();
        if(!$user_r || !Hash::check($req->password, $user_r->password)){
            return "Username or password not matched";
        }else{
            $req->session()->put('user', $user_r);
            return redirect('/');
        }
    }
}
