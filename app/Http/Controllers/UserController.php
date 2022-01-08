<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function passwordUpdate(Request $request) {
        $password = $request->validate([
            'oldpass' => 'required',
            'newpass' => 'required',
            'confnewpass' => 'required'
        ]);

        if (Hash::check($password['oldpass'], \auth()->user()->password)) {
            if ($password['newpass'] == $password['confnewpass']) {
                $newPassword = $password['confnewpass'];
                $newPassword = Hash::make($newPassword);
                $email = \auth()->user()->email;
                DB::table('users')->where('email', $email)->update([
                    'password' => $newPassword
                ]);
                $request->session()->regenerate();
                return redirect()->intended('/index');
            }
        }
        return back()->with('passwordChangeError', 'Password Change Failed');
    }

    public function userLogout(Request $request) {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/index');
    }

    public function userRegister(Request $request) {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users|email:rfc,dns',
            'password' => 'required',
            'gender' => 'required',
            'date_of_birth' => 'required|before_or_equal:2008-01-01'
        ]);

        $validated['password'] = Hash::make($validated['password']);

        $user = new User();
        $user->fill($validated);
        $user->save();
        return redirect()->intended('/login')->with('addSuccess', 'Sign up success! Please sign in');
    }

    public function userLogin(Request $request) {
        if($request->all()) {
            $credentials = $request->validate([
                'email' => 'required|email:rfc,dns',
                'password' => 'required'
            ]);

            if(Auth::attempt($credentials)) {
                $remember_me = $request->remember_me;
                if($remember_me) {
                    Cookie::queue('email', $request->email, 10080);
                    Cookie::queue('password', $request->password, 10080);
                }

                $request->session()->regenerate();

                return redirect()->intended('/index');
            }
        }
        return redirect()->back()->with('loginError', 'Sign in failed!');
    }
}
