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

    $('button.add-input-letter').on('click', function() {
        var $this = $(this);
        $this.parent('span').siblings('input').sendkeys($this.text());
    });

    $('a.link-name').on('click', function(e) {
        e.preventDefault();
        var name = $(this).text();
        var $modal = $('#view-name-modal');
        $.ajax({
            url: '/buryat-name/view-name',
            data: { name: name }
        }).done(function(response) {
            $modal.find('.modal-title').html(name);
            $modal.find('.modal-body').html(response);
            $modal.modal('show');
        });
    });
});