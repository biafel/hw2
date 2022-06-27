<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\User;


class LoginController extends Controller {
    
    public function login() {
        if(session('user_id') != null) {
            return redirect("home");
        }
        else {
            return view('login');
        }
    }

    public function checkLogin(Request $request) {
        $user = User::where('username', $request->username)->where('password', $request->password)->first();
        if($user !== null) {
            Session::put('user_id', $user->id);
            return redirect()->route('home');
        }
        else {
            return redirect('login')->withInput();
        }
    }

    public function logout() {
        Session::flush();
        return redirect()->route('home');
    }
}
?>
