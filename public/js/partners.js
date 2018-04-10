function deleteModal() {
    var partnerId = $(this).attr('data-partner-id');
    $('#deletePartnerModal_' + partnerId).modal('toggle');
}

$(document).on('click', '.delete-button', deleteModal);

function deletePartner() {
    var partnerId = $(this).attr('data-partner-id');
    var url = $(this).attr('data-url');
    $.ajax({
        url: url,
        data: {partnerId : partnerId},
        type: "GET",
        success: function (response) {
            $('#partner_' + partnerId).hide('slow')
        },
        error: function (xhr, status, error) {
            $('#modal-error').modal('toggle')
        }
    })
}

$(document).on('click', '.confirm-delete', deletePartner);