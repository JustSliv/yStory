<?php

// Перезапишем переменные для удобства
$filePath  = $_FILES['upload']['tmp_name'];
$errorCode = $_FILES['upload']['error'];

// Проверим на ошибки
if ($errorCode !== UPLOAD_ERR_OK || !is_uploaded_file($filePath)) {

    // Массив с названиями ошибок
    $errorMessages = [
        UPLOAD_ERR_INI_SIZE   => 'Размер файла превысил значение upload_max_filesize в конфигурации PHP.',
        UPLOAD_ERR_FORM_SIZE  => 'Размер загружаемого файла превысил значение MAX_FILE_SIZE в HTML-форме.',
        UPLOAD_ERR_PARTIAL    => 'Загружаемый файл был получен только частично.',
        UPLOAD_ERR_NO_FILE    => 'Файл не был загружен.',
        UPLOAD_ERR_NO_TMP_DIR => 'Отсутствует временная папка.',
        UPLOAD_ERR_CANT_WRITE => 'Не удалось записать файл на диск.',
        UPLOAD_ERR_EXTENSION  => 'PHP-расширение остановило загрузку файла.',
    ];

    // Зададим неизвестную ошибку
    $unknownMessage = 'При загрузке файла произошла неизвестная ошибка.';

    // Если в массиве нет кода ошибки, скажем, что ошибка неизвестна
    $outputMessage = isset($errorMessages[$errorCode]) ? $errorMessages[$errorCode] : $unknownMessage;

    // Выведем название ошибки
    die($outputMessage);
}

// Создадим ресурс FileInfo
$fi = finfo_open(FILEINFO_MIME_TYPE);

// Получим MIME-тип
$mime = (string) finfo_file($fi, $filePath);

// Закроем ресурс
finfo_close($fi);

// Проверим ключевое слово image (image/jpeg, image/png и т. д.)
if (strpos($mime, 'htm') === false) die('Можно загружать только файлы формата .htm');

// Результат функции запишем в переменную
$publication = getimagesize($filePath);

// Сгенерируем новое имя файла на основе MD5-хеша
$name = md5_file($filePath);

$pdo = new PDO('mysql:dbname=ystory;host=localhost', 'ystoryuser', 'ystorypass');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$insert = $pdo->prepare('INSERT INTO `Publication` (`Title`,`Description`,`filename`) VALUES (:title, "Описание отсуствует", :fname)');
$insert->execute(array(':title' => $filePath, ':fname' => $name . '.htm'));

$getId = $pdo->prepare('SELECT MAX(`pubID`) FROM `Publication`');
$getId->execute();
$id = $getId->fetch(PDO::FETCH_NUM);

if (!file_exists(dirname(getcwd() . "\\", 1) . "\\publications\\" . $id[0])) {
    mkdir(dirname(getcwd() . "\\", 1) . "\\publications\\" . $id[0]);
}

// Переместим картинку с новым именем и расширением в папку /pics
if (!move_uploaded_file($filePath, dirname(getcwd() . "\\", 1) . "\\publications\\" . $id[0] . "\\" . $name . '.htm')) {
    die('При записи изображения на диск произошла ошибка.');
} else {
    $index = '../publications/index.php';
    $new_index = '../publications/' . $id[0] . '/index.php';

    $header = '../publications/header.php';
    $new_header = '../publications/' . $id[0] . '/header.php';

    copy($index, $new_index);
    copy($header, $new_header);
    header('Location: ../publications/' . $id[0] . '/');
}

?>