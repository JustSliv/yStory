<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>yStory Поиск+</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <link rel="stylesheet" href="styles/styles.css">
    <link rel="stylesheet" type="text/css" href="styles/header-styles.css">
</head>
<body>
	<div class="wrapper">
        <?php require_once "header.html" ?>
        <div class="features">
            <div class="head">
                <label for="name-publish">Название: </label>
                <input type="text" id="name-publish">
                <br>
                <label for="auth-publish">Автор: </label>
                <input type="text" id="auth-publish">
            </div>
            <div class="genres">
               <p class="genre-title">Жанр: </p>
                <ul class="list-genres">
                   <li class="genres-item">
                        <input type="checkbox" id="genre1">
                        <label for="genre1">Жанр1</label>
                   </li>
                   <li class="genres-item">
                        <input type="checkbox" id="genre2">
                        <label for="genre2">Жанр2</label>
                   </li>
                   <li class="genres-item">
                        <input type="checkbox" id="genre3">
                        <label for="genre3">Жанр3</label>
                   </li>
                   <li class="genres-item">
                        <input type="checkbox" id="genre4">
                        <label for="genre4">Жанр4</label>
                   </li>
                </ul>
            </div>
            <br/>
            <div class="status-publish">
              <p class="status-title">Статус: </p>
               <ul class="list-status">
                   <li class="status-item">
                        <input type="checkbox" id="finished">
                        <label for="finished">Закончен</label>
                   </li>
                   <li class="status-item">
                        <input type="checkbox" id="isFrozen">
                        <label for="isFrozen">Заморожен</label>
                   </li>
                   <li class="status-item">
                        <input type="checkbox" id="inProcess">
                        <label for="inProcess">В процессе</label>
                   </li>
               </ul>
            </div>
            <div class="rates">
                <label for="rating-publish_from">Рейтинг от </label>
                <input type="number" id="rating-publish_from" min="0" max="10">
                <label for="rating-publish_to">до </label>
                <input type="number" id="rating-publish_to" min="0" max="10">
            </div>
            <div class="sort-by">
              <p class="sort-title">Сортировка по: </p>
               <ul class="list-sorts">
                   <li class="item-sort">
                        <input type="radio" id="auth-name_a-z" name="sort">
                <label for="auth-name_a-z">Имени автора (от А до Я)</label>
                   </li>
                   <li class="item-sort">
                       <input type="radio" id="auth-name_z-a" name="sort">
                <label for="auth-name_z-a">Имени автора (от Я до А)</label>
                   </li>
                   <li class="item-sort">
                        <input type="radio" id="name-publish_a-z" name="sort">
                <label for="name-publish_a-z">Названию рассказа (от А до Я)</label>
                   </li>
                   <li class="item-sort">
                       <input type="radio" id="name-publish_z-a" name="sort">
                <label for="name-publish_z-a">Названию рассказа (от Я до А)</label>
                   </li>
                   <li class="item-sort">
                       <input type="radio" id="rate-lower" name="sort">
                <label for="rate-lower">Рейтингу (по убыванию)</label>
                   </li>
                   <li class="item-sort">
                       <input type="radio" id="rate-upper" name="sort">
                <label for="rate-upper">Рейтингу (по возрастанию)</label>
                   </li>
               </ul> 
            </div>
            <button class="btn btn-primary">Искать</button>
        </div>
        <?php require_once 'footer.html' ?>
    </div>
</body>
</html>