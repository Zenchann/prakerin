@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Artikel X
                    <button type="button" class="btn-sm btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal">
                        Tambah Data
                    </button>
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
                                    <th>Judul</th>
                                    <th>Slug</th>
                                    <th>Kategori</th>
                                    <th>Penulis</th>
                                    <th>Tag</th>
                                    <th>Foto</th>
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
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('#datatable').dataTable({
        dataType: "json",
        ajax: "/api/artikel",
        responsive:true,
        columns: [
                { data: 'judul', name: 'judul' },
                { data: 'slug', name: 'slug' },
                { data: 'kategori.nama_kategori', name: 'kategori.nama_kategori' },
                { data: 'user.name', name: 'user.name' },
                { data: 'tag[].nama_tag', render :  function(nama_tag){
                        return `${nama_tag}`
                    }
                },
                { data: 'foto', render :  function(foto){
                        return '<img src="/assets/img/fotoartikel/'+foto+'" style="width:150px; height:100px;" alt="foto">';
                    }
                },
                { data: 'id', render : function (id) {
                    return  '<a class="btn btn-warning btn-sm" onclick="kategoritEdit('+id+')" id="kategoritEdit">Edit</a>'+
                        ' <a class="btn btn-danger btn-sm" onclick="kategoritDelete('+id+')" id="kategoritDelete">Hapus</a>';
                    }
                }
            ]
        });

        // Get Kategori
        $.ajax({
            url: '/api/kategori',
            method: "GET",
            dataType: "json",
            success: function (berhasil) {
                console.log(berhasil)
                $.each(berhasil.data, function (key, value) {
                    $("#kategori").append(
                        `
                            <option value="${value.id}">${value.nama_kategori}</option>
                        `
                    )
                })
            },
            error: function () {
                console.log('data tidak ada');
            }
        });

        // Get Tag
        $('.tag').select2({});
        $.ajax({
            url: '/api/tag',
            method: "GET",
            dataType: "json",
            success: function (berhasil) {
                console.log(berhasil)
                $.each(berhasil.data, function (key, value) {
                    $(".tag").append(
                        `
                        <option value="${value.id}">${value.nama_tag}</option>
                        `
                    )
                })
            },
            error: function () {
                console.log('data tidak ada');
            }
        });

        // Store Data
        $('#createData').submit(function(e){
        var formData    = new FormData($('#createData')[0]);
        e.preventDefault();
        $.ajax({
            url: '/api/artikel',
            type:'POST',
            data:formData,
            cache: true,
            contentType: false,
            processData: false,
            async:false,
            dataType: 'json',
            success:function(formData){
                $('#exampleModal').modal('hide');
                $('#datatable').DataTable().ajax.reload();
                alert(formData.message)
            },
            complete: function() {
                $("#indexKategori").show();
                $("#createData")[0].reset();
            }
        });
    });
});
</script>
@endpush
