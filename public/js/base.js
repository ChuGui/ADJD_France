$(document).ready(function() {
    $('#onglet').on('click', function(){
        $('#encart').toggleClass('activated');
        $('#encart').toggleClass('deactivated');
        $('#fa-icon').toggleClass('fa-caret-left');
        $('#fa-icon').toggleClass('fa-caret-right');
    })
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
