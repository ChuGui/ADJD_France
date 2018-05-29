$(document).ready(function () {
    //Active l'encart
    $('#onglet').on('click', function () {
        $('#encart').toggleClass('activated');
        $('#encart').toggleClass('deactivated');
        $('#fa-icon').toggleClass('fa-caret-left');
        $('#fa-icon').toggleClass('fa-caret-right');
    })

    //Edite le texte seclectionné
    function editText() {
        var id = $(this).attr('data-edit-js');
        $('.edit-js[data-edit-js = ' + id + ']').hide('slow');
        var url = $(this).attr('data-url-js');
        var urlModify = $(this).attr('data-url-modify-js');
        console.log(url);
        $.ajax({
            url: url,
            data: {'textId': id},
            type: "GET",
            dataType: "html",
            success: function (response) {
                console.log(response);
                $('.edit[data-edit-js = ' + id + ']').after('<textarea rows="5" cols="50" data-validate-id="' + id + '">' + response + '</textarea><button type="button" class="btn btn-info mb-5 ml-5 validate-edit-js" data-validate-id="' + id + '" data-url-modify-js="' + urlModify + '">Modifier</button>');
            },
            error: function (xhr, status, error) {
                console.log('error');
            }
        })
    }

    $(document).on('click', '.edit', editText);

    function modifyText() {
        var id = $(this).attr('data-validate-id');
        var url = $(this).attr('data-url-modify-js');
        var content = $('textarea[data-validate-id = ' + id + ']').val();
        console.log(content);
        $.ajax({
            url: url,
            type: "GET",
            data: {'textId': id, 'content': content},
            dataType: "html",
            success: function (response) {
                $('textarea[data-validate-id = ' + id + ']').remove();
                $('.validate-edit-js').remove();
                $('.edit-js[data-edit-js = ' + id + ']').html(response);
                $('.edit-js[data-edit-js = ' + id + ']').show('slow');
            },
            error: function (xhr, status, error) {
            }
        })
    }
    $(document).on('click', '.validate-edit-js', modifyText);
})

function initMap() {
    var adjd = {lat: 45.8130915, lng: 4.889826999999968};
    var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 10,
        center: adjd
    });
    var marker = new google.maps.Marker({
        position: adjd,
        map: map
    });
}
