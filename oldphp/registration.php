<?php
require "db.php";

$data=$_POST;
if (isset($data['do_reg'])){
    if (R::count('users', "login = ?", array($data['login'])) > 0) {echo '<script>alert("Пользователь зарегистрирован")</script>';} else {
        if($data['password']==$data['password1']){
            $user=R::dispense('users');
            $user -> login = $data['login'];
            $user -> password = $data['password'];
            $user -> name = $data['name'];
            $user -> surname = $data['surname'];
            $user -> company = "none";
            R::store($user);
            $_SESSION['logged_user'] = $user;
            header('Location: /lk.php');
        }
    }
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Регистрация</title>
</head>
<body>
    <form action="/registration.php" method="POST"> 
        <input type="text" name="name" required placeholder = "Имя">
        <input type="text" name="surname" required placeholder = "Фамилия">
        <input type="email" name="login" value= "<?php echo @$data[login] ?>" required placeholder = "Логин(почта)"> 
        <input type="password" name="password" required placeholder = "Пароль">
        <input type="password" name="password1" required placeholder = "Подтвердите пароль">
        <button type="submit" name = "do_reg"> Зарегистрироваться </button>
    </form>
</body>
</html>