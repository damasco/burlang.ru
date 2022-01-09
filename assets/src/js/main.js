$(document).ready(function () {
    var renderNotFoundTranslations = function (block) {
        block.html('<div class=\"alert alert-danger\">Перевода нет</div>');
    };
    var clearTranslations = function (block) {
        block.html('');
    };
    var renderTranslations = function (block, translations) {
        if (translations.length > 0) {
            var html = '<div class=\"alert alert-success\"><ul class=\"translate-list\">';
            translations.forEach(function (translation) {
                html += '<li>' + translation.value + '</li>';
            });
            html += '</ul></div';
            block.html(html);
        } else {
            renderNotFoundTranslations(block);
        }
    };

    $('#russian-form').on('beforeSubmit', function (e) {
        e.preventDefault();
        var $form = $(this);
        var translationsBlock = $('#russian-translation');
        clearTranslations(translationsBlock);
        $.ajax({
            url: $form.attr('action'),
            data: {q: $form.find('input[name=\'q\']').val()}
        }).done(function (response) {
            renderTranslations(translationsBlock, response.translations);
        }).fail(function () {
            renderNotFoundTranslations(translationsBlock);
        });
        return false;
    });

    $('#buryat-form').on('beforeSubmit', function (e) {
        e.preventDefault();
        var $form = $(this);
        var translationsBlock = $('#buryat-translation');
        clearTranslations(translationsBlock);
        $.ajax({
            url: $form.attr('action'),
            data: {q: $form.find('input[name=\'q\']').val()}
        }).done(function (response) {
            renderTranslations(translationsBlock, response.translations);
        }).fail(function () {
            renderNotFoundTranslations(translationsBlock);
        });
        return false;
    });

    $('button.add-input-letter').on('click', function () {
        var $this = $(this);
        $this.parent('span').siblings('input').sendkeys($this.text());
    });

    $('a.js-link-name').on('click', function (e) {
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