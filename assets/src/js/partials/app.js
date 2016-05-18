$(document).ready(function() {
    $('#russian-form').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            url: '/site/russian-translate',
            data: $(this).serialize()
        }).done(function(response) {
            $('#russian-translation').html(response);
        });
    });

    $('#buryat-form').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            url: '/site/buryat-translate',
            data: $(this).serialize()
        }).done(function(response) {
            $('#buryat-translation').html(response);
        });
    });

    $('button.add-buryat-word').on('click', function() {
        $(this).parent('span').siblings('input').sendkeys($(this).text());
    });

    $('a.link-name').on('click', function(e) {
        e.preventDefault();
        var $this = $(this);
        var $modal = $('#detail-name-modal');
        $.ajax({
            url: '/buryat-name/get-name',
            data: { name: $this.text() }
        }).done(function(response) {
            $modal.find('.response-content').html(response);
            $modal.modal('show');
        });
    });
});