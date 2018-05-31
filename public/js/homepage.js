if ($(window).width() < 800) {
    var textBanner = $('#text-banner');
    var newText = textBanner.html();
    textBanner.remove();

    $('#bienvenue').append('<p>' + newText + '</p>');
}

