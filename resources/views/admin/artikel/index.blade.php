@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Artikel
                    <a href="javascript:void(0)" class="btn btn-primary btn-sm float-right modal-show" id="tambahartikel">
                        Tambah Data
                    </a>
                </div>

                <div class="card-body">
                    <center>
                        @include('admin.artikel.create')
                    </center>
                    <br>
                    <div class="table-responsive">
                        <table id="datatable" class="table">
                            <thead>
                                <tr>
                                    <th>Nama artikel</th>
                                    <th>Slug</th>
                                    <th>Kategori</th>
                                    <th>Penulis</th>
                                    <th>Slug</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('admin.artikel.create')
@endsection

@push('scripts')
<script>
$(document).ready(function() {
    // CSRF
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('#datatable').dataTable({
        dataType: "json",
        ajax: "{{ route('api.json_artikel') }}",
        // serverSide:true,
        responsive:true,
        columns: [
                { data: 'judul', name: 'judul' },
                { data: 'slug', name: 'slug' },
                { data: 'kategori.nama_kategori', name: 'kategori.nama_kategori' },
                { data: 'user.name', name: 'user.name' },
                { data: 'foto', render :  function(foto){
                        return '<img src="'+foto+'" style="width:150px;" alt="foto">';
                    }
                },
                { data: 'id', render : function (id) {
                    return  '<a class="btn btn-warning btn-sm" onclick="kategoritEdit('+id+')" id="kategoritEdit">Edit</a>'+
                        ' <a class="btn btn-danger btn-sm" onclick="kategoritDelete('+id+')" id="kategoritDelete">Hapus</a>';
                    }
                }
            ]
        });
});
</script>
@endpush
