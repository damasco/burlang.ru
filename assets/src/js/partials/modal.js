$(document).ready(function() {
    var $modal = $('#view-name-modal');

    $modal.on('hide.bs.modal', function() {
        window.location.hash = '';
    });

    if ($modal != undefined && window.location.hash != "") {
        var hash = window.location.hash;
        var name = hash.slice(1);
        getName(name);
    }

    $('a.link-name').on('click', function(e) {
        e.preventDefault();
        window.location.hash = $(this).attr('href');
        var name = $(this).text();
        getName(name);
    });

    function getName(name) {
        $.ajax({
            type: 'POST',
            url: '/buryat-name/view-name',
            data: {name: name}
        }).done(function (response) {
            $modal.find('.modal-title').html(name);
            $modal.find('.modal-body').html(response);
            $modal.modal('show');
        });
    }
});