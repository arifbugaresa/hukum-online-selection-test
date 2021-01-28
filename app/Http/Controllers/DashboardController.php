<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Siswa;

class DashboardController extends Controller
{
    public function index() 
    {
        $siswas = Siswa::with('jk')->get();
        $siswa_laki = Siswa::where('jenis_kelamin_id', 1) ->get();
        $siswa_perempuan = Siswa::where('jenis_kelamin_id', 2) ->get();
        $filter= null; 
        $mulai= null; 
        $sampai = null;

        return view('pages.dashboard', compact(
            'siswas', 'siswa_laki', 'siswa_perempuan', 'mulai', 'sampai'
        ));
    }

    public function datatables()
    {
        return datatables ( Siswa::with('jk')->get())->toJson();
    }

    public function datatablesIndex() 
    {
        return view ('pages.dashboard');   
    }

    // public function filter(Request $request)
    // {
    //     $mulai = $request->mulai;
    //     $sampai = $request->sampai;

    //     if ($mulai <= $sampai) {
    //         $siswas = Siswa::with('jk')
    //             ->whereDate('created_at', '>=' , $mulai)
    //             ->whereDate('created_at', '<=', $sampai)
    //             ->orderBy('created_at', 'asc')
    //             ->get();
    //         $siswa_laki = Siswa::with('jk')
    //             ->whereDate('created_at', '>=' , $mulai)
    //             ->whereDate('created_at', '<=', $sampai)
    //             ->where('jenis_kelamin_id', 1)
    //             ->orderBy('created_at', 'asc')
    //             ->get();

    //         $siswa_perempuan= Siswa::with('jk')
    //             ->whereDate('created_at', '>=' , $mulai)
    //             ->whereDate('created_at', '<=', $sampai)
    //             ->where('jenis_kelamin_id', 2)
    //             ->orderBy('created_at', 'asc')
    //             ->get();

    //         return view('pages.dashboard', compact(
    //             'siswas','mulai','sampai', 'siswa_laki', 'siswa_perempuan'
    //         ));
    //     } else {
    //         return redirect()->back()->with('success', 'Tanggal Filter Salah, Harap isi tanggal filter dengan benar.');
    //     }
        // try {
        //     $mulai = $request->mulai;
        //     $sampai = $request->sampai;  
        //     $siswas = Siswa::with('jk')
        //         ->whereDate('created_at', '>=' , $mulai)
        //         ->whereDate('created_at', '<=', $sampai)
        //         ->orderBy('created_at', 'asc')
        //         ->get();
        //     $siswa_laki = Siswa::with('jk')
        //         ->whereDate('created_at', '>=' , $mulai)
        //         ->whereDate('created_at', '<=', $sampai)
        //         ->where('jenis_kelamin_id', 1)
        //         ->orderBy('created_at', 'asc')
        //         ->get();

        //     $siswa_perempuan= Siswa::with('jk')
        //         ->whereDate('created_at', '>=' , $mulai)
        //         ->whereDate('created_at', '<=', $sampai)
        //         ->where('jenis_kelamin_id', 2)
        //         ->orderBy('created_at', 'asc')
        //         ->get();

        //     return view('pages.dashboard', compact(
        //         'siswas','mulai','sampai', 'siswa_laki', 'siswa_perempuan'
        //     ));

        // } catch (\Exception $e) {
        //     \Session::Flash('gagal', $e->getMessage());
            
        //     return redirect()->back();
        

}
