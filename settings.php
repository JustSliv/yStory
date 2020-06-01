<?php 
	
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
			<h4 class="text-center header-settings">Настройки профиля</h4>
			<div class="row">
				<div class="col-3">
					<div class="row">
						<div class="col-10">
							<img src="images/avatar-default.png" class="img-fluid avatar-img mx-auto">
							<div class="text-center">
								<button class="btn btn-primary" id="accept-btn">Сменить аватар</button>
							</div>
						</div>
					</div>
				</div>

				<div class="col-9">
					<form>
						<div class="form-group">
							<label for="changeLogin">Логин:</label>
							<input class="form-control" type="text" name="changeLogin" id="changeLogin">
						</div>
						<div class="form-group">
							<label for="changeEmail">Адрес електронной почты:</label>
							<input class="form-control" type="email" name="changeEmail" id="changeEmail">
						</div>
						<hr>
						<h5 class="text-center">Смена пароля</h5>
						<div class="form-group">
							<label for="changePass">Пароль:</label>
							<input class="form-control" type="password" name="changePass" id="changePass">
						</div>
						<div class="form-group">
							<label for="changeConfirm">Подтвердите пароль:</label>
							<input class="form-control" type="password" name="changeConfirm" id="changeConfirm">
						</div>
						<div class="text-center">
							<button type="submit" class="btn btn-primary" id="reg-btn">Сохранить изменения</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<?php require_once "footer.html" ?>


<!-- CSS only -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

<!-- JS, Popper.js, and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>