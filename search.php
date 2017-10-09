<?php
require_once "partials/header.php";
 $search = !empty($_GET['search']) ? strip_tags(trim($_GET['search'])) : '';
$search_results = array();
$count_search_results = 0;
if (!empty($search)) {


	$query = $db->prepare('SELECT * FROM recipe WHERE type LIKE :search OR title LIKE :search OR ingredients LIKE :search');
	$query->bindValue(':search', '%'.$search.'%', PDO::PARAM_STR);
	$query->execute();
	$search_results = $query->fetchAll();
	$count_search_results = $query->rowCount();
}
	//$count_search_results = count($search_results);

?>

			<div class="row">
				<div class="col-sm-8">

					<h1><big><?= $count_search_results ?></big> résultat(s) pour la recherche &laquo;<?= $search ?>&raquo;</h1>


					<?php
					foreach($search_results as $recipe) {
						echo displayrecipe($recipe);
					}
					?>

			</div>

				<?php include 'partials/sidebar.php' ?>

			</div>



 <?php
require_once "partials/footer.php";
 ?>