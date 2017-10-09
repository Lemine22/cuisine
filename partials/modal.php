		<div class="modal fade" id="myModal<?= $recipe_id ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
					<div class="modal-dialog modal-lg" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Fermer"><span aria-hidden="true">&times;</span></button>
								<h4 class="modal-title" id="myModalLabel"><strong><?= $recipe_title ?></strong></h4>

<!-- $recipe_id = $recipe['id'];
			$recipe_author = $recipe['author'];
            $ingredients = cutString($recipe['ingredients'], 100, ' [...]');
            $recipe_title = ucfirst($recipe['title']);
            $recipe_date = date('d-m-Y', strtotime($recipe['creation_date']));
            $realisation = cutString($recipe['realisation'], 100, ' [...]');
            $recipe_picture = $recipe['picture'];
            $recipe_cooking = $recipe['cooking_time'];
            $recipe_preparation = $recipe['preparation_time'];
            $total_time = $recipe_cooking + $recipe_preparation;
            $nb_persons = $recipe['nb_persons'];
            $difficulty = $recipe['difficulty'];
 -->
							</div>
							<div class="modal-body media">
								<span class="media-left">
									<img class="pull-left" src="img/recettes/<?= $recipe_picture ?>" alt="">
								</span>
								<div class="media-body">
									<p>
										<ul class="list-inline">
											<li><a href="#"><i class="icon-large icon-facebook"></i></a></li>
											<li><a href="#"><i class="icon-large icon-twitter"></i></a></li>
											<li><a href="#"><i class="icon-large icon-envelope"></i></a></li>
											<li><a href="#"><i class="icon-large icon-print"></i></a></li>
										</ul>
										<span>
											<span class="glyphicon glyphicon-star"></span>
											<span class="glyphicon glyphicon-star"></span>
											<span class="glyphicon glyphicon-star"></span>
											<span class="glyphicon glyphicon-star"></span>
											<span class="glyphicon glyphicon-star-empty"></span>
											<span> (74 avis)</span>
										</span>
									</p>
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
								</div>
							</div>
							<div class="modal-footer">
								<a class="btn btn-primary"  href="recette.php?id=<?= $recipe_id ?>">Let's Cook <span class="glyphicon glyphicon-chevron-right"></span></a>
								</div>
						</div>
					</div>
				</div>
					<script src="js/jquery.js"></script>

	<!-- Bootstrap Core JavaScript -->
	<script src="js/bootstrap.min.js"></script>

	<script>
	$(function () {
		$('[data-toggle="tooltip"]').tooltip()
	})
	</script>
