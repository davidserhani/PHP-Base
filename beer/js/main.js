$(function () {
    $('.confirm-delete').on('click', function (event) {
        event.preventDefault();
        var button = event.currentTarget;
        swal({
            title: 'Êtes vous sûr de vouloir supprimer ?',
            icon: 'warning',
            buttons: true,
            dangerMode: true
        }).then(function (hasConfirm) {
            if(hasConfirm) {
                window.location = $(button).attr('href');
            }
        });
    });

});