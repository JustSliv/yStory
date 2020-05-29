<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>yStory Помощь</title>
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <link rel="stylesheet" href="styles/styles.css">
    <link rel="stylesheet" type="text/css" href="styles/header-styles.css">
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</head>
<body>
    <div class="wrapper">
        <?php require_once "header.html" ?>
        <div class="content">
            <h2>ВОПРОСЫ И ОТВЕТЫ</h2>
            <div class="question">
                <span class="title title1">
                    ВОПРОС_№ НАЗВАНИЕ ВОПРОСА
                </span>
                <div class="content-question q1">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Praesentium aliquam ab eveniet, quos minima, magnam aliquid est earum atque facere ipsum vitae at cumque iure porro ad quibusdam corporis quae!
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam itaque ut consequatur magni laboriosam tempore omnis. Eos dolores, repellendus. Eligendi iure quo, architecto corrupti voluptas error iusto dicta nesciunt suscipit!
                </div>
            </div>
            <div class="question">
                <span class="title title2">
                    ВОПРОС_№ НАЗВАНИЕ ВОПРОСА
                </span>
                <div class="content-question q2">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Praesentium aliquam ab eveniet, quos minima, magnam aliquid est earum atque facere ipsum vitae at cumque iure porro ad quibusdam corporis quae!
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam itaque ut consequatur magni laboriosam tempore omnis. Eos dolores, repellendus. Eligendi iure quo, architecto corrupti voluptas error iusto dicta nesciunt suscipit!
                </div>
            </div>
            <div class="question">
                <span class="title title3">
                    ВОПРОС_№ НАЗВАНИЕ ВОПРОСА
                </span>
                <div class="content-question q3">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Praesentium aliquam ab eveniet, quos minima, magnam aliquid est earum atque facere ipsum vitae at cumque iure porro ad quibusdam corporis quae!
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam itaque ut consequatur magni laboriosam tempore omnis. Eos dolores, repellendus. Eligendi iure quo, architecto corrupti voluptas error iusto dicta nesciunt suscipit!
                </div>
            </div>
            <div class="question">
                <span class="title title4">
                    ВОПРОС_№ НАЗВАНИЕ ВОПРОСА
                </span>
                <div class="content-question q4">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Praesentium aliquam ab eveniet, quos minima, magnam aliquid est earum atque facere ipsum vitae at cumque iure porro ad quibusdam corporis quae!
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam itaque ut consequatur magni laboriosam tempore omnis. Eos dolores, repellendus. Eligendi iure quo, architecto corrupti voluptas error iusto dicta nesciunt suscipit!
                </div>
            </div>
        </div>
        <?php require_once "footer.html" ?>
    </div>
    <script>
        var count = 0;
        $('.title1').click(function(event) {
            if(count == 0){
                $('.q1').slideDown('slow'); count++;  
            }
            else {
                $('.q1').slideUp('slow');
                count--;
            }
        });
        $('.title2').click(function(event) {
            if(count == 0){
                $('.q2').slideDown('slow'); count++;  
            }
            else {
                $('.q2').slideUp('slow');
                count--;
            }
        });
        $('.title3').click(function(event) {
            if(count == 0){
                $('.q3').slideDown('slow'); count++;  
            }
            else {
                $('.q3').slideUp('slow');
                count--;
            }
        });
        $('.title4').click(function(event) {
            if(count == 0){
                $('.q4').slideDown('slow'); count++;  
            }
            else {
                $('.q4').slideUp('slow');
                count--;
            }
        });
    </script>
</body>
</html>