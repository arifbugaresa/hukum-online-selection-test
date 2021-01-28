<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Siswa;

class DashboardController extends Controller
{
    public function index() 
    {
        $siswas = Siswa::with('jk')->get();
        $jumlah = Siswa::all();
        $filter = null;
        $mulai = null;
        $sampai = null;

        return view('pages.dashboard', [
            'siswas' => $siswas,
            'jumlah' => $jumlah,
            'mulai' => $mulai,
            'sampai' => $sampai
        ]);
    }

    public function filter(Request $request)
    {
        // try {
        //     $mulai = $request->mulai;
        //     $sampai = $request->sampai;
        //     $jumlah = Siswa::all();

        //     $judul = 'Data Siswa masuk periode tanggal masuk $masuk sampai $sampai';

        //     $siswas= Siswa::with('jk')
        //         ->whereDate('created_at', '>=', $mulai)
        //         ->whereDate('created_at', '<=', $sampai)
        //         ->orderBy('created_at', 'desc')
        //         ->get();

        //     return view('pages.dashboard', [
        //     'siswas' => $siswas,
        //     'jumlah' => $jumlah,
        //     'judul' => $judul
        // ]);

        // } catch (\Exception $e) {
        //     \Session::Flash('gagal', $e->getMessage());
            
        //     return view(gagal);
        // }

            $mulai = $request->mulai;
            $sampai = $request->sampai;
            $jumlah = Siswa::all();

            $filter ='( '.$mulai.'  sampai '. $sampai. ' )';

            $siswas = Siswa::with('jk')
                ->whereDate('created_at', '>=' , $mulai)
                ->whereDate('created_at', '<=', $sampai)
                ->orderBy('created_at', 'asc')
                ->get();

            return view('pages.dashboard', [
            'siswas' => $siswas,
            'jumlah' => $jumlah,
            'mulai' => $mulai,
            'sampai' => $sampai
            
        ]);
    }
}
