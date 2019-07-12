<!-- Modal -->
<div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Produk</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="editData" method="POST">
            <div class="modal-body">
                <input type="hidden" name="id" id="id">
                <input type="hidden" name="_method" value="PATCH" id="">
                    @csrf
                <div class="form-group">
                    <label for="">Nama Produk</label>
                    <input type="text" id="nama" name="nama" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="">Harga Produk</label>
                    <input type="number" id="harga" name="harga" class="form-control" required>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary tombol-simpan">Save changes</button>

            </div>
        </form>
        </div>
    </div>
</div>
