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
        <?php require_once "header.php" ?>
        <div class="container main-info">
            <h3 class="text-center">Поиск произведения</h3>
            <form method="get">

                <div class="row">
                    <div class="col-8">
                        <div class="form-group">
                            <label for="inputTitle" id="titleLabel">Название:</label>
                            <input class="form-control" type="text" name="title" id="inputTitle">
                        </div>
                        <div class="form-group">
                            <label for="inputAuthor" id="authorLabel">Автор:</label>
                            <input class="form-control" type="text" name="author" id="inputAuthor">
                        </div>
                    </div>
                    <div class="col-4">
                        <span id="spanGenres">Жанры:</span>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="genreID1" id="checkGenre1"></input>
                                    <label class="form-check-label" for="checkGenre1">Жанр 1</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="genreID2" id="checkGenre2"></input>
                                    <label class="form-check-label" for="checkGenre2">Жанр 2</label>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="genreID3" id="checkGenre3"></input>
                                    <label class="form-check-label" for="checkGenre3">Жанр 3</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="genreID4" id="checkGenre4"></input>
                                    <label class="form-check-label" for="checkGenre4">Жанр 4</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="status-div">
                    <p>Статус произведения:</p>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="statusID1" id="status1"></input>
                        <label class="form-check-label" for="status1">Закончен</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="statusID2" id="status2"></input>
                        <label class="form-check-label" for="status2">В процессе</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="statusID3" id="status3"></input>
                        <label class="form-check-label" for="status3">Заморожен</label>
                    </div>
                </div>
                <div class="rate-div">
                    <span class="rate-div-text"><br>Рейтинг от</span>
                    <input type="number" min="0" max="10" name="rate-from">
                    <span class="rate-div-text">до</span>
                    <input type="number" min="0" max="10" name="rate-to">
                </div>
                <div class="sort-div">
                    <p><br>Отсортировать по:</p>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="sortBy" id="sortID1" value="byAuthorA" checked>
                        <label class="form-check-label" for="sortID1">
                            Имени автора (от А до Я)
                        </label>                        
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="sortBy" id="sortID2" value="byAuthorD">
                        <label class="form-check-label" for="sortID2">
                            Имени автора (от Я до А)
                        </label>                        
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="sortBy" id="sortID3" value="byTitleA">
                        <label class="form-check-label" for="sortID3">
                            Названию произведения (от А до Я)
                        </label>                        
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="sortBy" id="sortID4" value="byTitleD">
                        <label class="form-check-label" for="sortID4">
                            Названию произведения (от Я до А)
                        </label>                        
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="sortBy" id="sortID5" value="byRateD">
                        <label class="form-check-label" for="sortID5">
                            Рейтингу (по убываню)
                        </label>                        
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="sortBy" id="sortID6" value="byRateA">
                        <label class="form-check-label" for="sortID6">
                            Рейтингу (по возрастанию)
                        </label>                        
                    </div>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary btn-search">Искать</button>
                </div>
            </form>
        </div>
        <?php require_once 'footer.html' ?>
    </div>
</body>
</html>