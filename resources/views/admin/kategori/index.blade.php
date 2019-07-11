@extends('layouts.app')

@section('content')
<div class="container kategori" id="indexKategori">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Kategori Artikel
                    <button type="button" class="btn-sm btn btn-primary float-right" id="changeViewKategori">
                        Tambah Data
                    </button>
                </div>

                <div class="card-body" >
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
@include('admin.kategori.edit')
@endsection

@push('scripts')
{{-- CSRF --}}
<script>
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    });
</script>
{{-- End CSRF --}}

{{-- Get Index Data --}}
<script>
    // Index Data
    $('#datatable').dataTable({
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
                { data: 'id', render : function (id) {
                    return `
                    <a class="btn btn-success btn-sm" onclick="kategoriEdit(${id})" id="kategoriEdit">Edit</a>
                    <a class="btn btn-danger btn-sm hapus-data" data-id="${id}">Hapus</a>
                    `;
                    }
                }
            ]
        });
</script>
{{-- End Index --}}

{{-- Create Form & Store Data --}}
<script>
    // Store Data
    $('#createData').submit(function(e){
        var formData    = new FormData($('#createData'));
        e.preventDefault();
        $.ajax({
            url: "/api/kategori",
            type:'POST',
            data:formData,
            cache: true,
            contentType: false,
            processData: false,
            async:false,
            dataType: 'json',
            success:function(formData){
                $('#createFormKategori').hide();
                alert(formData.message)
                $('#datatable').DataTable().ajax.reload();
            },
            complete: function() {
                $("#indexKategori").show();
                $("#createData")[0].reset();
            }
        });
    });
</script>
{{-- end Create Form & Store Data --}}

<script>

    // get Edit Form
    function kategoriEdit(id)
    {
        console.log(id);
        // var dataUrl=$('.barangEdit').data('id-url');
        $('.kategori').hide();
        $('.kategoriEdit').show().attr('hidden', false);
        $.ajax({
            url: '/api/kategori/'+id,
            type:'get',
            cache: true,
            contentType: false,
            processData: false,
            async:false,
            dataType: 'json',
            success:function(data){
            console.log(data.data.nama_kategori);
            $('input#id').val(data.id);
            $('input#nama_kategori').val(data.data.nama_kategori);
            },
            complete: function() {
                // $('#indexkategori').attr('hidden', false);
            }
        });
    }
</script>

<script>
    $('.myFormEdit').submit(function(e){
        var formData    = new FormData($('.myFormEdit')[0]);
        var id = formData.get('id');
        e.preventDefault();
        $.ajax({
            url: '/api/kategori/'+id,
            type:'post',
            data:formData,
            cache: true,
            contentType: false,
            processData: false,
            async:false,
            dataType: 'json',
            success:function(respone){
                $('.kategoriEdit').hide();
                $('#datatable').DataTable().ajax.reload();
            },
            complete: function() {
                $('#indexKategori').show();
            }
        });
    });
</script>

<script>
    // Delete Data
    $("#datatable").on('click', '.hapus-data', function () {
        var id = $(this).data("id");
        // alert(id)
        $.ajax({
            url: '/api/kategori/'+id,
            method: "DELETE",
            dataType: "json",
            data: {
                id: id
            },
            success: function (berhasil) {
                alert(berhasil.message)
                $('#datatable').DataTable().ajax.reload();
            },
            error: function (gagal) {
                console.log(gagal)
            }
        })
    })
</script>
@endpush
