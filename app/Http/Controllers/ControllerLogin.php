<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
use RealRashid\SweetAlert\Facades\Alert;

class ControllerLogin extends Controller
{
    public function login()
    {
        return view('login');
    }

    //Proses login
    public function proseslogin(Request $a)
    {
        //Validasi
        $messages = [
            'name.required' => 'Name tidak boleh kosong!',
            'password.required' => 'Password tidak boleh kosong!',
        ];
        $cekValidasi = $a->validate([
            //'name' => 'required|name:dns|unique:users',
            'name' => 'required',
            'password' => 'required|max:50'
        ], $messages);

        if (Auth::attempt($cekValidasi)) {
            $a->session()->regenerate();
            return redirect('dashboard')->with('toast_success', 'Selamat Datang!');
        }
        Alert::toast('Maaf Password atau name anda salah');
        return back()->with('toast_error', 'Anda tidak bisa login!');
        /*
         if (Auth::attempt($cek)) {
             $a->session()->regenerate();
             return redirect()->intended('/surat');
         }*/
    }

    //logout
    public function logout(Request $a)
    {
        Auth::logout();
        $a->session()->invalidate();
        $a->session()->regenerateToken();
        return redirect('login');
    }
}
