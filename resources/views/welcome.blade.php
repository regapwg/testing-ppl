@extends('layouts.app')
@section('action')

@endsection
@section('content')

@if(session()->has('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
</div> 
@endif

<div class="nk-fmg-body-head d-none d-lg-flex">
    <div class="nk-fmg-search">
        <h4 class="card-title text-primary"><i class='{{$icon}}' data-toggle='tooltip' data-placement='bottom' title='Data {{$subtitle}}'></i>  {{strtoupper("Data ".$subtitle)}}</h4>
    </div>
    <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right">
        <a href="{{ route('user-login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>
        <a href="{{ route('user-signup') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
    </div>
    <div class="nk-fmg-actions">
        {{-- <div class="btn-group">
            <a href="{{ route('krs.create') }}" class="btn btn-sm btn-primary" onclick="buttondisable(this)"><em class="icon fas fa-plus"></em> <span>Add KRS</span></a>
        </div> --}}
    </div>
</div>
<div class="row gy-3 d-none" id="loaderspin">
    <div class="col-md-12">
        <div class="col-md-12" align="center">
            &nbsp;
        </div>
        <div class="d-flex align-items-center">
          <div class="col-md-12" align="center">
            <div class="spinner-border ms-auto" role="status" aria-hidden="true"></div>
          </div>
        </div>
        <div class="col-md-12" align="center">
            <strong>Loading...</strong>
        </div>
    </div>
</div>
<div class="card d-none" id="filterrow">
    <div class="card-body" style="background:#f7f9fd">
        <div class="row gy-3" >
            
        </div>
    </div>
</div>

<!-- <div class="nk-fmg-body-content"> -->
    <div class="nk-fmg-quick-list nk-block">
        <div class="card">
            <div class="card-body">
                {{-- <div class="table-responsive"> --}}
                <div>
                    <table id="{{$table_id}}" class="table table-striped table-bordered nowrap" style="width:100%">
                        <thead style="color:#526484; font-size:11px;">
                            
                            {{-- <th>No.</th>
                            <th>Tahun Ajaran KRS</th>
                            <th>NIM Mahasiswa</th>
                            <th>Nama Mahasiswa</th>
                            <th>Aksi</th> --}}
                            <th>No.</th>
                            <th>Tahun Ajaran</th>
                            <th>Nama Matakuliah</th>
                            <th>Nama Mahasiswa</th>
                            <th>Nilai Huruf</th>
                            <th>Nilai Akhir</th>
                            <th>Aksi</th>
                            
                        </thead>
                        
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="nk-fmg-quick-list nk-block">
        <form name="formPendaftaran" action="{{ url('/cekIPK') }}" method="POST">
            @csrf
            <div class="card">
                <div class="card-body">
    
                    <div class="mb-3 row">
                        <label for="nim" class="col-sm-2 col-form-label">Ketik NIM Anda</label>
                        <input type="text" class="form-control" name='nim' id="nim">
                    </div> 
    
                    <div class="mb-3 row">
                        <div class="col-sm-5"><a title='Cek IPK' href='javascript:void(0)' onclick='store()' class='btn btn-primary'>Cek IPK</a></div>
                    </div>
                </div>
            </div>
        </form>
    </div>


@endsection
@push('script')
<script>
var table;
$(document).ready(function() {
    table = $('#{{$table_id}}').DataTable({
        scrollX: true,
        processing:true,
        autoWidth: true,
        ordering: true,
        serverSide: true,
        dom: '<"row justify-between g-2 "<"col-7 col-sm-4 text-left"f><"col-5 col-sm-8 text-right"<"datatable-filter"<"d-flex justify-content-end g-2" l>>>><" my-3"t><"row align-items-center"<"col-5 col-sm-12 col-md-6 text-left text-md-left"i><"col-5 col-sm-12 col-md-6 text-md-right"<"d-flex justify-content-end "p>>>',
        ajax: {
            url: '{{ route("semuakrs.listData") }}',
            type:"POST",
            data: function(params) {
                params._token = "{{ csrf_token() }}";
            }
        },
        columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
            {
                data: 'nama_krs',
                name: 'nama_krs',
                orderable: true,
                searchable: true,
                class: 'text-left'
            },
            {
                data: 'nama_mk',
                name: 'nama_mk',
                orderable: true,
                searchable: true,
                class: 'text-left'
            },
            {
                data: 'nama_mahasiswa',
                name: 'nama_mahasiswa',
                orderable: true,
                searchable: true,
                class: 'text-left'
            },
            {
                data: 'nilai_huruf',
                name: 'nilai_huruf',
                orderable: false,
                searchable: false,
                class: 'text-center'
            },
            {
                data: 'nilai_akhir',
                name: 'nilai_akhir',
                orderable: false,
                searchable: false,
                class: 'text-center'
            },
            {
                data: 'aksi',
                name: 'aksi',
                orderable: false,
                searchable: false,
                class: 'text-center'
            }
        ],
    });
    
    $('.dataTables_filter').html('<div><div class="input-group"><div class="input-group-prepend"><span class="input-group-text" id="basic-addon1"><em class="ti ti-search"></em></span></div><input type="search" class="form-control form-control-sm" placeholder="Type in to Search" aria-controls="tbtariflayanan"></div></div>');
});

function store(){
    if (document.forms["formPendaftaran"]["nim"].value =="") {
            CustomSwal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'NIM Tidak Boleh Kosong',
            })
            document.forms["formPendaftaran"]["nim"].focus();
            return false;
    }

    // buttonsmdisable(elm);
    CustomSwal.fire({
        icon:'question',
        text: 'Yakin Data Sudah Benar ?',
        showCancelButton: true,
        confirmButtonText: 'Submit',
        cancelButtonText: 'Batal',
    }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
            $.ajax({
                url:"{{url('/cekIPK')}}",
                data:{
                    _method: "POST",
                    _token:"{{csrf_token()}}",
                    nim:$("#nim").val()
                },
                type:"POST",
                dataType:"JSON",
                success:function(data){
                    if(data.success == 1){
                        CustomSwal.fire('Sukses', data.msg, 'success').then((result) => {
                            // if (result.isConfirmed) {
                            //     "BERHASIL!";
                            // }
                        });
                    }
                    else
                    {
                        CustomSwal.fire('Gagal', data.msg, 'error');
                    }
                },
                error:function(error){
                    CustomSwal.fire('Gagal', 'terjadi kesalahan sistem', 'error');
                    console.log(error.XMLHttpRequest);
                },
            });
        }
    });
}
</script>
@endpush