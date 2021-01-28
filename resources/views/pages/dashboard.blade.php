@extends('layouts.default')

@section('content')
    <div class="container-fluid">

        {{--  Content Data Siswa  --}}
        <div class="row">
            <div class="col-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Data Siswa</h6>
                    </div>
                    {{--  filter  --}}
                    

                    {{--  Body Data  --}}
                    <div class="card-body">
                        {{--  Filter Jk  --}}
                        <div class="mb-3">
                            <label for="filter-jk"> Filter Berdasarkan Jenis Kelamin</label>
                            <select data-column="2" class="form-control col-sm-3 filter-jk" placeholder="Filter Berdasarkan Satuan Product">
                                <option value=""> Pilih Jenis Kelamin </option>
                                <option value="Laki-Laki"> Laki-Laki </option>
                                <option value="Perempuan"> Perempuan </option>
                            </select>
                        </div>
                        {{--  End Filter Jk  --}}

                        <div class="table-responsive">
                            <table class="table table-bordered" id="table-siswa" width="100%" cellspacing="0">
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

    {{--  button export css  --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.dataTables.min.css">

    {{--  Datepicker  --}}
    <script 
    src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.js"></script>

    {{--  Export  --}}
    <script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js"> </script>
    <script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.print.min.js"> </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"> </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"> </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"> </script>

    {{--  datatable  --}}
    <script> 
        var table = $('#table-siswa').DataTable({
            pageLength: 25,
            processing: true,
            serverSide: true,
            ajax: "{{ route ('api.siswa') }}",
            columns: [
                {"data":"nis"},
                {"data":"nama"},
                {"data":"jk.nama"},
                {"data":"alamat"},
                {"data":"created_at"},
            ],
        });

        $('.filter-jk').change(function () {
            table.column( $(this).data('column'))
            .search( $(this).val() )
            .draw();    
        });

    </script>   
@endpush
