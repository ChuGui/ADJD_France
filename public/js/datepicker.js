jQuery(function ($) {
    $("#datepicker").datepicker(
        {
            closeText: 'Fermer',
            prevText: 'Précédent',
            nextText: 'Suivant',
            currentText: 'Aujourd\'hui',
            monthNames: ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'],
            monthNamesShort: ['Janv.', 'Févr.', 'Mars', 'Avril', 'Mai', 'Juin', 'Juil.', 'Août', 'Sept.', 'Oct.', 'Nov.', 'Déc.'],
            dayNames: ['Dimanche', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi'],
            dayNamesShort: ['Dim.', 'Lun.', 'Mar.', 'Mer.', 'Jeu.', 'Ven.', 'Sam.'],
            dayNamesMin: ['D', 'L', 'M', 'M', 'J', 'V', 'S'],
            weekHeader: 'Sem.',
            dateFormat: 'dd-mm-yy',
            /*beforeShowDay: function (date) {
                $.ajax({
                    url: $("#datepicker").attr('data-url'),
                    type: "GET",
                    dataType: "json",
                    success: function (response) {
                        var dates = $.parseJSON(response);
                        $.each(dates, function (idx, date) {
                            console.log(date);
                        })
                    },
                    error: function (xhr, status, error) {
                    }
                })
            },*/
            onSelect: function (dateText, inst) {
                var date = $(this).val();
                console.log(date);
            }
        }
    );

})


