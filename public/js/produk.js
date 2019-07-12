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
                        data-id="${value.id}"
                        data-nama="${value.nama}"
                        data-harga="${value.harga}"
                        >Edit</button>
                        <button class="btn btn-sm btn-danger edit-data" data-id="${value.id}" id="hapus-data">Hapus</button>
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


    // Tambah Data
    $('#createData').submit(function (e) {
        var formData = new FormData($('#createData')[0]);
        e.preventDefault();
        $.ajax({
            url: "/api/produk",
            type: 'POST',
            data: formData,
            cache: true,
            contentType: false,
            processData: false,
            async: false,
            dataType: 'json',
            success: function (result) {
                $('#modalTambah').modal('hide');
                alert(result.message)
                location.reload();
            },
            complete: function () {
                $("#createData")[0].reset();
            }
        });
    });

    // get Edit data
    $('#modalEdit').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget)
        var id = button.data('id')
        var nama = button.data('nama')
        var harga = button.data('harga')
        var modal = $(this)
        modal.find('.modal-body input[name="id"]').val(id)
        modal.find('.modal-body input[name="nama"]').val(nama)
        modal.find('.modal-body input[name="harga"]').val(harga)
    })

    // Update Data
    $('#editData').submit(function (e) {
        var formData = new FormData($('#editData')[0]);
        var id = formData.get('id');
        e.preventDefault();
        $.ajax({
            url: "/api/produk/" + id,
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
    $(".table").on('click', '#hapus-data', function () {
        var id = $(this).data("id");
        // alert(id)
        $.ajax({
            url: '/api/produk/' + id,
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
