<?php
require_once "partials/header.php";

$id = !empty($_GET['id']) ? intval($_GET['id']) : 0;
if (empty($id)) {
    //die('Undefined post id');
    header('Location: 404.php');
    exit();
}
$query = $db->prepare('SELECT * FROM recipe WHERE id = :id');
$query->bindValue(':id', $id, PDO::PARAM_INT);
$query->execute();
$recipe = $query->fetch();
			$recipe_id = $recipe['id'];
			$recipe_author = $recipe['author'];
            $ingredients = $recipe['ingredients'];
            $recipe_title = ucfirst($recipe['title']);
            $recipe_date = date('d-m-Y', strtotime($recipe['creation_date']));
            $realisation = $recipe['realisation'];
            $recipe_picture = $recipe['picture'];
            $recipe_cooking = $recipe['cooking_time'];
            $recipe_preparation = $recipe['preparation_time'];
            $total_time = $recipe_cooking + $recipe_preparation;
            $nb_persons = $recipe['nb_persons'];
            $difficulty = $recipe['difficulty'];
//debug($post);
if (empty($recipe)) {
    die('Undefined post with id ['.$id.']');
    //header('Location: 404.php');
    //exit();
}

if (!empty($_POST)) {

	$id = !empty($_POST['id']) ? intval($_POST['id']) : 0;
   	$pseudo=(!empty($_POST['pseudo']))? htmlspecialchars($_POST['pseudo']) : '';
   	$comment=(!empty($_POST['comment']))? htmlspecialchars($_POST['comment']) : '';

$query = $db->prepare('INSERT INTO comment SET author = :pseudo, content = :content, recette_ref = :recette_ref, creation_date = NOW(), status = 0');
			$query->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);
			$query->bindValue(':content', $comment, PDO::PARAM_STR);
			$query->bindValue(':recette_ref', $id, PDO::PARAM_INT);
			$query->execute();
			$insert_id=$db->LastInsertId();
}

$query = $db->prepare('SELECT * FROM comment WHERE recette_ref = :recette_ref AND status = 1 ORDER BY creation_date DESC');
	$query->bindValue(':recette_ref', $id, PDO::PARAM_INT);
	$query->execute();
	$comments = $query->fetchAll();

 ?>
		<div class="row">

			<!-- Blog Post Content Column -->
			<div class="col-lg-8">

				<!-- Blog Post -->

				<!-- Title -->
				<h1><?= $recipe_title ?></h1>
				<div class="ratings">
					<p>
						<span class="glyphicon glyphicon-star"></span>
						<span class="glyphicon glyphicon-star"></span>
						<span class="glyphicon glyphicon-star"></span>
						<span class="glyphicon glyphicon-star"></span>
						<span class="glyphicon glyphicon-star-empty"></span>
						<span> (74 avis)</span>
					</p>
				</div>

				<!-- Author -->
				<p class="lead">
					par <a href="#"><?= $recipe_author ?></a>
				</p>

				<hr>

				<!-- Date/Time -->
				<p><span class="glyphicon glyphicon-time"></span> Recette postée le <?= $recipe_date ?></p>

				<hr>

				<!-- Preview Image -->
				<img class="img-responsive" src="img/recettes/<?= $recipe_picture ?>" alt="">

				<hr>

				<!-- Post Content -->
				<p class="lead"><?= $recipe_title ?></p>
				<div class="">
					<ul class="list-inline">
						<li><h4>Partagez / Imprimez</h4></li>
						<li><a href="#"><i class="icon-large icon-facebook"></i></a></li>
						<li><a href="#"><i class="icon-large icon-twitter"></i></a></li>
						<li><a href="#"><i class="icon-large icon-envelope"></i></a></li>
						<li><a href="#"><i class="icon-large icon-print"></i></a></li>
					</ul>
				</div>
				<div class="">
					<h4>Ingrédients / pour <?= $nb_persons ?> personnes</h4>
					<p>
						<?= $ingredients ?>
					</p>
					<h4>Réalisation</h4>
					<ul class="list-unstyled">
						<li><i class="glyphicon glyphicon-signal"></i> Difficulté<strong> <?= $array_difficulty[$difficulty] ?></strong></li>
						<li><i class="glyphicon glyphicon-cutlery"></i> Préparation<strong> <?= $recipe_preparation ?> mn</strong></li>
						<li><i class="glyphicon glyphicon-fire"></i> Cuisson<strong> <?= $recipe_cooking ?> mn</strong></li>
						<li><i class="glyphicon glyphicon-time"></i> Temps total<strong> <?= $total_time ?> mn</strong></li>
					</ul>
					<h4>Préparation de la recette :</h4>
					<p>
						<?= $realisation ?>
					</p>
				</div>

				<hr>

				<!-- Blog Comments -->

				<!-- Comments Form -->
				<div class="well">

					<?php

						if (!empty($insert_id)){
							echo 'Merci, votre commentaire a été envoyé et sera publié après validation du modérateur.';
						}
					?>

					<h4>Laisser un commentaire:</h4>
					<form role="form" action='#' method="POST">

						<div class="form-group">
							<textarea class="form-control" rows="3" name="comment" id="comment" placeholder="Votre commentaire" ></textarea>
						</div>

						<div class="form-group">
							<h4>Votre Pseudo</h4>
							<input type="text" class="form-control" name="pseudo" id="pseudo" placeholder="Votre pseudo" value="">
							<input type="hidden" name="id" value="<?= $recipe_id ?>">
						</div>



						<button type="submit" class="btn btn-primary">Envoyer</button>
					</form>
				</div>

				<hr>

				<!-- Posted Comments -->

				<!-- Comment -->
				<?php
					if(!empty($comments)){
						foreach ($comments as $comment){
							$comment_author = $comment['author'];
							$comment_content =  $comment['content'];
							$comment_date = $comment['creation_date'];


				 ?>

				<div class="media">
					<a class="pull-left" href="#">
						<img style="width:64px;height:64px;" class="media-object" src="img/profile-ninja.png" alt="">
					</a>
					<div class="media-body">
						<h4 class="media-heading"><?= $comment_author ?>
							<small><?= $comment_date ?></small>
						</h4>
						<?= $comment_content ?>
					</div>
				</div>
				<?php } } ?>

			</div>

			<!-- Blog Sidebar Widgets Column -->
				<?php
					require_once "partials/sidebar.php";
				?>

		</div>
		<!-- /.row -->

		<hr>

		<!-- Footer -->
<?php
require_once "partials/footer.php"
 ?>