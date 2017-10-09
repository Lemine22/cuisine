<?php
require_once '../inc/db.php';
require_once '../inc/func.php';

$row = 1;
if (($handle = fopen("recettes.csv", "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {

    	$recette_picture = str_replace('tn-80x80', 'normal', $data[0]);
    	$recette_picture_extension = pathinfo(basename($recette_picture), PATHINFO_EXTENSION);
    	$recette_title = $data[2];

    	$recette_picture_filename = cleanString($recette_title).'.'.$recette_picture_extension;

    	echo $recette_title.' => '.$recette_picture.' ('.$recette_picture_filename.')<br>';

    	$recette_picture_path = '../img/recettes/'.$recette_picture_filename;

    	if (!file_exists($recette_picture_path)) {
    		file_put_contents($recette_picture_path, file_get_contents($recette_picture));
    	}

    $query = $db->prepare('INSERT INTO recipe (author, title, picture) VALUES (:author, :title, :picture)');
	$query->bindValue(':author', "The cooking team");
	$query->bindValue(':title', $recette_title);
	$query->bindValue(':picture', $recette_picture_filename);


	$count = 0;


	$query->execute();

	$insert_id = $db->lastInsertId();

	if (!empty($insert_id)) {
		$count++;
		}

    }
    fclose($handle);
}
echo $count.' produit(s) inséré(s)';