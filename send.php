<?php
require_once 'partials/header.php';
//print_r($_POST);
$disabled = '';
if (!isset($_SESSION['user_id']) && empty($_SESSION['user_id'])){

		$disabled = 'disabled';

	}
// Récupérer les données du formulaire depuis le tableau $_POST
$author = !empty($_POST['author']) ? strip_tags($_POST['author']) : '';
$title = !empty($_POST['title']) ? strip_tags($_POST['title']) : '';
$ingredients = !empty($_POST['ingredients']) ? strip_tags($_POST['ingredients']) : '';
$realisation = !empty($_POST['realisation']) ? strip_tags($_POST['realisation']) : '';
$difficulty = !empty($_POST['difficulty']) ? strip_tags($_POST['difficulty']) : '';
$preparation_time = !empty($_POST['preparation_time']) ? strip_tags($_POST['preparation_time']) : '';
$cooking_time = !empty($_POST['cooking_time']) ? strip_tags($_POST['cooking_time']) : '';
// Initialiser un tableau $errors et une chaine $result
$errors = array();
$result = '';
$message_connection = "";
//debug($_FILES);
if (empty($_SESSION['id'])) {
	$message_connection = "<a href='register.php'>(Connectez-vous pour nous envoyer votre recette)</a>";
}
// Le formulaire a été soumis, l'utilisateur a appuyé sur Envoyer
if (!empty($_POST)) {
	// Vérifier que les champs obligatoires ne sont pas vides
	// Pour chaque erreur rencontrée, ajouter une entrée dans le tableau $errors correspondant au champ en erreur
	if (empty($author) || strlen($author) > 50) {
		$errors['author'] = 'Ton nom est invalide (longueur max 50)';
	}
	if (empty($title) || strlen($title) > 100) {
		$errors['title'] = 'Le titre de ta recette est invalide (longueur max 255)';
	}


	if (empty($ingredients) || strlen($ingredients) < 20) {
		$errors['ingredients'] = 'Ingrédients invalides (longueur min 20)';
	}
	if (empty($realisation) || strlen($realisation) < 20 || strlen($realisation) > 65536) {
		$errors['realisation'] = 'Le contenu de ta recette est invalide (longueur min 20, longueur max 255)';
	}
	// S'il n'y a pas d'erreur on lance la requête d'insertion
	if (empty($errors)) {

		$picture = '';

		if (!empty($_FILES)) {

			$upload_path = 'img/recettes';

			if (!is_dir($upload_path)) {
				mkdir($upload_path);
			}

			$picture_filename = pathinfo($_FILES['image']['name'], PATHINFO_FILENAME);
			$picture_extension = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);

			$picture = cleanString($picture_filename).'.'.$picture_extension;
			$filetype = $_FILES['image']['type'];
			$temp_file = $_FILES['image']['tmp_name'];

			$result = move_uploaded_file($temp_file, $upload_path.'/'.$picture);

			if (!$result) {
				$errors['image'] = "L'envoi de votre image a échoué";
			}
		}

		if (empty($errors)) {

			$query = $db->prepare('INSERT INTO recipe SET author = :author, title = :title, realisation = :realisation, ingredients = :ingredients, picture = :picture, difficulty= :difficulty, cooking_time= :cooking_time, preparation_time= :preparation_time, creation_date = NOW(), status = 0');
			$query->bindValue(':author', $author, PDO::PARAM_STR);
			$query->bindValue(':title', $title, PDO::PARAM_STR);
			$query->bindValue(':realisation', $realisation, PDO::PARAM_STR);
			$query->bindValue(':ingredients', $ingredients, PDO::PARAM_STR);
			$query->bindValue(':cooking_time', $cooking_time, PDO::PARAM_INT);
			$query->bindValue(':preparation_time', $preparation_time, PDO::PARAM_INT);
			$query->bindValue(':difficulty', $difficulty, PDO::PARAM_INT);
			$query->bindValue(':picture', $picture, PDO::PARAM_STR);

			$query->execute();
			// On récupère l'identifiant unique automatiquement généré par la requête
			$insert_id = $db->lastInsertId();
			//Si la requête a réussie (c.f. lastInsertId()), on affiche une confirmation à l'utilisateur
			if (!empty($insert_id)) {
				$result .= '<div class="alert alert-success">Ta recette a bien été envoyée.<br><br>Redirection vers la page principale quelques secondes...</div>';
				$result .= redirectJs('recette.php?id='.$insert_id, 5);
			} else {
				$result .= '<div class="alert alert-danger">Une erreur s\'est produite, merci de réessayer ultèrieurement</div>';
			}
		}
	}
}
?>

			<div class="row">
				<div class="col-sm-9">

					<h1>Envoyez votre recette</h1>
					<h3><?= $message_connection ?></h3>

					<hr>

					<?php
					if (!empty($errors)) {
					?>
					<div class="alert alert-danger">
						<ul>
						<?php
						foreach($errors as $error) {
							echo '<li>'.$error.'</li>';
						}
						?>
						</ul>
					</div>
					<?php
					}
					if (!empty($result)) {
						echo $result;
					} else {
					?>
					<form action="send.php" method="POST" enctype="multipart/form-data">
					    <fieldset <?= $disabled ?>>
						<div class="form-group">
							<label for="author">Votre nom</label>
							<input type="text" class="form-control" name="author" id="author" placeholder="Votre nom" value="<?= $author ?>">
						</div>
						<div class="form-group">
							<label for="title">Nom de votre recette</label>
							<input type="text" class="form-control" name="title" id="title" placeholder="Nom de votre recette" value="<?= $title ?>">

						</div>


					<!-- 	<div class="form-group">
						<label for="title">Les ingrédients de votre recette</label>
						<input type="text" class="form-control" name="ingredients" id="ingredients" placeholder="Ingrédients de votre recette" value="<?= $ingredients ?>">
						</div> -->


							<div class="form-group"style="display:inline-block;text-align:center;" >
							<label for="ingredients">Ingrédients </label>
							<textarea name="ingredients" id="ingredients" class="form-control" rows="5" placeholder="Ingrédients de votre recette"><?= $ingredients ?></textarea>
						</div>



						<div class="form-group" style="display:inline-block;text-align:center;">
							<label for="preparation_time">Temps de Préparation (min)</label>
							<textarea name="preparation_time" id="preparation_time" class="form-control" rows="3" placeholder="Temps de Préparation"><?= $preparation_time ?></textarea>
						</div>
						<div class="form-group" style="display:inline-block;text-align:center;">
							<label for="cooking_time">Temps de Cuisson (min)</label>
							<textarea name="cooking_time" id="cooking_time" class="form-control" rows="3" placeholder="Temps de Cuisson"><?= $cooking_time ?></textarea>
						</div>
						<div class="form-group" style="display:inline-block;text-align:center;">
							<label for="difficulty">Difficulté (entre 0 et 5)</label>
							<textarea name="difficulty" id="difficulty" class="form-control" rows="1" placeholder="Niveau de difficulté"><?= $difficulty ?></textarea>
						</div>
						<div class="form-group" >
							<label for="realisation">Réalisation </label>
							<textarea name="realisation" id="realisation" class="form-control" rows="10" placeholder="Description"><?= $realisation ?></textarea>
						</div>


                     <div class="form-group">
				   <label for="ingredients">L'image de votre recette</label>
                    <input type="file" name="image">

					<input type="hidden" name="MAX_FILE_SIZE" value="10000000">
					</div>


					<button type="submit" class="btn btn-default">Envoyer</button>
					</fieldset>
					</form>

					<?php } ?>


					<?php
			require_once "partials/footer.php";
					 ?>
