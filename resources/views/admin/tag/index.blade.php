@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Tag Artikel
                    <a href="javascript:void(0)" class="btn btn-primary btn-sm float-right modal-show" id="tambahKategori">
                        Tambah Data
                    </a>
                </div>

                <div class="card-body">
                    <center>
                        @include('admin.kategori.create')
                    </center>
                    <br>
                    <div class="table-responsive">
                        <table id="datatable" class="table">
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
@endsection

@push('scripts')
<script>
$(document).ready(function() {
    // CSRF
    // $.ajaxSetup({
    //     headers: {
    //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //     }
    // });
    $('#datatable').dataTable({
        dataType: "json",
        ajax: "{{ route('api.json_tag') }}",
        // serverSide:true,
        responsive:true,
        columns: [
                { data: 'nama_tag', name: 'nama_tag' },
                { data: 'slug', name: 'slug' },
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
