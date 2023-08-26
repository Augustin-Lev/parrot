var form = document.getElementById('newPassword');
var login = document.getElementById('indiceMDP');
console.log(form);
let compteur = 0;

form.addEventListener('keyup', (event => {

  let mdp1 = form.elements[1].value;

  var condition1 = mdp1.match(/[A-Z]/g);
  var condition2 = mdp1.match(/[a-z]/g);
  var condition3 = mdp1.match(/[0-9]/g);
  var condition4 = mdp1.match(/[^a-zA-Z\d]/g);
  var condition5 = (mdp1.length >= 10);
  compteur = 0;

  if(condition1){
    compteur++;
  }
  if(condition2){
    compteur++;
  }
  if(condition3){
    compteur++;
  }
  if(condition4){
    compteur++;
  }
  if(condition5){
    compteur++;

  }
  if(compteur == 5){
    console.log("le code est bon");
    erreur.style.display='none'; 
  }
  let taille = compteur*20;
  login.style.width = taille+'%';
  console.log(compteur);
  event.preventDefault();
}))

form.addEventListener('submit', (event => {
  let mdp1 = form.elements[1].value;
  let mdp2 = form.elements[2].value;
  if(compteur == 5){
    console.log(mdp2);
    if ( mdp1 == mdp2){
      console.log("le code est bon");
      form.submit();
    }else{
        erreur.style.display='block'; 
    }
  }else{
    erreur.style.display='block'; 
  }
  event.preventDefault();
}))