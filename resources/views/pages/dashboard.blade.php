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
                    {{--  Body Data  --}}
                    <div class="card-body">
                        {{-- Datepicker Range --}}
                        <label  for="input-range"> Filter Berdasarkan Tanggal Masuk Siswa</label>  
                        <div class="row input-daterange mb-3">                 
                            <div class="col-md-2">
                                <input type="text" name="from_date" id="from_date" class="form-control" placeholder="From Date"
                                    readonly />
                            </div>
                            <div class="col-md-2">
                                <input type="text" name="to_date" id="to_date" class="form-control " placeholder="To Date"
                                    readonly />
                            </div>
                            <div class="col-md-4">
                                <button type="button" name="filter" id="filter" class="btn btn-primary">Filter</button>
                                <button type="button" name="refresh" id="refresh" class="btn btn-default">Refresh</button>
                            </div>
                        </div>
                        {{-- End Datepicker Range --}}

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
                            </table>
                        </div>
                    </div>
                    {{--  End Body Data  --}}
                </div>
            </div>
        </div>
        {{--  End Content Data Siswa  --}}
    </div>
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

    <script>
        $(document).ready(function () {
            //jalankan function load_data diawal agar data ter-load
            load_data();

            //Iniliasi datepicker pada class input
            $('.input-daterange').datepicker({
                todayBtn: 'linked',
                format: 'yyyy-mm-dd',
                autoclose: true
            });

            //button filter klik
            $('#filter').click(function () {
                var from_date = $('#from_date').val(); 
                var to_date = $('#to_date').val(); 
                if (from_date != '' && to_date != '') {
                    $('#table-siswa').DataTable().destroy();
                    load_data(from_date, to_date);
                } else {
                    alert('Both Date is required');
                }
            });

            //refresh load semua data
            $('#refresh').click(function () {
                $('#from_date').val('');
                $('#to_date').val('');
                $('#table-siswa').DataTable().destroy();
                load_data();
            });

            //filter dari jenis kelamin
            $('.filter-jk').change(function () {
                $('#table-siswa').DataTable().column( $(this).data('column'))
                .search( $(this).val() )
                .draw();
            });

            //LOAD DATATABLE
            //script untuk memanggil data json dari server dan menampilkannya berupa datatable
            //load data menggunakan parameter tanggal dari dan tanggal hingga
            function load_data(from_date = '', to_date = '') {
                $('#table-siswa').DataTable({
                    processing: true,
                    serverSide: true, //aktifkan server-side 
                    ajax: {
                        url: "{{ route('dashboard.index') }}",
                        type: 'GET',
                        data:{from_date:from_date, to_date:to_date} //jangan lupa kirim parameter tanggal 
                    },
                    columns: [
                        {"data":"nis"},
                        {"data":"nama"},
                        {"data":"jk.nama"},
                        {"data":"alamat"},
                        {"data":"created_at"}
                    ],
                });
            }
        });
    </script>
    
@endpush
