// Ajoutez la classe "active" à l'élément actuel de la barre de navigation
var navbar = document.getElementsByTagName('nav')[0];
var liens = navbar.getElementsByTagName('a');
for (var i = 0; i < liens.length; i++) {
  liens[i].addEventListener('click', function() {
    var current = document.getElementsByClassName('active');
    current[0].className = current[0].className.replace(' active', '');
    this.className += ' active';
  });
}
