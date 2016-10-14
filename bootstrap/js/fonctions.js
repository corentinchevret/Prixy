// LIMITATION A UN BOUTON RADIO CLIQUÉ POUR LA CERTIFICATION


$(function(){

	$("input.options").change(function(){
		limit = 1;
		nb = $("input.options:checked").length;
		if(nb > limit){
			$(this).attr("checked", false);
		}
	});
});


  $(function() {
    $( "#radio" ).buttonset();
  });

// CALENDRIER POUR LES SESSIONS

jQuery(document).ready(function($){
    $("#datepicker").datepicker({
         showButtonPanel: true,
         onClose: function (dateText, inst) {
             if ($(window.event.srcElement).hasClass('ui-datepicker-close'))
                 $("#datepicker").val('');
             }
     });
});

// CALENDRIER TRADUIT EN FRANCAIS

$.datepicker.regional['fr'] = {
    closeText: 'Effacer',
    prevText: 'Précédent',
    nextText: 'Suivant',
    currentText: 'Aujourd\'hui',
    monthNames: ['Janvier','Février','Mars','Avril','Mai','Juin','Juillet','Août','Septembre','Octobre','Novembre','Décembre'],
    monthNamesShort: ['Janv.','Févr.','Mars','Avril','Mai','Juin','Juil.','Août','Sept.','Oct.','Nov.','Déc.'],
    dayNames: ['Dimanche','Lundi','Mardi','Mercredi','Jeudi','Vendredi','Samedi'],
    dayNamesShort: ['Dim.','Lun.','Mar.','Mer.','Jeu.','Ven.','Sam.'],
    dayNamesMin: ['D','L','M','M','J','V','S'],
    weekHeader: 'Sem.',
    dateFormat: 'dd/mm/yy',
    firstDay: 1,
    isRTL: false,
    showMonthAfterYear: false,
    yearSuffix: '',
};
$.datepicker.setDefaults($.datepicker.regional['fr']);

// SLIDER POUR LE TARIF DE LA FORMATION

jQuery(document).ready(function($){
    // Création d'un slider dans l'élément id slider_prix
    $("#slider_tarif").slider({
        range:  true,
        min:    100,           // valeur min
        max:    5000,          // valeur max
        values: [100, 5000],   // position des 2 curseurs à l'initialisation
         
        // Action à effectuer lorsqu'on déplace l'un des curseur
        slide: function(event, ui){
            $( ".tarif_min" ).val( " " + ui.values[0]);
            $( ".tarif_max" ).val( " " + ui.values[1]);
            //$('#tarif_min').html(ui.values[0]);
            //$('#tarif_max').html(ui.values[1]);
        }
    });
     
    // Initialisation des valeurs numériques au chargement de la page
    $( ".tarif_min" ).val( " " + $( "#slider_tarif" ).slider( "values",0 ) );
    $( ".tarif_max" ).val( " " + $( "#slider_tarif" ).slider( "values",1 ) );
    //$('#tarif_min').html($("#slider_tarif").slider("values", 0));
    //$('#tarif_max').html($("#slider_tarif").slider("values", 1));   
});

// SLIDER POUR LA DURÉE DE LA FORMATION

jQuery(document).ready(function($){
    $( "#slider_duree" ).slider({
        range:true,
        min: 1,
        max: 10,
        step: 1,
        values: [1, 10],

        slide: function( event, ui ) {
            $( ".duree_min" ).val( " " + ui.values[0]);
            $( ".duree_max" ).val( " " + ui.values[1]);
            //$('.duree_min').html(ui.values[0]);
            //$('.duree_max').html(ui.values[1]);
        }
    });

      $( ".duree_min" ).val( " " + $( "#slider_duree" ).slider( "values",0 ) );
      $( ".duree_max" ).val( " " + $( "#slider_duree" ).slider( "values",1 ) );
      //$('.duree_min').html($("#slider_duree").slider("values", 0));
      //$('.duree_max').html($("#slider_duree").slider("values", 1));
});

/**
* Animation fusée avec Javascript
**/
/*jQuery(document).ready(function($){
    rocket     = $('#rocket_mobile');
    firetop    = $('#rocket_mobile .fire.top');
    firebottom = $('#rocket_mobile .fire.bottom');
    LAST_SCROLL_OFFSET = $(window).scrollTop();
    LAST_SCROLL_TIME   = new Date().getTime();
 
    // Calcul de la marge entre le haut du document et #rocket_mobile
    fixedLimit = rocket.offset().top - parseFloat(rocket.css('marginTop').replace(/auto/,0));
 
    // On déclenche un événement scroll pour mettre à jour le positionnement au chargement de la page
    $(window).trigger('scroll');
 
    $(window).scroll(function(event){
        // Valeur de défilement lors du chargement de la page
        windowScroll = $(window).scrollTop();
 
        // Mise à jour du positionnement en fonction du scroll
        if( windowScroll >= fixedLimit ){
            rocket.addClass('fixed');
        } else {
            rocket.removeClass('fixed');
        }
 
        // Animation flammes
        // Allumage
        if( rocket.hasClass('fixed') ){
            if( windowScroll > LAST_SCROLL_OFFSET ){
                // DOWN
                firetop.addClass('on');
                firebottom.removeClass('on');
            } else {
                // UP
                firetop.removeClass('on');
                firebottom.addClass('on');
            }
        }
 
        // Arrêt
        setTimeout(function(){
            if( new Date().getTime() - LAST_SCROLL_TIME > 30 ){
                firetop.removeClass('on');
                firebottom.removeClass('on');
            }
        },200);
 
        // Mise à jour variables
        LAST_SCROLL_OFFSET = windowScroll;
        LAST_SCROLL_TIME   = new Date().getTime();
    });
});*/

// Remonter comme si on scrollait en haut de la page
jQuery(document).ready(function($){
    var scrollTrigger = 300, // px
        backToTop = function () {
            var scrollTop = $(window).scrollTop();
            if (scrollTop > scrollTrigger) {
                $('.badge').show(0);
            } 
            else {
                $('.badge').hide(0);
            }
        };
    backToTop();

    $(window).on('scroll', function () {
        backToTop();
    });


    $(".badge").click(function(){
            var the_id = $(this).attr("href");
            $('html, body').animate({scrollTop:$(the_id).offset().top},500);//return false;
    });

});