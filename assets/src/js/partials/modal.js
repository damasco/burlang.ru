$(document).ready(function() {
    var $modal = $('#view-name-modal');

    $('a[data-toggle="modal"]').click(function() {
        window.location.hash = $(this).attr('href');
    });

    $modal.on('hide.bs.modal', function () {
        window.location.hash = '';
    });

    $('a.link-name').on('click', function (e) {
        e.preventDefault();
        var name = $(this).text();
        getName(name);
    });

    if ($modal != undefined && window.location.hash != "") {
        var hash = window.location.hash;
        var name = hash.slice(1);
        getName(name);
    }

    function getName(name) {
        $.ajax({
            url: '/buryat-name/view-name',
            data: {name: name}
        }).done(function (response) {
            $modal.find('.modal-title').html(name);
            $modal.find('.modal-body').html(response);
            $modal.modal('show');
        });
    }
});