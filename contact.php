<?php
	require_once "partials/header.php";


$email = !empty($_POST['email']) ? strip_tags($_POST['email']) : '';
$lastname = !empty($_POST['lastname']) ? strip_tags($_POST['lastname']) : '';
$firstname = !empty($_POST['firstname']) ? strip_tags($_POST['firstname']) : '';
$message = !empty($_POST['message']) ? strip_tags($_POST['message']) : '';
$errors = array();
// Le formulaire a ete soumis, on a appuye sur le bouton Envoyer
if (!empty($_POST)) {
    // On check les erreurs possibles
    if (empty($email) || strlen($email) > 50) {
        $errors['email'] = 'Veuillez renseigner votre email';
    }
    if (empty($lastname) || strlen($lastname) > 255) {
        $errors['lastname'] = 'Veuillez renseigner un nom (255 chars max)';
    }
    if (empty($firstname) || strlen($firstname) > 255) {
        $errors['firstname'] = 'Veuillez renseigner un prenom (255 chars max)';
    }
    if (empty($message) || strlen($message) > 65535) {
        $errors['message'] = 'Votre message ne doit pas dépasser 65535 caractères';
    }
    //debug($errors);
    // Aucune erreur dans le formulaire, tous les champs ont été saisis correctement
    if (empty($errors)) {

    			$query = $db->prepare('INSERT INTO contact SET email = :email, lastname = :lastname, firstname = :firstname, message = :message, creation_date = NOW()');
        // Pour chacune des variables précédées d'un : on doit faire un bindValue pour passer la valeur à la requête
        $query->bindValue(':email', $email, PDO::PARAM_STR);
        $query->bindValue(':lastname', $lastname, PDO::PARAM_STR);
        $query->bindValue(':firstname', $firstname, PDO::PARAM_STR);
        $query->bindValue(':message', $message, PDO::PARAM_STR);
        // On execute la requête
        $query->execute();
        // On récupère le numéro de la ligne automatiquement généré par MySQL avec l'attribut AUTO_INCREMENT
        $insert_id = $db->lastInsertId();

        if (!empty($insert_id)) {





            echo '<div class="alert alert-success" role="alert">';
            echo 'Votre message a bien été envoyé<br>';
            echo 'Vous allez être redirigé dans quelques secondes...<br>';
            echo '</div>';
            redirectJS('index.php', 3);
            exit();
        }
        $errors['db_error'] = 'Erreur interne, merci de reessayer ulterieurement';
    }
}
?>

		<div class="row">
			<div class="col-xs-12 col-sm-9">
				<h1>Nous Contacter</h1>

				<hr>

		        <?php if (!empty($errors)) { ?>
		        <div class="alert alert-danger" role="alert">
		            <ul>
		            <?php
		            foreach($errors as $error) {
		                echo '<li>'.$error.'</li>';
		            }
		            ?>
		            </ul>
		        </div>
		        <?php } ?>

				<form action="contact.php" method="POST">
					<div class="form-group">
						<label for="email">Votre Email</label>
						<input type="email" class="form-control" name="email" id="author" placeholder="Entrez votre email" value="<?= $email ?>">
					</div>
					<div class="form-group">
						<label for="lastname">Nom</label>
						<input type="text" class="form-control" name="lastname" id="lastname" placeholder="Entrez votre nom" value="<?= $lastname ?>">
					</div>
					<div class="form-group">
						<label for="firstname">Prénom</label>
						<input type="text" class="form-control" name="firstname" id="firstname" placeholder="Entrez votre prenom" value="<?= $firstname ?>">
					</div>
					<div class="form-group">
						<label for="message">Votre Message</label>
						<textarea name="message" id="message" class="form-control" rows="5" placeholder="Contenu de votre message"><?= $message ?></textarea>
					</div>
					<button type="submit" class="btn btn-default">Submit</button>
				</form>







<?php
	require_once "partials/footer.php";
?>