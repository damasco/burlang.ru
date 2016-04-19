$(document).ready(function() {
    $('#ru-form').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            url: '/site/ru2bur',
            data: $(this).serialize()
        }).done(function(response) {
            $('#ru-translation').html(response);
        });
    });

    $('#bur-form').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            url: '/site/bur2ru',
            data: $(this).serialize()
        }).done(function(response) {
            $('#bur-translation').html(response);
        });
    });

    $('#burname-form').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            url: '/site/burname',
            data: $(this).serialize()
        }).done(function(response) {
            $('#burname-response').html(response);
        });
    });

    $('button.add-bur-word').on('click', function() {
        $(this).parent('span').siblings('input').sendkeys($(this).text());
    });

    $('a.link-name').on('click', function(e) {
        e.preventDefault();
        var $this = $(this);
        var $modal = $('#detail-name-modal');
        $.ajax({
            url: '/buryat-name/get-name',
            data: {name: $this.text()}
        }).done(function(response) {
            $modal.find('.response-content').html(response);
            $modal.modal('show');
        });
    });
});