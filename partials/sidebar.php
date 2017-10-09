<?php

$query = $db->query('SELECT * FROM recipe WHERE author != "The cooking team" AND status = 1 ORDER BY RAND() LIMIT 1');
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



 ?>

			<div class="col-md-4">

				<!-- Blog Search Well -->


				<!-- Blog Categories Well -->
				<div class="well">
					<h4>Recettes par type</h4>
					<div class="row">
						<div class="col-lg-6">
							<ul class="list-unstyled">
								<li><a href="search.php?search=Entrée">Entrée</a>
								</li>
								<li><a href="search.php?search=Plat Viande">Plat Viande</a>
								</li>
								<li><a href="search.php?search=Plat Poisson">Plat Poisson</a>
								</li>
								<li><a href="search.php?search=Accompagnement">Accompagnement</a>
								</li>
							</ul>
						</div>
						<!-- /.col-lg-6 -->
						<div class="col-lg-6">
							<ul class="list-unstyled">
								<li><a href="search.php?search=Pâtes">Pâtes</a>
								</li>
								<li><a href="search.php?search=Snack">Snack</a>
								</li>
								<li><a href="search.php?search=Dessert">Dessert</a>
								</li>
								<li><a href="search.php?search=Goûter">Goûter</a>
								</li>
							</ul>
						</div>
						<!-- /.col-lg-6 -->
					</div>
					<!-- /.row -->
				</div>

				<!-- Side Widget Well -->
				<div class="well">
					<h4><a href="recette.php?id=<?= $recipe_id ?>" ><?= $recipe_title ?> </a>par <strong><?= $recipe_author ?></strong></h4>
					<div class=" media" >
								<span class="media-left">
									<a href="recette.php?id=<?= $recipe_id ?>" ><img class="pull-right" style="height:140px;width:140px;" src="img/recettes/<?= $recipe_picture ?>" alt=""></a>
								</span>
								<div class="media-body">

									<ul class="list-unstyled">
										<li><i class="glyphicon glyphicon-signal"></i> Difficulté<strong> <?= $array_difficulty[$difficulty] ?></strong></li>
										<li><i class="glyphicon glyphicon-cutlery"></i> Préparation<strong> <?= $recipe_preparation ?> mn</strong></li>
										<li><i class="glyphicon glyphicon-fire"></i> Cuisson<strong> <?= $recipe_cooking ?> mn</strong></li>
										<li><i class="glyphicon glyphicon-time"></i> Temps total<strong> <?= $total_time ?> mn</strong></li>
									</ul>
								</div>
					</div>
					<!-- <img class="img-responsive" style="height:140px;" src="img/recettes/<?= $recipe_picture ?>" alt=""> -->
					<!-- <ul class="list-unstyled">
							<li><i class="glyphicon glyphicon-signal"></i> Difficulté<strong> <?= $array_difficulty[$difficulty] ?></strong></li>
							<li><i class="glyphicon glyphicon-cutlery"></i> Préparation<strong> <?= $recipe_preparation ?> mn</strong></li>
							<li><i class="glyphicon glyphicon-fire"></i> Cuisson<strong> <?= $recipe_cooking ?> mn</strong></li>
							<li><i class="glyphicon glyphicon-time"></i> Temps total<strong> <?= $total_time ?> mn</strong></li>
					</ul>
					 -->
				</div>

			</div>