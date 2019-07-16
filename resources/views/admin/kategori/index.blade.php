@extends('layouts.app')

@section('content')
<div class="container kategori" id="indexKategori">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Kategori Artikel
                    <button class="btn btn-sm btn-success float-right" data-toggle="modal" data-target="#modalTambahKategori">Tambah</button>
                </div>

                <div class="card-body" >
                    <br>
                    <div class="table-responsive">
                        <table id="datatable-kategori" class="table">
                            <thead>
                                <tr>
                                    <th>Nama Kategori</th>
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
@include('admin.kategori.create')
@include('admin.kategori.edit')
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


    // Index Data
    $('#datatable-kategori').dataTable({
        dataType: "json",
        ajax: {
                url: '/api/kategori/',
                dataType: "json",
                type: "GET",
                stateSave : true,
                serverSide: true,
                processing: true,
        },
        responsive:true,
        columns: [
                { data: 'nama_kategori', name: 'nama_kategori' },
                { data: 'slug', name: 'slug' },
                { data: 'id', render : function (data, type, row, meta) {
                    return `
                    <button type="button" class="btn btn-sm btn-success edit-kategori"
                        data-target="#modalEditKategori"
                        data-toggle="modal"
                        data-id="${row.id}"
                        data-nama_kategori="${row.nama_kategori}"
                        >Edit</button>
                        <button class="btn btn-sm btn-danger edit-data" data-id="${row.id}" id="hapus-dataKategori">Hapus</button>
                    `;
                    }
                }
            ]
        });

        // Store Data Kategori
        $('#createDataKategori').submit(function (e) {
        var formData = new FormData($('#createDataKategori')[0]);
        e.preventDefault();
        $.ajax({
            url: "/api/kategori",
            type: 'POST',
            data: formData,
            cache: true,
            contentType: false,
            processData: false,
            async: false,
            dataType: 'json',
            success: function (result) {
                $('#modalTambahKategori').modal('hide');
                alert(result.message)
                location.reload();
            },
            complete: function () {
                $("#createDataKategori")[0].reset();
            }
        });
    });

    // get Edit data
    $('#modalEditKategori').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget)
        var id = button.data('id')
        var nama_kategori = button.data('nama_kategori')
        var modal = $(this)
        modal.find('.modal-body input[name="id"]').val(id)
        modal.find('.modal-body input[name="nama_kategori"]').val(nama_kategori)
    })

    // Update Data kategori
    $('#editDataKategori').submit(function (e) {
        var formData = new FormData($('#editDataKategori')[0]);
        var id = formData.get('id');
        e.preventDefault();
        $.ajax({
            url: "/api/kategori/" + id,
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            async: false,
            dataType: 'json',
            success: function (result) {
                alert(result.message)
                location.reload();
            },
        });
    });

    // Hapus Data
    $("#datatable-kategori").on('click', '#hapus-dataKategori', function () {
        var id = $(this).data("id");
        // alert(id)
        $.ajax({
            url: '/api/kategori/' + id,
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

});
</script>
@endpush
