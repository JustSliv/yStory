<?php 
	require_once "scripts/authenfication.php";
	$loginIn = new User();
	$loginIn->login();
	session_start();
?>

<header>
	<div class="top-header">
		<div class="container">
			<nav class="navbar navbar-expand-lg navbar-light">
				<div class="d-inline">
					<a class="navbar-brand" href="index.php"><img src="images/yStory.png" id="logo_img" alt="Лого сайта"></a>
				</div>
				<div class="d-inline">
					<button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>
				</div>
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav mr-auto">
						<form class="form-inline">
							<input class="form-control" size="26" id="search_input" type="search" placeholder="Название или автор" aria-label="Search">
							<button type="button" class="btn btn-light" id="btn_search">Искать</button>
						</form>
					</ul>
					<ul class="navbar-nav ml-auto">
						<li class="nav-ite mr-auto">
							<button type="button" class="btn btn-light" id="btn_login" data-toggle="modal" data-target="#exampleModal">Войти</button>
						</li>
						<li class="nav-item mr-auto">
							<a href="registration.php"><button type="button" class="btn btn-light" id="btn_reg">Зарегистрироваться</button></a>
						</li>
					</ul>
				</div>
				
			</nav>
		</div>
	</div>
	<div class="low-header">
		<div class="container lower-header">
			<nav class="navbar navbar-expand-lg navbar-light">

				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav mx-auto">
						<li class="nav-item lowheader-link">
							<a class="nav-link" href="searchPlus.php">Расширеный поиск<span class="sr-only">(current)</span></a>
						</li>
						<li class="nav-item lowheader-link">
							<a class="nav-link" href="#news-block">Новости</a>
						</li>
						<li class="nav-item lowheader-link">
							<a class="nav-link" href="#popular-block">Популярное</a>
						</li>
					</ul>
				</div>
			</nav>
		</div>
	</div>

	<!-- Модальное окно логина -->
	<!-- Modal -->
	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Вход</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form method="post">
					<div class="modal-body">
						<div class="form-group">
							<label for="inputLogin">Логин</label>
							<input type="text" class="form-control" name="login" id="input_Login">
						</div>
						<div class="form-group">
							<label for="inputPass">Пароль</label>
							<input type="password" class="form-control" name="pass" id="input_Pass">
						</div>
					</div>
					<div class="modal-footer">
						<div class="text-center">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
							<button type="submit" name="login_sub" class="btn btn-primary">Войти</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</header>