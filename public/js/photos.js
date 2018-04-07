function deleteModal() {
    var photoId = $(this).attr('data-gallery-id');
    $('#deletePhotoModal_' + photoId).modal('toggle');
}

$(document).on('click', '.delete-button', deleteModal);

function deletePhoto() {
    var photoId = $(this).attr('data-gallery-id');
    var url = $(this).attr('data-url');
    $.ajax({
        url: url,
        data: {photoId : photoId} ,
        type: "GET",
        success: function (response) {
            $('#photo_' + photoId).hide('slow')
        },
        error: function (xhr, status, error) {
            $('#modal-error').modal('toggle')
        }
    })
}

$(document).on('click', '.confirm-delete', deletePhoto);