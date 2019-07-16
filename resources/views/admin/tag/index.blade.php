@extends('layouts.app')

@section('content')
<div class="container tag" id="indextag">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Tag Artikel
                    <button class="btn btn-sm btn-success float-right" data-toggle="modal" data-target="#modalTambahTag">Tambah</button>
                </div>

                <div class="card-body" >
                    <br>
                    <div class="table-responsive">
                        <table id="datatable-tag" class="table">
                            <thead>
                                <tr>
                                    <th>Nama Tag</th>
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
@include('admin.tag.create')
@include('admin.tag.edit')
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
    $('#datatable-tag').dataTable({
        dataType: "json",
        ajax: {
                url: '/api/tag/',
                dataType: "json",
                type: "GET",
                stateSave : true,
                serverSide: true,
                processing: true,
        },
        responsive:true,
        columns: [
                { data: 'nama_tag', name: 'nama_tag' },
                { data: 'slug', name: 'slug' },
                { data: 'id', render : function (data, type, row, meta) {
                    return `
                    <button type="button" class="btn btn-sm btn-success edit-tag"
                        data-target="#modalEditTag"
                        data-toggle="modal"
                        data-id="${row.id}"
                        data-nama_tag="${row.nama_tag}"
                        >Edit</button>
                        <button class="btn btn-sm btn-danger edit-data" data-id="${row.id}" id="hapus-dataTag">Hapus</button>
                    `;
                    }
                }
            ]
        });

        // Store Data tag
        $('#createDataTag').submit(function (e) {
        var formData = new FormData($('#createDataTag')[0]);
        e.preventDefault();
        $.ajax({
            url: "/api/tag",
            type: 'POST',
            data: formData,
            cache: true,
            contentType: false,
            processData: false,
            async: false,
            dataType: 'json',
            success: function (result) {
                $('#modalTambahtag').modal('hide');
                alert(result.message)
                location.reload();
            },
            complete: function () {
                $("#createDataTag")[0].reset();
            }
        });
    });

    // get Edit data
    $('#modalEditTag').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget)
        var id = button.data('id')
        var nama_tag = button.data('nama_tag')
        var modal = $(this)
        modal.find('.modal-body input[name="id"]').val(id)
        modal.find('.modal-body input[name="nama_tag"]').val(nama_tag)
    })

    // Update Data tag
    $('#editDataTag').submit(function (e) {
        var formData = new FormData($('#editDataTag')[0]);
        var id = formData.get('id');
        e.preventDefault();
        $.ajax({
            url: "/api/tag/" + id,
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
    $("#datatable-tag").on('click', '#hapus-dataTag', function () {
        var id = $(this).data("id");
        // alert(id)
        $.ajax({
            url: '/api/tag/' + id,
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
