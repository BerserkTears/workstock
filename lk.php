<?php 
require "db.php";
$data=$_POST;
if ($_SESSION['logged_user']->company == "none"){
    echo $_SESSION['logged_user']->name , ", privet!";
} else {
    echo $_SESSION['logged_user']->company , ", zdravstvu'te!";
}
?>

<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Личный кабинет</title>
</head>
<body>
    <a href="logout.php">Выход</a>
</body>
</html>