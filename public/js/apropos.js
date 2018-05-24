function deleteModal() {
    var memberId = $(this).attr('data-member-id');
    $('#deleteMemberModal_' + memberId).modal('toggle');
}

$(document).on('click', '.delete-button', deleteModal);

function deleteMember() {
    var memberId = $(this).attr('data-member-id');
    var url = $(this).attr('data-url');
    $.ajax({
        url: url,
        data: {memberId : memberId} ,
        type: "GET",
        success: function (response) {
            $('#member_' + memberId).hide('slow')
        },
        error: function (xhr, status, error) {
            $('#modal-error').modal('toggle')
        }
    })
}

$(document).on('click', '.confirm-delete', deleteMember);