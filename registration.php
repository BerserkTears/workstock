<?php
require "db.php";

$data=$_POST;
if (isset($data['do_reg'])){

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Регистрация</title>
</head>
<body>
    <form action="/registration.php" method="POST"> 
        <input type="email" name="login" value= "<?php echo @$data[login] ?>">"
        <input type="password" name="password">
        <input type="password" name="password1">
        <button type="submit" name = "do_reg"> Зарегистрроваться </button>
    </form>
</body>
</html>