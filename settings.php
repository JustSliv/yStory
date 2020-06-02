<?php 
require_once "scripts/authenfication.php";
session_start();
$user = new User();
//Смена имена/почты
$user->change_name_or_email();
//Смена пароля
$user->change_pass();
//Массив для занесение данных в поля форм
$allInfo = $user->getInfo();
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
	<!-- Часть паттерна POST/Redirect/GET -->
	<?php 
		$message_name = isset($_SESSION['result-msg']) ? $_SESSION['result-msg'] : false;
		$message_pass = isset($_SESSION['result-pass']) ? $_SESSION['result-pass'] : false;
	?>
	<!-- MAIN CONTANT -->
	<div class="wrapper">
		<?php require_once "header.php" ?>
		<div class="main-info container">
			<h4 class="text-center header-settings">Настройки профиля</h4>
			<!-- Отоборажение сообщения в случае изменения имени/почты -->
			<?php
			if (isset($_GET['result'])) {
				echo '<div class="alert alert-success">' . $message_name . '</div>';
			}
			?>
			
			<div class="row">
				<!-- Смена аватара (вложенные колонны для уменьшения размера изображения)-->
				<div class="col-4">
					<div class="row">
						<div class="col-10 avatar-column">
							<img <?php echo "src=images/user-photos/" . $allInfo['avatar']; ?> class="img-fluid avatar-img mx-auto">
							<form action="scripts/change-avatar.php" id="changeAvatarForm" method="post" enctype="multipart/form-data">
								<input type="file" name="upload"><br>
								<button class="btn btn-primary">Загрузить</button>
							</form>
						</div>
					</div>
				</div>
				<!-- Смена других параметров аккаунта -->
				<div class="col-8 inputs-column">
					<!-- Почта и имя -->
					<form method="post">
						<div class="form-group">
							<label for="changeName">Имя на сайте:</label>
							<input class="form-control" type="text" name="changeName" pattern=".{3,}" id="changeName" value=<?php echo $allInfo['name']; ?>>
						</div>
						<div class="form-group">
							<label for="changeEmail">Адрес електронной почты:</label>
							<input class="form-control" type="email" name="changeEmail" id="changeEmail" pattern="a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" value=<?php echo $allInfo['email']; ?>>
						</div>
						<div class="text-center">
							<button type="submit" class="btn btn-primary" id="reg-btn" name="change-btn">Сохранить изменения</button>
						</div>
					</form>

					<hr>

					<?php 
						if (isset($_GET['passchange'])) {
							if ($_GET['passchange'] == 'result') {
								echo '<div class="alert alert-success">' . $message_pass . '</div>';
							}
						}
					?>
					<!-- Пароль -->
					<form method="post">
						<h5 class="text-center">Смена пароля</h5>
						<div class="form-group">
							<label for="currPass">Текущий пароль:</label>
							<input class="form-control" type="password" name="currPass" id="currPass">
						</div>
						<div class="form-group">
							<label for="changePass">Пароль:</label>
							<input class="form-control" type="password" name="changePass" id="changePass">
						</div>
						<div class="form-group">
							<label for="changeConfirm">Подтвердите пароль:</label>
							<input class="form-control" type="password" name="changeConfirm" pattern="(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9]).{8,16}$" id="changeConfirm">
						</div>
						<div class="text-center">
							<button type="submit" class="btn btn-primary" name="change-pass-btn" pattern="(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9]).{8,16}$" id="reg-btn">Изменить пароль</button>
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