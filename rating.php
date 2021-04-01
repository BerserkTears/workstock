<?php 
    require 'db.php';
    $data=$_POST;
    $rabs = R::find('ratings','company = ?', array($_SESSION['logged_user']->company));
    asort($rabs);
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Рейтинг</title>
</head>
<body>
    <?php 
    foreach ($rabs as $rab){
        $rab->name = R::findOne('users','id = ?',$rab->user_id);
        echo $rab->name->name.' '.$rab->name->surname.' набрал'. $rab->score.'  баллов';
    }
    ?>
</body>
</html>