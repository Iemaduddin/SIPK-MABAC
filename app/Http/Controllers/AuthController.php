<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\BerkasPribadi;
use App\Models\Kampus;
use Illuminate\Support\Facades\Storage;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function storeLogin(Request $request)
    {
        $validasi = $this->validate($request, [
            'username' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt($validasi)) {
            $user = auth()->user()->role;
            if ($user == 'operator') {
                return redirect()->route('dashboard_operator');
            } elseif ($user == 'mahasiswa') {
                return redirect()->route('dashboard_mahasiswa');
            } else {
                return redirect()->route('dashboard_kepala');
            }
        }

        return redirect()->back()->with('status', 'Username Atau Password Salah');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function storeRegister(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'username' => 'required|unique:mahasiswas',
            'password' => 'required',
        ]);

        $email = Mahasiswa::where('email', $request->email)->first();
        $nik = Mahasiswa::where('nik', $request->nik)->first();
        $username = Mahasiswa::where('username', $request->username)->first();
        if ($username || $nik || $email) {
            if ($validator->fails()) {
                toast('Email atau Username atau NIK sudah Ada', 'info');
                return back();
            }
        }

        $mahasiswa = new Mahasiswa();
        $mahasiswa->nama = $request->nama;
        $mahasiswa->username = $request->username;
        $mahasiswa->password = $request->password;
        $mahasiswa->save();

        $user = new User();
        $user->mahasiswa_id = $mahasiswa->id;
        $user->username = $mahasiswa->username;
        $user->password = Hash::make($request->password);
        $user->role = 'mahasiswa';
        $user->save();

        // Auth::login($user);

        // return redirect()->intended('dashboard_mahasiswa');
        // return redirect()->route('dashboard_mahasiswa');
        // return redirect()->route('dashboard_mahasiswa');
        return redirect()->route('dashboard_mahasiswa')->with('status', 'Registrasi berhasil. Anda sekarang login.');
    }

    public function upload()
    {
        return view('auth.upload_berkas');
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('home');
    }
}
