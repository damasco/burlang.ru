$(document).ready(function() {
    $('#rus-form').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            url: '/site/rus2bur',
            data: $(this).serialize(),
            success: function (response) {
                $('#rus-translation').html(response);
            }
        });
    });

    $('#bur-form').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            url: '/site/bur2rus',
            data: $(this).serialize(),
            success: function (response) {
                $('#bur-translation').html(response);
            }
        });
    });

    $('button.add-bur-word').on('click', function() {
        $('#bur-input').sendkeys($(this).text());
    });
});