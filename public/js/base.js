$(document).ready(function() {
    //Active l'encart
    $('#onglet').on('click', function(){
        $('#encart').toggleClass('activated');
        $('#encart').toggleClass('deactivated');
        $('#fa-icon').toggleClass('fa-caret-left');
        $('#fa-icon').toggleClass('fa-caret-right');
    })

    //Edite le texte seclectionné
    function editText(){
        var id = $(this).attr('data-edit-js');
        $('.edit-js[data-edit-js = ' + id + ']').hide('slow');
        var url = '../public/get_text';
        console.log(url);
        $.ajax({
                        url: url,
                        data: {'textId' : id},
                        type: "GET",
                        dataType: "json",
                        success: function(response) {
                            console.log('hello');
                        },
                        error: function(xhr, status, error) {
                            console.log('error');
                        }
                })
    }
    $(document).on('click','.edit', editText);
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
