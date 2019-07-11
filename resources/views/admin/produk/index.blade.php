@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Data Produk
                    <button class="btn btn-sm btn-success float-right" data-toggle="modal" data-target="#modalTambah">Tambah</button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Nama Produk</th>
                                    <th>Harga</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="data-produk">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('admin.produk.create')
@include('admin.produk.edit')
@endsection


@push('scripts')
<script>
    $(document).ready(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var alamat = '/api/produk'
        // Get Data Produk
        $.ajax({
            url: alamat,
            method: "GET",
            dataType: "json",
            success: function (berhasil) {
                console.log(berhasil)
                $.each(berhasil.data, function (key, value) {
                    $("#data-produk").append(
                        `
                        <tr>
                            <td>${value.nama}</td>
                            <td>${value.harga}</td>
                            <td>
                                <button type="button" class="btn btn-sm btn-success edit-produk"
                                data-target="#modalEdit"
                                data-toggle="modal"
                                data-nama="${value.judul}"
                                data-harga="${value.konten}"
                                data-id="${value.id}"
                                >Edit</button>
                                <button class="btn btn-sm btn-danger" data-id="${value.id}" id="hapus-data">Hapus</button>
                            </td>
                        </tr>
                        `
                    )
                })
            },
            error: function () {
                console.log('data tidak ada');
            }
        });
    });

    // Tambah Data
    $('#createData').submit(function(e){
        var formData    = new FormData($('#createData')[0]);
        e.preventDefault();
        $.ajax({
            url: "/api/produk",
            type:'POST',
            data:formData,
            cache: true,
            contentType: false,
            processData: false,
            async:false,
            dataType: 'json',
            success:function(formData){
                $('#modalTambah').modal('hide');
                alert(formData.message)
                location.reload();
            },
            complete: function() {
                $("#createData")[0].reset();
            }
        });
    });

    /
    // Hapus Data
    $(".table").on('click', '#hapus-data', function () {
        var id = $(this).data("id");
        // alert(id)
        $.ajax({
            url: '/api/produk/'+id,
            method: "DELETE",
            dataType: "json",
            data: {
                id: id
            },
            success: function (berhasil) {
                alert(berhasil.message)
                location.reload();
            },
            error: function (gagal) {
                console.log(gagal)
            }
        })
    })
</script>
@endpush
