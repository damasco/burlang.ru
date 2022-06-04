$(document).ready(function () {
  $('button.add-input-letter').on('click', function () {
    let $this = $(this);
    $this.parent('span').siblings('input').sendkeys($this.text());
  });

  $('a.js-link-name').on('click', function (e) {
    e.preventDefault();
    let url = $('.buryat-name-list').data('url');
    let name = $(this).text();
    let $modal = $('#view-name-modal');
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
