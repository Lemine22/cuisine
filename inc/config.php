
<?php
require_once 'inc/db.php';
require_once 'inc/func.php';
// affiche le tableau
/*function debug($tableau) {
    echo '<pre>'.print_r($tableau, true).'</pre>';
}*/
session_name('letscook_session');
session_start();


$themes = glob('css/themes/*');
$current_theme = !empty($_GET['theme']) ? basename($_GET['theme']) : 'default';

$current_page = basename($_SERVER['PHP_SELF']); //

$pages = array(
	'The Cooking Team'=>'about.php',
	'Me Contacter'=>'contact.php',
	'Envoyer votre Recette'=>'send.php',



	);

$array_difficulty = array(
	'Très Facile',
	'Très Facile',
	'Facile',
	'Moyen',
	'Difficile',
	'Très Difficile',

);