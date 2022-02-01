$(function () {
    obrisi();
    izmena();
    $('#ljubimci-table').DataTable();
});


function obrisi() {

    $(document).on('click', '#obrisi_dugme', function () {

        let id = $(this).attr('value');

        $.ajax({
            url: 'obrisi.php',
            method: 'post',
            data: { id: id },

            success: function (data) {
                $('#content').html(data);
            }
        })

    })
}

function izmena() {

    $(document).on('click', '#izmeni_dugme', function () {

        let id = $(this).attr('value');

        $.ajax({
            url: 'izmena.php',
            method: 'post',
            data: { id: id },
            dataType: 'json',

            success: function (data) {
                $('#forma-izmena').show();
                $('#izmena_id').val(data.id);
                $('#izmena_tip').val(data.tip);
                $('#izmena_rasa').val(data.rasa);
                $('#izmena_ime').val(data.ime);
                $('#izmena_godine').val(data.godine);
                $('#izmena_boja').val(data.boja);
                $('#select-izmena').val(data.vlasnik_id);
            }
        })

    })

}