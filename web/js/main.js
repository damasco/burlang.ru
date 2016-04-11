$(document).ready(function() {
    $('#ru-form').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            url: '/site/ru2bur',
            data: $(this).serialize(),
            success: function(response) {
                $('#ru-translation').html(response);
            }
        });
    });

    $('#bur-form').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            url: '/site/bur2ru',
            data: $(this).serialize(),
            success: function(response) {
                $('#bur-translation').html(response);
            }
        });
    });

    $('#burname-form').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            url: '/site/burname',
            data: $(this).serialize(),
            success: function(response) {
                $('#burname-response').html(response);
            }
        });
    });

    $('button.add-bur-word').on('click', function() {
        $(this).parent('span').siblings('input').sendkeys($(this).text());
    });

    $('a.link-name').on('click', function(e) {
        e.preventDefault();
        var $this = $(this);
        var $modal = $('#detail-name-modal');
        var html = '<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>';
        $.ajax({
            url: '/buryat-name/get-name',
            data: {name: $this.text()},
            success: function(response) {
                $modal.find('.modal-title').text($this.text());
                $modal.find('.modal-body').html(html + response);
                $('#detail-name-modal').modal('show');
            }
        });
    });
});