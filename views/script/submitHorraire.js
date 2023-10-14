console.log("submitHorraireLoaded")
var form = document.getElementById('formulaireHoraire')
console.log(form)

if (window.innerWidth < 737)
{
  var form = document.getElementById('formulaireHoraire-phone')
}

form.addEventListener('input', function(event){
  form.submit()
})