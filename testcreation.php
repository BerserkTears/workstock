<?php 
require "db.php";
$data = $_POST;
$test = R::findOne('tests', 'name = ?', array($_SESSION['logged_user']->inn));
if (isset($data['plus'])){
    $test->kol = $test->kol + 1;
    for ($i = 1;$i <= $test['kol'] ; $i++){
        $test['question'.$i] = $data['question'.$i];
        $test['answer'.$i] = $data['answer'.$i];
        $test['rating'.$i] = $data['rating'.$i];
    }
    R::store($test);
}
if (isset($data['minus'])){
    $test->kol = $test->kol - 1;
    for ($i = 1;$i <= $test['kol'] ; $i++){
        $test['question'.$i] = $data['question'.$i];
        $test['answer'.$i] = $data['answer'.$i];
        $test['rating'.$i] = $data['rating'.$i];
    }
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
if (isset($data['lk'])){
  header('Location:/lk.php');
}
?>
<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>WorkStock</title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png"/>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&family=Source+Code+Pro:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/bootstrap-5.0.0-alpha-2.min.css" />
    <link rel="stylesheet" href="assets/css/LineIcons.2.0.css"/>
    <link rel="stylesheet" href="assets/css/tiny-slider.css"/>
    <link rel="stylesheet" href="assets/css/glightbox.min.css"/>
    <link rel="stylesheet" href="assets/css/animate.css"/>
    <link rel="stylesheet" href="assets/css/lindy-uikit.css"/>
    <link rel="stylesheet" href="css/style.css">
    <style>.section-title { background: none;
    }
    .contact-section{
      overflow:visible;
    }
    </style>
    
  </head>
  <body>
    <section id="contact" class="contact-section contact-style-1">
        <div class="container">
          <div class="row">
            <div class="col-lg-12 pt-50 pl-50 pr-50 pb-50 formreg">
  
              <div class="row">
                <div class="col-xxl-12 col-xl-12 col-lg-10">
                  <div class="section-title mb-40">
                    <h3 class="mb-15">Создание теста</h3>
                  </div>
                </div>
              </div>
  
              <div class="contact-form-wrapper">
                <form action="testcreation.php" method="POST">
                  <div class="row">
                  <?php for ($i = 1;$i <= $test['kol'] ; $i++){
                        echo '
                        <p>Вопрос '.$i.'</p><br>
                        <div class="col-md-9">
                          <div class="single-input">
                            <label for="question">Вопрос</label>
                            <input type="text" id="question" name="question'.$i.'" class="form-input" placeholder="Введите вопрос" value = "'.$test['question'.$i].'">
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="single-input">
                            <label for="answer">Ответ</label>
                            <input type="text" id="answer" name="answer'.$i.'" class="form-input" placeholder="Введите ответ" value = "'.$test['answer'.$i].'">
                          </div>
                        </div>
                        <div class="col-md-2">
                          <div class="single-input">
                            <label for="rating">Вес правильного ответа</label>
                            <input type="text" id="rating" name="rating'.$i.'" class="form-input" placeholder="Введите вес ответа" value = "'.$test['rating'.$i].'">
                          </div>
                        </div>';
                    }
                    ?>        
                  </div>
                  <div class="form-button">
                  <button type="submit" class="button radius-30" name='plus'>Добавить вопрос</button>
                  <button type="submit" class="button radius-30" name='minus'>Удалить вопрос</button>
                  <button type="submit" class="button radius-30" name='save'>Сохранить тест</button>
                  <button type="submit" class="button radius-30" name='lk'>Вернуться в лк</button>
                  </div>
                </form>
              </div>
  
            </div>
          </div>
        </div>
      </section>
    <script src="assets/js/bootstrap.5.0.0.alpha-2-min.js"></script>
    <script src="assets/js/tiny-slider.js"></script>
    <script src="assets/js/count-up.min.js"></script>
    <script src="assets/js/imagesloaded.min.js"></script>
    <script src="assets/js/isotope.min.js"></script>
    <script src="assets/js/glightbox.min.js"></script>
    <script src="assets/js/wow.min.js"></script>
    <script src="assets/js/main.js"></script>
  </body>
</html>
