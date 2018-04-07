function deleteModal() {
    var projectId = $(this).attr('data-project-id');
    $('#deleteProjectModal_' + projectId).modal('toggle');
}

$(document).on('click', '.delete-button', deleteModal);

function deleteProject() {
    var projectId = $(this).attr('data-project-id');
    var url = $(this).attr('data-url');
    $.ajax({
        url: url,
        data: {projectId : projectId} ,
        type: "GET",
        success: function (response) {
            $('#project_' + projectId).hide('slow')
        },
        error: function (xhr, status, error) {
            $('#modal-error').modal('toggle')
        }
    })
}

$(document).on('click', '.confirm-delete', deleteProject);