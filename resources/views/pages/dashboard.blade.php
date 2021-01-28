@extends('layouts.default')

@section('content')
    <div class="container-fluid">
        {{--  Error Message  --}}
        @if (\Session::has('success'))
            <div class="alert alert-danger">
                <ul>
                    <li>{!! \Session::get('success') !!}</li>
                </ul>
            </div>
        @endif
        {{--  end error message  --}}

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h6>Dashboard</h6>
            <a href="{{ route('dashboard') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm btn-filter"><i
                class="fas fa-filter fa-sm text-white-50 p-1"></i> Filter Siswa</a>
        </div>

        <div class="row">
            {{--  Card Jumlah Siswa  --}}
            <div class="col-xl-2 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Jumlah Siswa</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $siswas->count() }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{--  End Card Jumlah Siswa  --}}
            {{--  Card Siswa Laki-Laki  --}}
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-2 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Siswa Laki-Laki</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $siswa_laki->count() }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{--  End Card Siswa Laki-laki  --}}
            {{--  Card Siswi Permpuan  --}}
            <div class="col-xl-2 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                    Siswi Perempuan</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $siswa_perempuan->count() }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{--  End Card Siswi Perempuan  --}}
        </div>

        {{--  Content Data Siswa  --}}
        <div class="row">
            <div class="col-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Data Siswa</h6>
                        @if($mulai)
                            <div class="d-flex d-inline align-items-center">
                                <h6 class="m-0 font-weight-bold text-primary">( {{ date('d F Y', strtotime($mulai)) }} - {{ date('d F Y', strtotime($sampai)) }} )</h6>
                                <a href="{{ route('dashboard') }}" class="mt-1"><i class="fas fa-window-close ml-2" style="color: red;"></i></i></a>
                            </div>
                        @endif
                    </div>
                    {{--  Body Data  --}}
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>NIS</th>
                                        <th>Nama</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Alamat</th>
                                        <th>Tanggal Masuk</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{--  looping database  --}}
                                    @foreach ($siswas as $siswa)
                                    <tr>
                                        <td>{{ $siswa->nis }}</td>
                                        <td>{{ $siswa->nama }}</td>
                                        <td>{{ $siswa->jk->nama }}</td>
                                        <td>{{ $siswa->alamat }}</td>                                            
                                        <td>{{ date('d F Y', strtotime($siswa->created_at)) }}</td>                                            
                                    </tr>
                                    @endforeach   
                                    {{--  end looping database                                      --}}
                                </tbody>
                            </table>
                        </div>
                    </div>
                    {{--  End Body Data  --}}
                </div>
            </div>
        </div>
        {{--  End Content Data Siswa  --}}
    </div>

    {{--  modal filter  --}}
    <div class="modal fade" id="modal-filter" tabindex="-1" role="dialog" aria-labelledby="modal-notification" aria-hidden="true">
        <div class="modal-dialog modal-default modal-dialog-centered modal-" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="modal-title-notification">Lihat Data Siswa Berdasarkan Tanggal Masuk</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form role="form" action="{{ route('dashboard-filter') }}" method="get">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="mulai">Mulai Tanggal</label>
                                <input type="date" 
                                    class="form-control " 
                                    id="mulai" name="mulai" 
                                    autocomplete="off" 
                                    placeholder="Pilih Tanggal" 
                                    value="{{ $mulai ? $mulai : date('Y-m-d') }}">
                                    
                            </div>
                            <div class="form-group">
                                <label for="sampai">Sampai Tanggal</label>
                                <input type="date" 
                                    class="form-control" 
                                    id="sampai" 
                                    name="sampai" 
                                    autocomplete="off" 
                                    placeholder="Pilih Tanggal" 
                                    value="{{ $sampai ? $sampai : date('Y-m-d') }}">
                            </div>
                        </div>
            
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{--  End Modal filter  --}}
@endsection

@push('after-style')
    <link 
        rel="stylesheet" 
        type="text/css" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">
    <link 
        rel="stylesheet" 
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.css" />
@endpush

@push('after-script')    
    {{--  Datatable  --}}
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js "></script>

    {{--  Datepicker  --}}
    <script 
    src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.js"></script>

    {{--  datatable  --}}
    <script>
        $(document).ready(function(){
            //Datatable
            $('#dataTable').DataTable();
            //end Datatable

            //datepicker
            $('.datepicker').datepicker({
                format: 'dd/mm/yyyy',
            });
            //end datepicker

            //filter pertanggal
            $('.btn-filter').click(function(e) {
                e.preventDefault();
                $('#modal-filter').modal();
            });
            //end Filter pertanggal

        });
    </script>    
@endpush
