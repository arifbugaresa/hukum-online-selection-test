<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Siswa;

class DashboardController extends Controller
{
    public function index() 
    {
        $siswas = Siswa::get();
        $jumlah = Siswa::count();

        return view('pages.dashboard', [
            'siswas' => $siswas,
            'jumlah' => $jumlah

        ]);
    }
}
