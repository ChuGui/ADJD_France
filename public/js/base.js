$(document).ready(function() {
    $('#onglet').on('click', function(){
        $('#encart').toggleClass('activated');
        $('#encart').toggleClass('deactivated');
        $('#fa-icon').toggleClass('fa-caret-left');
        $('#fa-icon').toggleClass('fa-caret-right');
    })
})

function initMap() {
    var adjd = {lat: 45.81965499999999, lng: 4.897126000000071};
    var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 10,
        center: adjd
    });
    var marker = new google.maps.Marker({
        position: adjd,
        map: map
    });
}
