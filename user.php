<?php
	require_once "scripts/authenfication.php";
	session_start();
	$user = new User();
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
	<link rel="stylesheet" type="text/css" href="styles/user-styles.css">
	<!-- FONTS -->
	<link href="https://fonts.googleapis.com/css2?family=Oswald:wght@700&display=swap" rel="stylesheet">
	<!-- SCRIPTS -->
	<script src="https://kit.fontawesome.com/79ff47f658.js" crossorigin="anonymous"></script>
	<script type="text/javascript" src="scripts/script.js"></script>
	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
	<script type="text/javascript" src="scripts/bootstrap.js"></script>
</head>
<body>
	<div class="wrapper">
		<?php require_once "header.php" ?>
		<div class="main-info container">
			<div class="row">
				<div class="col-3">
					<div class="row">
						<div class="col-10">
							<div class="mx-auto">
								<?php 
									if (is_array($allInfo)) {
										echo '<img src="images/user-photos/' . $allInfo['avatar'] . '" class="img-fluid avatar-img mx-auto">';
									}
								?>
							</div>
							<div class="mx-auto">
								<a href="settings.php"><button class="mx-auto btn btn-settings"><i class="fas fa-cog"></i> Настройки профиля</button></a>
							</div>
							<form action="scripts/add-publication.php" id="changeAvatarForm" method="post" enctype="multipart/form-data">
								<input type="file" name="upload"><br>
								<button class="btn btn-primary" >Загрузить</button>
							</form>
						</div>
					</div>
				</div>
				<div class="col-9">
					<nav class="tabbable">
						<ul class="nav nav-tabs" id="myTab" role="tablist">
							<li class="nav-item">
								<a class="nav-link active" id="lists-tab" data-toggle="tab" href="#lists" role="tab" aria-controls="lists" aria-selected="true">Сборники</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" id="subcribes-tab" data-toggle="tab" href="#subcribes" role="tab" aria-controls="subcribes" aria-selected="false">Подписки</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" id="subscribers-tab" data-toggle="tab" href="#subscribers" role="tab" aria-controls="subscribers" aria-selected="false">Подписчики</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" id="publications-tab" data-toggle="tab" href="#publications" role="tab" aria-controls="publications" aria-selected="false">Ваши произведения</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" id="note-tab" data-toggle="tab" href="#note" role="tab" aria-controls="note" aria-selected="false">Уведомления</a>
							</li>
						</ul>
					</nav>
					<div class="tab-content" id="myTabContent">
						<div class="tab-pane fade show active userTab overflow-auto" id="lists" role="tabpanel" aria-labelledby="lists-tab">
							<!-- INNER TABS -->
							<nav class="tabbable">
								<ul class="nav nav-tabs" id="inner-tabs" role="tablist">
									<li class="nav-item">
										<a class="nav-link active" id="list1-tab" data-toggle="tab" href="#list1" role="tab" aria-controls="list1" aria-selected="true">Сборники</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" id="list2-tab" data-toggle="tab" href="#list2" role="tab" aria-controls="list2" aria-selected="false">Подписки</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" id="list3-tab" data-toggle="tab" href="#list3" role="tab" aria-controls="list3" aria-selected="false">Подписчики</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" id="list4-tab" data-toggle="tab" href="#list4" role="tab" aria-controls="list4" aria-selected="false">Ваши произведения</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" id="list5-tab" data-toggle="tab" href="#list5" role="tab" aria-controls="list5" aria-selected="false">Уведомления</a>
									</li>
								</ul>
							</nav>
							<div class="tab-content" id="nav-tabContent">
								<div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">...</div>
								<div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">...</div>
								<div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">...</div>
							</div>
							<!-- INNER TABS END --->
						</div>
						<div class="tab-pane fade userTab" id="subcribes" role="tabpanel" aria-labelledby="subcribes-tab">...</div>
						<div class="tab-pane fade userTab" id="subscribers" role="tabpanel" aria-labelledby="subscribers-tab">...</div>
						<div class="tab-pane fade userTab" id="publications" role="tabpanel" aria-labelledby="publications-tab">...</div>
						<div class="tab-pane fade userTab" id="note" role="tabpanel" aria-labelledby="note-tab">...</div>
					</div>
				</div>
			</div>
		</div>
		<?php require_once "footer.html" ?>
	</div>
</body>
</html>