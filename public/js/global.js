$(document).ready(function () {

    $('#changeViewKategori').on('click', function () {
        $('.kategori').hide();
        $('#createFormKategori').show().attr('hidden', false);
    });
    $('#backViewKategori').on('click', function () {
        $('#indexKategori').show().attr('hidden', false);
        $('#createFormKategori').attr('hidden', true);

    });

});
