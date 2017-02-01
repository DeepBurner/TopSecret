
$('.message').on('click', function (event) {
    event.preventDefault();

    console.log('it works');
    $('#post-body').val('Your message');
    $('#edit-modal').modal();
});

$('#modal-save').on('click', function () {
    $.ajax({
        method: 'POST',
        url: urlEdit,
        data: {message: $('#post-body').val(), receiver: recid, _token: token}
    }).done(function (msg) {
        $('#edit-modal').modal('hide');
    });
});