$(document).ready(function() {
    $('#ru-form').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            url: '/site/ru2bur',
            data: $(this).serialize(),
            success: function (response) {
                $('#ru-translation').html(response);
            }
        });
    });

    $('#bur-form').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            url: '/site/bur2ru',
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