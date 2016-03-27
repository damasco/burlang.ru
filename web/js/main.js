$(document).ready(function() {
    $('#rus-form').on('submit', function(e) {
        e.preventDefault();
        var data = $(this).serialize();
        $.ajax({
            url: '/site/rus2bur',
            data: data,
            success: function (response) {
                $('#rus-translation').html(response);
            }
        });
    });

    $('#bur-form').on('submit', function(e) {
        e.preventDefault();
        var data = $(this).serialize();
        $.ajax({
            url: '/site/bur2rus',
            data: data,
            success: function (response) {
                $('#bur-translation').html(response);
            }
        });
    });

    $('button.add-bur-word').on('click', function() {
        var $this = $(this);
        var $bur_input = $('#bur-input');
        $bur_input.sendkeys($this.text());
    });
});