"use stricts"
/***********************************************DECLARATION DES VARIABLES ***********************************************/


  $(function(){
      setInterval(function(){
         $(".slideshow ul").animate({marginLeft:-550},800,function(){
            $(this).css({marginLeft:0}).find("li:last").after($(this).find("li:first"));
         })
      }, 2500);
   });



// La liste des slides du carrousel.

var slides = 
[
    { image:'../sources/images/slider/1.jpg', legend:'INFO ROOM :  Vente et achat de matériel informatique '}, 
    { image:'../sources/images/slider/2.jpg', legend:'LES DELICES DU THE : Boutique en ligne de vente de Thé'},
    { image:'../sources/images/slider/3.jpeg', legend:'MOTORENT: Site vitrine pour un magasin de location de voiture' },
    { image:'../sources/images/slider/4.jpg', legend:'FOODITALIA: Site internet pour un restaurant italien' }
];

// Objet contenant l'état du carrousel.
var statutDuSlider;

/***********************************************DECLARATION DES FONCTIONS ***********************************************/


//installation des gestionnaires d'évènement

function installEventHandler(selector, type, eventHandler)
{
    var domObject;

    //Récupération du premier objet du DOM correspondant au selecteur
    domObject = document.querySelector(selector);

    //installation du gestionnaire dévenement sur l'objet DOM
    domObject = addEventListener(type, eventHandler);
}

function initialisationSlider()
{
    var projetsImage;
    var projetsLegend;


    // Selection des balises dans le html
    projetsImage = document.querySelector('#projets img');
    projetsLegend = document.querySelector('#projets figcaption');

      // Changement de la source de l'image et du texte de la légende du slider.
    projetsImage.src          = slides[statutDuSlider.index].image;
    projetsLegend.textContent = slides[statutDuSlider.index].legend;
}

function slideSuivante(){

    statutDuSlider.index++;
    if(statutDuSlider.index == slides.length)
    {
        statutDuSlider.index = 0;
    }

    initialisationSlider();
}


/*Les animations concernant le CV */

$(document).ready( function(){

/*animattion qui montre mes compétences */
  $('#secondblock').hide();
  
    $('#secondblock').delay(2000).slideToggle(500);


/*animation qui permet de faire apparaître mon expérience */

$('.second_block').hide();
$('.second_block').delay(1000).fadeIn()(100);


}); 


/***********************************************CODE PRINCIPAL***********************************************/
// Chargement du DOM
document.addEventListener('DOMContentLoaded', function()
{
    // Initialisation du carrousel.
    statutDuSlider      = {};
    statutDuSlider.index = 0;                   // On commence à la première slide
    statutDuSlider.timer = null;                // Le carrousel est arrêté au démarrage


//installation du gestionnaire d'évènement

installEventHandler('#slider-next', 'click', slideSuivante);

//affichage initial
initialisationSlider();

});