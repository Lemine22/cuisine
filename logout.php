<?php
	require_once 'partials/header.php';

	session_unset();
	session_destroy();
	echo "Vous avez été déconnecté !";
	redirectJS('index.php', 4);



?>


<h2>Vous avez été déconnecté(e)</h2>
<h3>A bientôt sur Let's Cook et Bon Appétit !! </h3>
<img src="img/cake.png" alt="image cake">




<?php 	require_once 'partials/footer.php';


 ?>





