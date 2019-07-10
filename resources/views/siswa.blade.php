@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">

                    <form action="">
                        <div class="form-group">
                            <label for="">Nama</label>
                            <input type="text" name="nama" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="">NIS</label>
                            <input type="text" name="nis" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="">ALAMAT</label>
                            <input type="text" name="alamat" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="">JENIS KELAMIN</label>
                            <input type="text" name="jenis_kelamin" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="">TGL LAHIR</label>
                            <input type="date" name="tgl_lahir" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-success">Simpan</button>
                        </div>
                    </form>

                    <div class="table-responsive">
                        <table id="datatable" class="table">
                            <tr>
                                <th>Nama</th>
                                <th>NIS</th>
                                <th>ALAMAT</th>
                                <th>Jenis Kelamin</th>
                                <th>Tanggal Lahir</th>
                            </tr>
                            <tbody class="data-siswa"></tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script>
$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var alamat = '/api/siswa'
    // Get Data Siswa
    $.ajax({
        url: alamat,
        method: "GET",
        dataType: "json",
        success: function (berhasil) {
            console.log(berhasil)
            $.each(berhasil.data, function (key, value) {
                $(".data-siswa").append(
                    `
                    <tr>
                        <td>${value.nama}</td>
                        <td>${value.nis}</td>
                        <td>${value.alamat}</td>
                        <td>${value.jenis_kelamin}</td>
                        <td>${value.tgl_lahir}</td>
                    </tr>
                    `
                )
            })
        },
        error: function () {
            console.log('data tidak ada');
        }
    });

    // Post Data siswa
    // Simpan Data
    $(".simpan-data").click(function (simpan) {
        simpan.preventDefault();
        var nama = $("input[name=nama]").val();
        var nis = $("input[name=nis]").val();
        var alamat = $("input[name=alamat]").val();
        var jenis_kelamin = $("input[name=jenis_kelamin]").val();
        var tgl_lahir = $("input[name=tgl_lahir]").val();
        console.log(nama)
        $.ajax({
            url: alamat,
            method: "POST",
            dataType: "json",
            data: {
                nama: nama,
                nis: nis,
                alamat: alamat,
                jenis_kelamin: jenis_kelamin,
                tgl_lahir: tgl_lahir,
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
})

</script>
@endpush
