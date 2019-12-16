<?php
require_once("bdd_connect.php");

require_once("header_html.php");

session_start ();

// On détruit les variables de notre session
session_unset ();

// On détruit notre session
session_destroy ();

// On redirige le visiteur vers la page d'accueil
echo 'Vous êtes déconnecté';

require_once("footer_html.php");
?>