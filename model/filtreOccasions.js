// récuperer les valeurs dec occasions
// changer le css des occasions concernés
function miseAJourPrix(prixMin,prixMax){
    $('.prix').each(function() {
        console.log($(this).text())
        let prix = $(this).text()
        prix = prix.replace(' ', '')
        prix = prix.substring(0, prix.length - 1)
        prix = parseInt(prix,10)
        if (prix < (prixMin*1000)  | prix > (prixMax*1000)  ){
            console.log("ok")
            $(this).parent().parent().parent().css('display','none');
        }
    })
}
function miseAJourKm(kmMin,kmMax){
    $('.km').each(function() {
        console.log($(this).text())
        let km = $(this).text()
        km = km.replace(' ', '')
        km = km.substring(0, km.length - 2)
        km = parseInt(km,10)
        if (km < (kmMin*1000)  | km > (kmMax*1000)  ){
            console.log( km )
            $(this).parent().parent().parent().css('display','none');
        }
    })
}
function miseAJourAnnee(anneeMin,anneeMax){
    $('.annee').each(function() {
        console.log($(this).text())
        let annee = $(this).text()
        annee = annee.replace(' ', '')
        annee = parseInt(annee,10)
        if (annee < (anneeMin)  | annee > (anneeMax)  ){
            console.log(annee)
            $(this).parent().parent().parent().css('display','none');
        }
    })
}

let prixMin = 0;
let prixMax = 60000;

let kmMin = 0; 
let kmMax = 900000;

let anneeMin = 0;
let anneeMax = 90000;

function miseAJour(prixMin,prixMax,kmMin,kmMax,anneeMin,anneeMax){
    $('.annee').each(function() { 
        $(this).parent().parent().parent().css('display','flex');
    })
    miseAJourPrix(prixMin,prixMax);
    miseAJourKm(kmMin,kmMax);
    miseAJourAnnee(anneeMin,anneeMax);
}

$( function() {
    $( "#sliderPrix" ).slider({
      range: true,
      min: 0,
      max: 210,
      values: [ 0, 210 ],
      slide: function( event, ui ) {
        $( "#prix" ).val( ui.values[ 0 ] + "k € - " + ui.values[ 1 ] +"k €");
        prixMin = $( "#sliderPrix" ).slider( "values", 0 );
        prixMax = $( "#sliderPrix" ).slider( "values", 1 );
        miseAJour(prixMin,prixMax,kmMin,kmMax,anneeMin,anneeMax);
      }

    });
    prixMin = $( "#sliderPrix" ).slider( "values", 0 );
    prixMax = $( "#sliderPrix" ).slider( "values", 1 );
    $( "#prix" ).val( prixMin + "k € - " +  prixMax +"k €" );

   
} );

$( function() {
  $( "#sliderKm" ).slider({
    range: true,
    min: 0,
    max: 300,
    values: [ 0, 300 ],
    slide: function( event, ui ) {
      $( "#km" ).val( ui.values[ 0 ] + " 000 km - " + ui.values[ 1 ] +" 000 km");
      kmMin = $( "#sliderKm" ).slider( "values", 0 );
      kmMax = $( "#sliderKm" ).slider( "values", 1 );
      miseAJour(prixMin,prixMax,kmMin,kmMax,anneeMin,anneeMax);
    }
  });
  $( "#km" ).val( $( "#sliderKm" ).slider( "values", 0 ) +" 000 km - " + $( "#sliderKm" ).slider( "values", 1 )+" 000 km" );
} );

$( function() {
    let date = new Date();
    let anneeActuel = String(date.getFullYear());
    console.log(anneeActuel)
    $( "#sliderAns" ).slider({
      range: true,
      min: 1990,
      max: anneeActuel,
      values: [ 1990, anneeActuel ],
      slide: function( event, ui ) {
        $( "#annee" ).val( ui.values[ 0 ] + " - " + ui.values[ 1 ] );
        
        anneeMin = $( "#sliderAns" ).slider( "values", 0 );
        anneeMax = $( "#sliderAns" ).slider( "values", 1 );
        miseAJour(prixMin,prixMax,kmMin,kmMax,anneeMin,anneeMax);
      }
    });
    $( "#annee" ).val($( "#sliderAns" ).slider( "values", 0 ) +" - " + $( "#sliderAns" ).slider( "values", 1 ) );
});


