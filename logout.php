<?php

// Supprimez toutes les variables de session
session_unset();

// Détruisez la session
session_destroy();

// Redirigez l'utilisateur vers une page de déconnexion ou d'accueil
header("Location: login_candidat.php");
exit;
?>





