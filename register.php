<?php
require_once "partials/header.php";
//	debug($_POST);
$login = !empty($_POST['login']) ? strip_tags($_POST['login']) : '';
$password = !empty($_POST['password']) ? strip_tags($_POST['password']) : '';
$ctrl_password = !empty($_POST['ctrl_password']) ? strip_tags($_POST['ctrl_password']) : '';
$errors = array();
// Le formulaire a ete soumis, on a appuye sur le bouton Envoyer
if (!empty($_POST)) {
	if(!empty($_POST['register-submit'])){                                          // PARTIE REGISTER
    // On check les erreurs possibles
    if (empty($login) || !filter_var($login, FILTER_VALIDATE_EMAIL)) {
        $errors['login'] = 'Veuillez renseigner un email valide';
    }
    if (empty($password) && strlen($password) < 7 ){
        $errors['password'] = 'Veuillez renseigner votre mot de passe Valide (8 caracteres)';
    }
    if (empty($ctrl_password)) {
        $errors['ctrl_password'] = 'ConfirmeZ le mot de passe';
    } else if($ctrl_password != $password) {
        $errors['ctrl_password'] = 'Mot de Passe Non-Confirmez';
    }

    //debug($errors);
    // Aucune erreur dans le formulaire, tous les champs ont été saisis correctement
    if (empty($errors)) {

        //on verifie que le login est unique


     echo ("ici");

    $hash_password = password_hash($password, PASSWORD_BCRYPT);

        $query = $db->prepare('INSERT INTO user SET login = :login, password = :password, creation_date = Now()');
        // Pour chacune des variables précédées d'un : on doit faire un bindValue pour passer la valeur à la requête
        $query->bindValue(':login', $login, PDO::PARAM_STR);
        $query->bindValue(':password', $hash_password, PDO::PARAM_STR);
        // On execute la requête
        $query->execute();
        // On récupère le numéro de la ligne automatiquement généré par MySQL avec l'attribut AUTO_INCREMENT
        $insert_id = $db->lastInsertId();


        if (!empty($insert_id)) {

            $_SESSION['user_id '] = $insert_id;

            echo '<div class="alert alert-success" role="alert">';
            echo 'Votre inscription est prise en compte. Un email de confirmation vous sera envoyé dans les meilleurs délais. BON APPETIT !!! ';
            echo '</div>';

            exit();
        }
        $errors['db_error'] = 'Erreur interne, merci de reessayer ulterieurement';
    }
}
	if(!empty($_POST['login-submit'])){                                                //PARTIE LOGIN
		$login = !empty($_POST['login']) ? strip_tags(trim($_POST['login'])) : '';
		$password = !empty($_POST['password']) ? strip_tags(trim($_POST['password'])) : '';


		$errors = array();

// Le formulaire a ete soumis, on a appuye sur le bouton Envoyer


	// On check les erreurs possibles
	if (empty($login) || empty($password)) {
		$errors['login'] = 'Identifiants corrects';
	}

	//debug($errors);

	// Aucune erreur dans le formulaire, tous les champs ont été saisis correctement
		if (empty($errors)) {

		// On vérifie que le login/email est pas deja pris
			$query = $db->prepare('SELECT * FROM user WHERE login = :login');
			$query->bindValue(':login', $login, PDO::PARAM_STR);
			$query->execute();
			$user = $query->fetch();

		if (!empty($user)) {

			$crypted_password = $user['password'];

			if (password_verify($password, $crypted_password)) {

				// On connecte l'utilisateur
				$_SESSION['user_id'] = $user['id'];

				echo '<div class="alert alert-success" role="alert">';
				echo 'Connexion réussie !';
				echo '</div>';

				//header('Location: index.php');
				redirectJS('index.php', 2);
				exit();
			} else {
				$errors['login'] = 'Identifiants corrects';
			}
		}
	}




	}
}

 ?>
<style scoped>

body {
    padding-top: 90px;
}
.container{
	margin-top: 25px;
}
.panel-login {
	border-color: #ccc;
	-webkit-box-shadow: 0px 2px 3px 0px rgba(0,0,0,0.2);
	-moz-box-shadow: 0px 2px 3px 0px rgba(0,0,0,0.2);
	box-shadow: 0px 2px 3px 0px rgba(0,0,0,0.2);
}
.panel-login>.panel-heading {
	color: #00415d;
	background-color: #fff;
	border-color: #fff;
	text-align:center;
}
.panel-login>.panel-heading a{
	text-decoration: none;
	color: #666;
	font-weight: bold;
	font-size: 15px;
	-webkit-transition: all 0.1s linear;
	-moz-transition: all 0.1s linear;
	transition: all 0.1s linear;
}
.panel-login>.panel-heading a.active{
	color: #1967BE;
	font-size: 18px;
}
.panel-login>.panel-heading hr{
	margin-top: 10px;
	margin-bottom: 0px;
	clear: both;
	border: 0;
	height: 1px;
	background-image: -webkit-linear-gradient(left,rgba(0, 0, 0, 0),rgba(0, 0, 0, 0.15),rgba(0, 0, 0, 0));
	background-image: -moz-linear-gradient(left,rgba(0,0,0,0),rgba(0,0,0,0.15),rgba(0,0,0,0));
	background-image: -ms-linear-gradient(left,rgba(0,0,0,0),rgba(0,0,0,0.15),rgba(0,0,0,0));
	background-image: -o-linear-gradient(left,rgba(0,0,0,0),rgba(0,0,0,0.15),rgba(0,0,0,0));
}
.panel-login input[type="text"],.panel-login input[type="email"],.panel-login input[type="password"] {
	height: 45px;
	border: 1px solid #ddd;
	font-size: 16px;
	-webkit-transition: all 0.1s linear;
	-moz-transition: all 0.1s linear;
	transition: all 0.1s linear;
}
.panel-login input:hover,
.panel-login input:focus {
	outline:none;
	-webkit-box-shadow: none;
	-moz-box-shadow: none;
	box-shadow: none;
	border-color: #ccc;
}
.btn-login {
	background-color: #59B2E0;
	outline: none;
	color: #fff;
	font-size: 14px;
	height: auto;
	font-weight: normal;
	padding: 14px 0;
	text-transform: uppercase;
	border-color: #59B2E6;
}
.btn-login:hover,
.btn-login:focus {
	color: #fff;
	background-color: #53A3CD;
	border-color: #53A3CD;
}
.forgot-password {
	text-decoration: underline;
	color: #888;
}
.forgot-password:hover,
.forgot-password:focus {
	text-decoration: underline;
	color: #666;
}

.btn-register {
	background-color: #1CB94E;
	outline: none;
	color: #fff;
	font-size: 14px;
	height: auto;
	font-weight: normal;
	padding: 14px 0;
	text-transform: uppercase;
	border-color: #1CB94A;
}
.btn-register:hover,
.btn-register:focus {
	color: #fff;
	background-color: #1CA347;
	border-color: #1CA347;
}
</style>
<div class="container">
    	<div class="row">
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
			<div class="col-md-6 col-md-offset-3">
				<div class="panel panel-login">
					<div class="panel-heading">
						<div class="row">
							<div class="col-xs-6">
								<a href="#" class="active" id="login-form-link">Connexion</a>
							</div>
							<div class="col-xs-6">
								<a href="#" id="register-form-link">Inscription</a>
							</div>
						</div>
						<hr>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12">
								<form id="login-form" action="register.php" method="post" role="form" style="display: block;">     <!-- PARTIE LOGIN -->
									<div class="form-group">
										<input type="email" name="login" id="login" tabindex="1" class="form-control" placeholder="Email Address" value="">
									</div>
									<div class="form-group">
										<input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password" value="">
									</div>
									<div class="form-group text-center">
										<input type="checkbox" tabindex="3" class="" name="remember" id="remember">
										<label for="remember"> Remember Me</label>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Log In">
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-lg-12">
												<div class="text-center">
													<a href="http://phpoll.com/recover" tabindex="5" class="forgot-password">Forgot Password?</a>
												</div>
											</div>
										</div>
									</div>
								</form>
								<form id="register-form" action="register.php" method="post" role="form" style="display: none;">    <!-- PARTIE REGISTER -->

									<div class="form-group">
										<input type="login" name="login" id="login" tabindex="1" class="form-control" placeholder="Email Address" value="">
									</div>
									<div class="form-group">
										<input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password">
									</div>
									<div class="form-group">
										<input type="password" name="ctrl_password" id="ctrl_password" tabindex="2" class="form-control" placeholder="Confirm Password">
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="submit" name="register-submit" id="register-submit" tabindex="4" class="form-control btn btn-register" value="Register Now">
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap-slider.js"></script>
    <script src="js/app.js"></script>
    <script>

$(function() {

    $('#login-form-link').click(function(e) {
		$("#login-form").delay(100).fadeIn(100);
 		$("#register-form").fadeOut(100);
		$('#register-form-link').removeClass('active');
		$(this).addClass('active');


		e.preventDefault();
	});
	$('#register-form-link').click(function(e) {
		$("#register-form").delay(100).fadeIn(100);
 		$("#login-form").fadeOut(100);
		$('#login-form-link').removeClass('active');
		$(this).addClass('active');
		e.preventDefault();
	});

});


</script>


	<?php
require_once "partials/footer.php"
 ?>