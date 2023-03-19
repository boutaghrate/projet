// const inputs = document.getElementsByTagName('input');
const btn = document.getElementById('valider');
const password = document.getElementById('mdps');
const confirmPassword = document.getElementById('cmdps');

btn.addEventListener('click', function (e) {
  if (password.value !== confirmPassword.value) {
    password.style.borderColor = "red";
    confirmPassword.style.borderColor = "red";
    e.preventDefault();
  } else {
    // Le code à exécuter si les mots de passe correspondent
  }
});














  // for(let i=0;i<inputs.length;i++){

  //   if(inputs[i].value==''){

  //     inputs[i].style.borderColor="red"
        
        
  //   }
  //   else{
  //     inputs[i].style.borderColor="lightblue"
  //   }
  // }