<?php

namespace App\Http\Controllers;

use App\Models\Adminstrator;
use App\Models\Siswa;
use App\Models\Guru;
use Illuminate\Http\Request;
use Inertia\Inertia;

class IndexController extends Controller
{
    //

    public function index() {
        return Inertia::render('Login');
    }

    public function home() {

        if(session('user')) return back();

        return Inertia::render('Home');
    }

    public function welcome() {
        return Inertia::render('Home');
    }

    public function loginAdmin(Request $req) {
        
        // check query to search admin and password same
        $admin = Adminstrator::where('kode_admin', $req->idAdmin)->where('password', $req->password)->first();
        
        if (!$admin) return back()->with('error', 'Kode admin atau password salah');

        $admin->role = 'admin';
        session(['user' => $admin]);

        return redirect('/home');
        
    }
    
    public function loginSiswa(Request $req) {
        
        $siswa = Siswa::where('nis', $req->nis)->where('password', $req->password)->first();
        
        if (!$siswa) return back()->with('error', 'Nis atau password salah');
    
        $siswa->role = 'siswa';
        session(['user' => $siswa]);
    
        return redirect('/home');
        
    }
    
    public function loginGuru(Request $req) {
        
        $guru = Guru::where('nip', $req->nip)->where('password', $req->password)->first();
        
        if (!$guru) return back()->with('error', 'nip atau password salah');
    
        $guru->role = 'guru';
        session(['user' => $guru]);
    
        return redirect('/home');
        
    }

    public function logout(Request $req) {

        $req->session()->invalidate();

        $req->session()->regenerateToken();

        return redirect('/home');

    }

}
