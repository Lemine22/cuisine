<?php


function debug($tableau) {
    echo '<pre>'.print_r($tableau, true).'</pre>';
}


function redirectJS($url, $delay = 1) {
    echo '<script>
          setTimeout(function() {
                location.href = "'.$url.'"; }
          , '.($delay * 1000).');
          </script>';
}


function cutString($text, $max_length = 0, $end = '...', $sep = '[@]') {
    if ($max_length > 0 && strlen($text) > $max_length) {
        $text = wordwrap($text, $max_length, $sep);
        $text = explode($sep, $text);
        return $text[0].$end;
    }
    return $text;
}
function cleanString($str, $delimiter='-') {
    // Convertit en caractères unicode
    // Et transforme les accents (Ex: é => e, Ç => c)
    $clean = iconv('UTF-8', 'ASCII//TRANSLIT', trim($str))  ;
    // Supprime tous ce qui n'est pas des lettres, nombres et "_+ -"
    $clean = preg_replace("/[^a-zA-Z0-9\/_|+ -]/", '', $clean);
    // Mets en minuscule et supprime les tirets en début/fin de chaine
    $clean = strtolower(trim($clean, '-'));
    // Remplace tous les caractères "/_|+ -" par $delimiter
    $clean = preg_replace("/[\/_|+ -]+/", $delimiter, $clean);

    return $clean;
}


function displayproduct($post) {
			$post_id = $post['id'];
			$post_author = cutString($post['author'], 10, '', ' ');
            $ingredients = cutString($post['ingredients'], 100, ' [...]');
            $post_title = ucfirst(cutString($post['title'], 15));

?>

					<div class="post">
					<h2><?= $title ?></h2>

				    <img src="" alt="">

				    <blockquote>
				      <p><?= $ingredients ?></p>
				    </blockquote>

				    <a href="post.php?id=<?= $post_id ?>" class="btn btn-default">Lire la suite</a>
				</div>
					<?php } ?>
<?php
function displayrecipe($recipe) {
	$array_difficulty = array(
	'Très Facile',
	'Très Facile',
	'Facile',
	'Moyen',
	'Difficile',
	'Très Difficile',

);
			$recipe_id = $recipe['id'];
			$recipe_author = $recipe['author'];
            $ingredients = $recipe['ingredients'];
            $recipe_title = ucfirst($recipe['title']);
            $recipe_date = date('d-m-Y', strtotime($recipe['creation_date']));
            $realisation = cutString($recipe['realisation'], 100, ' [...]');
            $recipe_picture = $recipe['picture'];
            $recipe_cooking = $recipe['cooking_time'];
            $recipe_preparation = $recipe['preparation_time'];
            $total_time = $recipe_cooking + $recipe_preparation;
            $nb_persons = $recipe['nb_persons'];
            $difficulty = $recipe['difficulty'];

?>

                <hr><!-- First Blog Post -->
				<h2>
					<a href="#" ><?= $recipe_title ?></a>
				</h2>
				<p class="lead">
					par <a href="index.php"><?= $recipe_author ?></a>
				</p>
				<p><span class="glyphicon glyphicon-time"></span> Recette postée le <?= $recipe_date ?></p>

				<a data-toggle="modal" data-target="#myModal<?= $recipe_id ?>" href="#"><img class="img-responsive" src="img/recettes/<?= $recipe_picture ?>" alt=""></a>

				<p style="margin-top:15px;"><?= $realisation ?></p>


				<!-- Modal -->
				<?php
						include "partials/modal.php";

				 ?>
					<?php } ?>
