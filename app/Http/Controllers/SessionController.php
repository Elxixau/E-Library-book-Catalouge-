<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;


class SessionController extends Controller
{

    private function getCommonData() {
        return [
            'ipAddress' => request()->ip(),
            'userAgent' => request()->header('User-Agent'),
        ];
    }

    function index ()
    {
        $data = $this->getCommonData();
        return view("sesi/logIn", $data);
    }
    
    function login(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string'
        ], [
            'username.required' => 'Username wajib diisi',
            'password.required' => 'Password wajib diisi',
        ]);

        $infologin = [
            'username' => $request->username,
            'password' => $request->password
        ];

        if (Auth::attempt($infologin)){
            $user = Auth::user(); 
            $namaPengguna = $user->name;

            return redirect()->route('loading')->with('success', 'Selamat datang ' . $namaPengguna);

    } 

        return redirect()->route('logIn')->with('error', 'Email atau password salah, silahkan coba lagi.');
    
    }  
    
    function logout(Request $request): RedirectResponse
    {
        Auth::logout();
    
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect('/login');
    }   

    function reg ()
    {
        $data = $this->getCommonData();
        return view("sesi/register", $data);
    }
    
    public function Register(Request $request)
    {
        // Validasi data form
        $request->validate([
            'name' => 'required|string',
            'username' => 'required|string|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        // Buat user baru
        $user = User::create([
            'name' => $request->input('name'),
            'username' => $request->input('username'),
            'password' => Hash::make($request->input('password')),
        ]);

        return redirect()->route('logIn')->with('success', 'Akun Anda Berhasil Terdaftar!');
    }

}