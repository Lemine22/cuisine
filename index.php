<?php
require_once "partials/header.php";

$query = $db->query('SELECT * FROM recipe ORDER BY creation_date DESC LIMIT 3');
$date_recipe = $query->fetchAll();

?>
 		<div class="row">

			<!-- Blog Entries Column -->
			<div class="col-md-8">

				<h1 class="page-header">
					Let's Cook !
				</h1>

				<div class="row carousel-holder">
					<div class="col-md-12">
						<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
							<ol class="carousel-indicators">
								<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
								<li data-target="#carousel-example-generic" data-slide-to="1"></li>
								<li data-target="#carousel-example-generic" data-slide-to="2"></li>
								<li data-target="#carousel-example-generic" data-slide-to="3"></li>
								<li data-target="#carousel-example-generic" data-slide-to="4"></li>
							</ol>
							<div class="carousel-inner">
								<div class="item active">
									<img class="slide-image" src="img/food-q-c-800-300-1.jpg" alt="">
								</div>
								<div class="item">
									<img class="slide-image" src="img/food-q-c-800-300-2.jpg" alt="">
								</div>
								<div class="item">
									<img class="slide-image" src="img/food-q-c-800-300-4.jpg" alt="">
								</div>
								<div class="item">
									<img class="slide-image" src="img/food-q-c-800-300-6.jpg" alt="">
								</div>
								<div class="item">
									<img class="slide-image" src="img/food-q-c-800-300-8.jpg" alt="">
								</div>
							</div>
							<a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
								<span class="glyphicon glyphicon-chevron-left"></span>
							</a>
							<a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
								<span class="glyphicon glyphicon-chevron-right"></span>
							</a>
						</div>
					</div>
				</div>

<?php
foreach($date_recipe as $recipe){
echo displayrecipe($recipe);


}
 ?>


				<hr>

				<!-- Pager -->
				<ul class="pager">
					<li class="previous">
						<a href="#">&larr; Posts plus anciens</a>
					</li>
					<li class="next">
						<a href="#">Posts plus récents &rarr;</a>
					</li>
				</ul>

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
require_once "partials/footer.php";
 ?>