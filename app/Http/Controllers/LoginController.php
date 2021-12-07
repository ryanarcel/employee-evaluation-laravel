<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Evaluee;

class LoginController extends Controller
{
    public function authenticatehr(Request $request)
    {
        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            
           return redirect()->route('admindashboard');
        }
        else{
            return redirect()->back()->withErrors(["Invalid login"]);
        }
    }

    public function authTeacher(Request $request){
        $evaluee = Evaluee::where('username', $request->uname)->first();

        //echo $evaluee->count();

        if(!$evaluee){
            return redirect()->back()->withErrors(["Invalid login"]);
        }
        else{
            //echo $evaluee;
            if (Hash::check($request->pword, $evaluee->password)) {
                $request->session()->put('account', $evaluee);

                return redirect()->route('teacher-landing', ['id' => $evaluee]);
            }
            else{
                return redirect()->back()->withErrors(["Invalid login"]);
            }
        }

    }

    public function logout(Request $request){
        $request->session()->flush();
        Auth::logout();
        return redirect()->route('front');
    }
}
