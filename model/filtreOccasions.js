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
            $(this).parent().parent().parent().css('display','none')
        }else{
            $(this).parent().parent().parent().css('display','flex')
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
            $(this).parent().parent().parent().css('display','none')
        }else{
            $(this).parent().parent().parent().css('display','flex')
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
            $(this).parent().parent().parent().css('display','none')
        }else{
            $(this).parent().parent().parent().css('display','flex')
        }
    })
}


$( function() {
    $( "#sliderPrix" ).slider({
      range: true,
      min: 0,
      max: 600,
      values: [ 0, 600 ],
      slide: function( event, ui ) {
        $( "#prix" ).val( ui.values[ 0 ] + "k € - " + ui.values[ 1 ] +"k €");
        miseAJourPrix($( "#sliderPrix" ).slider( "values", 0 ),$( "#sliderPrix" ).slider( "values", 1 ));
      }

    });
    let prixMin = $( "#sliderPrix" ).slider( "values", 0 );
    let prixMax = $( "#sliderPrix" ).slider( "values", 1 );
    $( "#prix" ).val( prixMin + "k € - " +  prixMax +"k €" );

   
} );

$( function() {
  $( "#sliderKm" ).slider({
    range: true,
    min: 0,
    max: 600,
    values: [ 0, 600 ],
    slide: function( event, ui ) {
      $( "#km" ).val( ui.values[ 0 ] + " 000 km - " + ui.values[ 1 ] +" 000 km");
      miseAJourKm( $( "#sliderKm" ).slider( "values", 0 ),$( "#sliderKm" ).slider( "values", 1 ));
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
        miseAJourAnnee($( "#sliderAns" ).slider( "values", 0 ) , $( "#sliderAns" ).slider( "values", 1 ));
      }
    });
    $( "#annee" ).val($( "#sliderAns" ).slider( "values", 0 ) +" - " + $( "#sliderAns" ).slider( "values", 1 ) );
});


$('#filtreOccasion').mouseup(() => {
   

})

