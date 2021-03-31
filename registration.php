<?php
require "db.php";

$data=$_POST;
if (isset($data['do_reg'])){
    if (R::count('users', "login = ?", array($data['login'])) > 0) {echo '<script>alert("Пользователь зарегистрирован")</script>';} else {
        if($data['password']==$data['password1']){
            $user=R::dispense('users');
            $user -> login = $data['login'];
            $user -> password = $data['password'];
            R::store($user);
            echo 'Вы успешно зарегистрировались';
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
        <input type="email" name="login" value= "<?php echo @$data[login] ?>">
        <input type="password" name="password">
        <input type="password" name="password1">
        <button type="submit" name = "do_reg"> Зарегистрироваться </button>
    </form>
</body>
</html>