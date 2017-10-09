<?php
require_once '../inc/func.php';
require_once '../inc/db.php';

define('MAX_POSTS', 100);

$contents = nl2br(file_get_contents('lorem.txt'));
$contents = explode('<br />'.PHP_EOL.'<br />'.PHP_EOL, $contents);

$recipes = array();
for ($i = 0; $i < MAX_POSTS; $i++) {

	$rand_year = rand(2014, date('Y'));
	$rand_month = sprintf('%1$02d', $rand_year == date('Y') ? rand(1, date('n')) : rand(1, 12));
	$rand_day = sprintf('%1$02d', rand(1, 28));
	$rand_hour = sprintf('%1$02d', rand(0, 23));
	$rand_minute = sprintf('%1$02d', rand(0, 59));
	$rand_second = sprintf('%1$02d', rand(0, 59));

	$rand_date = $rand_year.'-'.$rand_month.'-'.$rand_day.' '.$rand_hour.':'.$rand_minute.':'.$rand_second;

	//echo $rand_date.'<br>';

	$realisation = str_replace(';', '.', trim($contents[$i]));
	$first_point_pos = strpos($realisation, '.');

	$ingredients = substr($realisation, $first_point_pos + 2,100);
	$ingredients = '<ul><li>'.wordwrap($ingredients, 20, '</li><li>').'</li></ul>';

	$difficulty =  rand(0, 5);

	$nb_persons_range = range(4, 8, 2);
	$nb_persons = $nb_persons_range[array_rand($nb_persons_range)];

	$recipes[] = array(
		'realisation' => $realisation,
		'ingredients' => ucfirst($ingredients),
		'difficulty' => $difficulty,
		'nb_persons' => $nb_persons,
		'date' => $rand_date
	);
}


$query = $db->query('SELECT * FROM recipe ORDER BY id ASC');
$recipes_list = $query->fetchAll();

//exit(debug($recipes));


$query = $db->prepare('UPDATE recipe SET realisation = :realisation, ingredients = :ingredients, difficulty = :difficulty, nb_persons = :nb_persons, creation_date = :date WHERE id=:id');
$query->bindParam('realisation', $realisation);
$query->bindParam('ingredients', $ingredients);
$query->bindParam('difficulty', $difficulty);
$query->bindParam('nb_persons', $nb_persons);
$query->bindParam('date', $rand_date);
$query->bindParam('id', $id);


$count = 0;

foreach($recipes_list as $key => $recipe) {

	if (empty($recipes[$key])) {
		echo 'Undefined recipe content for key = '.$key.'<br>';
		continue;
	}

	$recipe_data = $recipes[$key];

	$realisation = $recipe_data['realisation'];
	$ingredients = $recipe_data['ingredients'];
	$difficulty = $recipe_data['difficulty'];
	$nb_persons = $recipe_data['nb_persons'];
	$rand_date = $recipe_data['date'];
	$id = $recipe['id'];

	$query->execute();

	$count++;
}

echo $count.' recette(s) mises à jour';