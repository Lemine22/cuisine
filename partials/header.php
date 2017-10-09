<?php
 require_once "inc/config.php"
?>
<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Blog cuisine">
	<meta name="author" content="KL">

	<title>Let's Cook !</title>

	<!-- Bootstrap Core CSS -->
	<link href="css/themes/cosmo/bootstrap.min.css" rel="stylesheet">
	<link href="css/bootstrap.icon-large.min.css" rel="stylesheet">

	<!-- Custom CSS -->
	<link href="css/blog-cuisine.css" rel="stylesheet">

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->

</head>

<body>

	<!-- Navigation -->
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="index.php">Let's Cook !</a>
			</div>
			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
				<?php
				foreach($pages as $page_name => $page_url){

					$li_class = '';
					if($page_url == $current_page){
						$li_class = 'active';

				}

			 ?>
			 <li class="<?= $li_class ?>"><a href="<?= $page_url ?>" ><?= $page_name ?></a></li>
				<?php } ?>
			<?php

$current_page = basename($_SERVER['PHP_SELF']);
//debug($_SESSION['user_id']);
if (!isset($_SESSION['user_id']) && empty($_SESSION['user_id'])){
?>
<button type="button" class="btn " style="background-color:#2780E3;color:#64FFDA;border: none; line-height:32px;" onclick="location.href='register.php'">
<span class="glyphicon glyphicon-off"></span> Connexion / Inscription
</button>
<?php
} else {
$session_id = $_SESSION['user_id'];
$strQuery="SELECT * FROM user WHERE id = $session_id";
$query=$db->query($strQuery);
$user = $query->fetch();
$user_login = $user['login'];
?>
<button type="button" class="btn" style="background-color:#2780E3;color:#FF1744;border: none; line-height:32px;" onclick="location.href='logout.php'">
<span class="glyphicon glyphicon-off"></span> Deconnexion
</button>

<?php
}

?>
				</ul>

			<form class="navbar-form navbar-left" role="search" action="search.php" method="GET">
                        <div class="input-group">
                            <input type="text" name="search" class="form-control" placeholder="Search">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="submit"><span class=" glyphicon glyphicon-search"></span></button>
                            </span>
                        </div>
                    </form>
			</div>
			<!-- /.navbar-collapse -->
		</div>

		<!-- /.container -->
	</nav>

	<!-- Page Content -->
	<div class="container">