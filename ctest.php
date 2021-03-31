<?php 
require "db.php";
$data = $_POST;
$test = R::findOne('tests', 'name = ?', array($_SESSION['logged_user']->company));
if (isset($data['plus'])){
    $test->kol = $test->kol + 1;
    R::store($test);
}
if (isset($data['minus'])){
    $test->kol = $test->kol - 1;
    R::store($test);
}
if (isset($data['save'])){
    for ($i = 1;$i <= $test['kol'] ; $i++){
        $test['question'.$i] = $data['question'.$i];
        $test['answer'.$i] = $data['answer'.$i];
        $test['rating'.$i] = $data['rating'.$i];
    }
    R::store($test);
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Создание тестов</title>
</head>
<body>
    <form action="ctest.php" method="POST">
        <?php for ($i = 1;$i <= $test['kol'] ; $i++){
            echo '
            <p>Вопрос '.$i.'</p><br>
            <input type="text" name="question'.$i.'" placeholder = "Напишите вопрос" value = "'.$data['question'.$i].'"><br>
            <input type="text" name="answer'.$i.'" placeholder = "Напишите ответ" value = "'.$data['answer'.$i].'">
            <input type="text" name="rating'.$i.'" placeholder = "Напишите вес ответа" value = "'.$data['rating'.$i].'">
            <br>';
        }
        ?>
    <button type="submit" name = "plus">Добавить вопрос</button>
    <button type="submit" name = "minus">Удалить вопрос</button>
    <button type="submit" name = "save">Сохранить тест</button>
    </form>
</body>
</html>