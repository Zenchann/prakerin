@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Tag Artikel
                    <button type="button" class="btn-sm btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal">
                        Tambah Data
                    </button>
                </div>

                <div class="card-body">
                    <center>
                        @include('admin.tag.create')
                    </center>
                    <br>
                    <div class="table-responsive">
                        <table id="datatable" class="table">
                            <thead>
                                <tr>
                                    <th>Nama tag</th>
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
        ajax: "{{ route('api.json_tag') }}",
        responsive:true,
        columns: [
                { data: 'nama_tag', name: 'nama_tag' },
                { data: 'slug', name: 'slug' },
                { data: 'id', render : function (id) {
                    return `<a class="btn btn-warning btn-sm" id="kategoritEdit">Edit</a>
                            <a class="btn btn-danger btn-sm hapus-data" data-id="${id}">Hapus</a>`;
                    }
                }
            ]
    });

    // Store Data
    $(".tombol-simpan").click(function (simpan) {
        simpan.preventDefault();
        var nama_tag = $("input[name=nama_tag]").val();
        // console.log(nama_tag)
        $.ajax({
            url: "{{ route('admin.tag.store') }}",
            method: "POST",
            dataType: "json",
            data: {
                nama_tag: nama_tag,
            },
            success: function (berhasil) {
                alert(berhasil.message)
                location.reload();
            },
            error: function (gagal) {
                console.log(gagal)
            }
        })
    });

    // Delete Data
    $("#datatable").on('click', '.hapus-data', function () {
        var id = $(this).data("id");
        // alert(id)
        $.ajax({
            url: '/admin/tag/'+id,
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
