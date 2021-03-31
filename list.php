<?php
require 'db.php';
$data = $_POST;
$tests = R::findAll('tests');
if (isset($data['tet'])){
    $_SESSION['logged_user']->chosen_test = $data['te'];
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
        <?php echo $data['te']; ?>
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