$(document).ready(function() {
    $('#uf').click(function() {

        var uf = $('#uf').val();

        $.post( 'ajuda.php', 
                {parametro: uf},
                function (dado, status) {
                    $('#resultado').html(dado);
        });
    });
});