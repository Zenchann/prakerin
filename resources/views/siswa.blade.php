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

