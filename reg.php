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
	<link rel="stylesheet" type="text/css" href="styles/reg/styles.css"/>
	<link rel="stylesheet" href="styles/styles.css">
	<link rel="stylesheet" type="text/css" href="styles/header-styles.css">
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<!-- Add the slick-theme.css if you want default styling -->
	<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.0/slick/slick.css"/>
	<!-- Add the slick-theme.css if you want default styling -->
	<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.0/slick/slick-theme.css"/>
	<!-- FONTS -->
	<link href="https://fonts.googleapis.com/css2?family=Oswald:wght@700&display=swap" rel="stylesheet">
	<!-- SCRIPTS -->
	<script src="https://kit.fontawesome.com/79ff47f658.js" crossorigin="anonymous"></script>
	<script type="text/javascript" href="scripts/script.js"></script>
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
	<link rel="stylesheet" type="text/css" href="slick-1.8.1/slick/slick.css"/>
	<link rel="stylesheet" type="text/css" href="slick-1.8.1/slick/slick-theme.css"/>

</head>
<body>
	<div class="wrapper">
		<?php require_once "header.html" ?>
        <div class="content">
            <h4 class="topic">Регистрация</h4>
            <div class="reg_data">
                <p>Логин:<br>
                <input required class="data" type="text"></input>
                <p>Пароль:<br>
                <input required class="data" type="password"></input>
                <p>Подтвердить пароль:<br>
                <input required class="data" type="password"></input>
                <p>Адрес электронной почты:<br>
                <input required class="data" type="text"></input>
                <p>Ваш ник на сайте:<br>
                <input required class="data" type="text"></input>
                <input class="reg_button" type="submit" value="Зарегистрироваться"></input>
             </div>
        </div>
		<?php require_once "footer.html" ?>
	</div>


	<!-- CSS only -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

	<!-- JS, Popper.js, and jQuery -->
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

	<!-- Carousel script -->
	<script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
	<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
	<script type="text/javascript" src="slick-1.8.1/slick/slick.min.js"></script>

	<script type="text/javascript">
		var w = window.innerWidth;
		if (w >= 1200) {
			$('.autoplay').slick({
				slidesToShow: 5,
				slidesToScroll: 1,
				autoplay: true,
				autoplaySpeed: 3000,
			});
		} else if (w >= 992 && w <= 1199) {
			$('.autoplay').slick({
				slidesToShow: 4,
				slidesToScroll: 1,
				autoplay: true,
				autoplaySpeed: 3000,
			});
		} else if (w >= 768 && w <= 991) {
			$('.autoplay').slick({
				slidesToShow: 3,
				slidesToScroll: 1,
				autoplay: true,
				autoplaySpeed: 3000,
			});
		} else if (w < 767) {
			$('.autoplay').slick({
				slidesToShow: 2,
				slidesToScroll: 1,
				autoplay: true,
				autoplaySpeed: 2000,
			});
		}
	</script>
</body>
</html>