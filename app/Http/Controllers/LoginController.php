<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Mail\ResetPassword;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\User;
class LoginController extends Controller
{
    public function index() 
    {
        return view('template.auth.login');
    }
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email'=> 'required|email:dns',
            'password' => 'required'
        ]);
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
        
            $user = Auth::user();
            // if ($user->is_admin == 1) {
                return redirect()->intended('admin/dashboard')->with('message_success','Berhasil Login');
            // }
        
            // return redirect()->intended('/')->with('message_success','Berhasil Login');
        }
        return back()->with('message_danger', 'Login gagal, Coba Lagi');
    }

    public function logout(Request $request)
    {
        Auth::logout();

    $request->session()->invalidate();

    $request->session()->regenerateToken();

    return redirect('/');
    }

    public function lupa_password()
    {
        return view('template.auth.lupa_password');
    }

    public function kirim_link_password(Request $request)
    {
        $email = $request->email;
        $token = Str::random(60);

        DB::table('password_resets')->insert([
            'email' => $email,
            'token' => $token,
            'created_at' => now(),
        ]);

        Mail::to($email)->send(new ResetPassword($email, $token));
        return redirect()->back()->with('message_success','Berhasil Kirim Email!, Cek Email Untuk Meriset Password');
    }

    public function reset_password($token,$email)
    {
        $email = $email;
        return view('template.auth.reset_password',compact('email'));
    }
    
    public function reset_password_update(Request $request, $email)
    {
        $user = User::where('email', $email)->first();
        $request->validate([
           'password'=>'required|min:5|max:255'

        ]);
        $user->password = Hash::make($request->password);
        $user->save();
        return redirect('login')->with('message_success','Berhasil Reset Password!, Silahkan Login');
    }
}
