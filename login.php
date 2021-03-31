<?php
require "db.php";
$data=$_POST;
if (isset($data['do_log'])){
    $user = R::findOne('users', 'login = ?', array($data['login']));
    if ($user){
        if($data['password'] == $user->password) {
            $_SESSION['logged_user'] = $user;
            header('Location: /lk.php');
        } else {
            echo '<script>alert("Неверный пароль")</script>';
        }
    } else {
        echo '<script>alert("Пользователь не найден")</script>';
    }
}
?>

<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Вход</title>
</head>
<body>
    <form action="/login.php" method="POST"> 
        <input type="email" name="login" value= "<?php echo @$data[login] ?>" required placeholder = "Логин">
        <input type="password" name="password" required placeholder = "Пароль">
        <button type="submit" name = "do_log"> Вход </button>
    </form>
</body>
</html>