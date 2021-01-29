<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Siswa;

class DashboardController extends Controller
{   
    public function index(Request $request)
    {        
        if($request->ajax()){           
            //Jika request from_date ada value(datanya) maka
            if(!empty($request->from_date))
            {
                //Jika tanggal awal(from_date) hingga tanggal akhir(to_date) adalah sama maka
                if($request->from_date === $request->to_date){
                    //kita filter tanggalnya sesuai dengan request from_date
                    $siswas = Siswa::with('jk')->whereDate('created_at','=', $request->from_date)->get();
                }
                else{
                    //kita filter dari tanggal awal ke akhir
                    $siswas = Siswa::with('jk')->whereBetween('created_at', array($request->from_date, $request->to_date))->get();
                }                
            }
            //load data default
            else
            {
                $siswas = Siswa::with('jk')->get();
            }
            return datatables()->of($siswas)
                ->make(true);
        }
        return view('pages.dashboard');
    }










   /*  public function index(Request $request)
    {        
        if($request->ajax()){           
            //Jika request from_date ada value(datanya) maka
            if(!empty($request->from_date))
            {
                //Jika tanggal awal(from_date) hingga tanggal akhir(to_date) adalah sama maka
                if($request->from_date === $request->to_date){
                    //kita filter tanggalnya sesuai dengan request from_date
                    return datatables ( Siswa::with('jk')->whereDate('created_at','=', $request->from_date))->get()->toJson();
                    // $siswas = Siswa::whereDate('created_at','=', $request->from_date)->get();
                }
                else{
                    //kita filter dari tanggal awal ke akhir
                    return datatables ( Siswa::with('jk')->whereBetween('created_at', array($request->from_date, $request->to_date)))->get()->toJson();

                    // $siswas = Siswa::whereBetween('created_at', array($request->from_date, $request->to_date))->get();
                }                
            }
            //load data default
            else
            {
                return datatables ( Siswa::all())->get()->toJson();

                // $siswa = Siswa::all();
            }
            // return datatables()->of($siswas)
            //             ->addColumn('action', function($data){
            //                 $button = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$data->id.'" data-original-title="Edit" class="edit btn btn-info btn-sm edit-post"><i class="far fa-edit"></i> Edit</a>';
            //                 $button .= '&nbsp;&nbsp;';
            //                 $button .= '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm"><i class="far fa-trash-alt"></i> Delete</button>';     
            //                 return $button;
            //             })
            //             ->rawColumns(['action'])
            //             ->addIndexColumn()
            //             ->make(true);          
        }
        return view('pages.dashboard');

    } */



    // public function index() 
    // {
    //     $siswas = Siswa::with('jk')->get();
    //     $siswa_laki = Siswa::where('jenis_kelamin_id', 1) ->get();
    //     $siswa_perempuan = Siswa::where('jenis_kelamin_id', 2) ->get();
    //     $filter= null; 
    //     $mulai= null; 
    //     $sampai = null;

    //     return view('pages.dashboard', compact(
    //         'siswas', 'siswa_laki', 'siswa_perempuan', 'mulai', 'sampai'
    //     ));
    // }

    // public function datatables()
    // {
    //     return datatables ( Siswa::with('jk')->get())->toJson();
    // }

    // public function datatablesIndex() 
    // {
    //     return view ('pages.dashboard');   
    // }

    // // public function filter(Request $request)
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
