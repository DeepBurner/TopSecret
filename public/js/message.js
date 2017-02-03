
$('.message').on('click', function (event) {
    event.preventDefault();

    console.log('it works');
    $('#message-modal-body').val('Your message');
    $('#message-modal').modal();
});

$('#message-modal-send').on('click', function () {
    $.ajax({
        method: 'POST',
        url: urlEdit,
        data: {message: $('#message-modal-body').val(), receiver: recid, _token: token}
    }).done(function (msg) {
        $('#message-modal').modal('hide');
    });
});
