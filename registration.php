<?php 
	require_once "scripts/authenfication.php";
	$user = new User();
	$msg = $user->registraion();
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<!-- META TAGS -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- TITLE -->
	<title>yStory</title>
	<!-- CSS LINKS -->
	<link rel="stylesheet" href="styles/styles.css">
	<link rel="stylesheet" type="text/css" href="styles/header-styles.css">
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.0/slick/slick.css"/>
	<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.0/slick/slick-theme.css"/>
	<link rel="stylesheet" type="text/css" href="slick-1.8.1/slick/slick.css"/>
	<link rel="stylesheet" type="text/css" href="slick-1.8.1/slick/slick-theme.css"/>
	<!-- FONTS -->
	<link href="https://fonts.googleapis.com/css2?family=Oswald:wght@700&display=swap" rel="stylesheet">
	<!-- SCRIPTS -->
	<script src="https://kit.fontawesome.com/79ff47f658.js" crossorigin="anonymous"></script>
	<script type="text/javascript" href="scripts/script.js"></script>
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</head>
<body>
	<div class="wrapper">
		<?php require_once "header.php" ?>
		<div class="main-info container">
			<h4 class="text-center">Регистрация</h4>
			<?php 
			if ($msg) {
				echo '<div class="alert alert-danger" role="alert">'
						. $msg .
					'</div>';
			}
			?>
			<form method="post">
				<div class="form-group">
					<label for="inputLogin">Логин:</label>
					<input required name="login" class="form-control" id="inputLogin" aria-describedby="loginHelp" type="text" placeholder="Введите логин" pattern="[A-Za-z0-9]{5,}" title="Логин может содержать только буквы латинского алфавита или цифры. Минимальная длинна - 5 символов">
				</div>
				<div class="form-group">
					<label for="inputPass">Пароль:</label>
					<input required name="pass" class="form-control" id="inputPass" aria-describedby="passHelp" type="password" placeholder="Введите пароль" pattern="(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9]).{8,16}$" title="Пароль должен содержать хотя бы 1 заглавную и 1 строчную буквы латинского алфавита и 1 цифру (мин. длинна - 8, макс. длинна - 16">
				</div>
				<div class="form-group">
					<label for="inputConfirm">Подтвердите пароль:</label>
					<input required name="confirm" class="form-control" id="inputConfirm" aria-describedby="confirmHelp" type="password" placeholder="Подтвердите пароль" pattern="(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9]).{8,16}$">
				</div>
				<div class="form-group">
					<label for="inputEmail">Адресс електронной почты:</label>
					<input required name="email" class="form-control" id="inputEmail" aria-describedby="emailHelp" type="email" placeholder="Введите адрес електронной почты" pattern="a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$">
				</div>
				<div class="form-group">
					<label for="inputName">Ник на сайте:</label>
					<input required name="name" class="form-control" id="inputName" aria-describedby="nickHelp" type="text" placeholder="Ваше имя, отображаемое на сайте" pattern=".{3, }">
				</div>
				<div class="text-center">
					<button name="accept" type="submit" class="btn btn-primary" id="reg-btn">Подтвердить</button>
				</div>
			</form>
		</div>
		<?php require_once "footer.html" ?>
	</div>


	<!-- CSS only -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

	<!-- JS, Popper.js, and jQuery -->
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>