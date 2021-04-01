<?php
require 'db.php';
$data = $_POST;
$tests = R::findAll('tests');
if (isset($data['tet'])){
    $_SESSION['logged_user']->chosen_test = $data['te'];
}
if (isset($data['test_sumbit'])){
    $rate=0;
    $test=R::findone('tests', 'name = ?', array($_SESSION['logged_user']->chosen_test));
    for ($i = 1;$i <= $test['kol'] ; $i++){
        if ($test['answer'.$i] == $data['user_answer'.$i]){
            $rate = $rate + $test['rating'.$i];
        }
    }
    $rating=R::dispense('ratings');
    $rating->user_id = $_SESSION['logged_user']->id;
    $rating->company = $test['name'];
    $rating->score = $rate;
    R::store($rating);
    $_SESSION['logged_user']->chosen_test=false;
}
?>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Тестирование</title>
</head>
<body>
    <?php if($_SESSION['logged_user']->chosen_test):?>
        <!--тест-->
        <form action="list.php" method="POST">
        <?php echo "Тест ".$_SESSION['logged_user']->chosen_test;
            $test=R::findone('tests', 'name = ?', array($data['te']));
            for ($i = 1;$i <= $test['kol'] ; $i++){
               echo '<p>'.$test['question'.$i].'</p><br>';
               echo '<input type="text" name="user_answer'.$i.'">';
                //$test['answer'.$i] 
                //$test['rating'.$i] 
            }
        ?>
        <br>
        <button type='sumbit' name='test_sumbit'>Завершить тест</button>
        </form>
    <?php else: ?>
        <!--список тестов-->
        
        <?php 
        foreach ($tests as $te){
            echo '<form action="list.php" method="POST">';
            echo $te->name.'      '.$te->kol.' вопроса';
            echo "<input type='hidden' name = 'te' value = '".$te->name."'>";
            echo '<button type="submit" name = "tet">Пройти тест</button>';
            echo "</form>";
        }
        ?>
    <?php endif; ?>
</body>
</html>