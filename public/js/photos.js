function deleteModal() {
    var photoId = $(this).attr('data-photo-id');
    $('#deletePhotoModal_' + photoId).modal('toggle');
}

$(document).on('click', '.delete-button', deleteModal);

/*  SUPPRIMER UNE PHOTO PARTIE ADMIN  */
function deletePhoto() {
    var photoId = $(this).attr('data-photo-id');
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


$('.photos').click(function(e){
    var src = $(this).attr('src');
    $('#show_photo').modal('toggle');
    $('#full_photo').attr('src' , src);
})


