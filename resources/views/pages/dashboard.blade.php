@extends('layouts.default')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Page Heading -->
        @if (\Session::has('success'))
            <div class="alert alert-danger">
                <ul>
                    <li>{!! \Session::get('success') !!}</li>
                </ul>
            </div>
        @endif
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h6>Dashboard</h6>
            <a href="{{ route('dashboard') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm btn-filter"><i
                class="fas fa-filter fa-sm text-white-50"></i> Filter Data</a>
        </div>

        <!-- Content Row -->
        <div class="row">
            <!-- Card Jumlah Siswa -->
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

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-2 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Siswi Perempuan</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $siswa_perempuan->count() }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{--  <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Tasks
                                </div>
                                <div class="row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">50%</div>
                                    </div>
                                    <div class="col">
                                        <div class="progress progress-sm mr-2">
                                            <div class="progress-bar bg-info" role="progressbar"
                                                style="width: 50%" aria-valuenow="50" aria-valuemin="0"
                                                aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                    Pending Requests</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-comments fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>  --}}
        </div>

        <!-- Content Row -->
        <div class="row">
            <!-- Area Chart -->
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
                                        @forelse ($siswas as $siswa)
                                        <tr>
                                            <td>{{ $siswa->nis }}</td>
                                            <td>{{ $siswa->nama }}</td>
                                            <td>{{ $siswa->jk->nama }}</td>
                                            <td>{{ $siswa->alamat }}</td>                                            
                                            <td>{{ date('d F Y', strtotime($siswa->created_at)) }}</td>                                            
                                        </tr>
                                        @empty

                                        @endforelse                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
            </div>

            {{--  <!-- Pie Chart -->
            <div class="col-xl-4 col-lg-5">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div
                        class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Jenis Kelamin</h6>
                        <div class="dropdown no-arrow">
                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                aria-labelledby="dropdownMenuLink">
                                <div class="dropdown-header">Dropdown Header:</div>
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                        </div>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="chart-pie pt-4 pb-2">
                            <canvas id="myPieChart"></canvas>
                        </div>
                        <div class="mt-4 text-center small">
                            <span class="mr-2">
                                <i class="fas fa-circle text-primary"></i> Direct
                            </span>
                            <span class="mr-2">
                                <i class="fas fa-circle text-success"></i> Social
                            </span>
                            <span class="mr-2">
                                <i class="fas fa-circle text-info"></i> Referral
                            </span>
                        </div>
                    </div>
                </div>
            </div>  --}}
        </div>

    <!-- /.container-fluid -->

    {{--  modal filter  --}}
    <div class="modal fade" id="modal-filter" tabindex="-1" role="dialog" aria-labelledby="modal-notification" aria-hidden="true">
        <div class="modal-dialog modal-default modal-dialog-centered modal-" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="modal-title-notification">Lihat Data Siswa berdasarkan Tanggal Masuk</h6>
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

@endsection

@push('after-style')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet"
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
            //datatable
            $('#dataTable').DataTable();

            //datepicker
            $('.datepicker').datepicker({
                format: 'dd/mm/yyyy',
            });

            //filter per tanggal
            $('.btn-filter').click(function(e) {
                e.preventDefault();
                
                $('#modal-filter').modal();
            });

        });
    </script>    
@endpush
