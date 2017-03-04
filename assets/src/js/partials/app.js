$(document).ready(function () {
    $('#russian-form').on('beforeSubmit', function (e) {
        e.preventDefault();
        var $form = $(this);
        $.ajax({
            url: $form.attr('action'),
            data: $form.serialize()
        }).done(function (response) {
            $('#russian-translation').html(response);
        });
        return false;
    });

    $('#buryat-form').on('beforeSubmit', function (e) {
        e.preventDefault();
        var $form = $(this);
        $.ajax({
            url: $form.attr('action'),
            data: $form.serialize()
        }).done(function (response) {
            $('#buryat-translation').html(response);
        });
        return false;
    });

    $('button.add-input-letter').on('click', function () {
        var $this = $(this);
        $this.parent('span').siblings('input').sendkeys($this.text());
    });

    $('a.js-link-name').on('click', function(e) {
        e.preventDefault();
        var url = $('.buryat-name-list').data('url');
        var name = $(this).text();
        var $modal = $('#view-name-modal');
        $.ajax({
            url: url,
            data: {name: name}
        }).done(function (response) {
            $modal.find('.modal-title').html(name);
            $modal.find('.modal-body').html(response);
            $modal.modal('show');
        });
    });

    $('.image-responsive-container img').addClass('img-responsive');
});