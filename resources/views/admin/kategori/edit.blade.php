<div class="container kategoriEdit" id="editFormKategori" style="display: none;">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Dashboard
                    <button type="button" class="btn-sm btn btn-primary float-right" id="backViewKategori">
                        Kembali
                    </button>
                </div>
                <div class="card-body">
                    <form class="myFormEdit" method="post">
                        <input type="hidden" name="id" id="id">
                        <input type="hidden" name="_method" value="PATCH">
                        @csrf
                        <div class="form-group">
                            <label for="">Nama Kategori</label>
                            <input type="text" id="nama_kategori" name="nama_kategori" class="form-control nama_kategori" required>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-success" type="submit">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
