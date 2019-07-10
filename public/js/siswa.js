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
            // console.log(berhasil)
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
