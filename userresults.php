<?php 
    require 'db.php';
    $data=$_POST;
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
    <style>body{overflow: auto;}</style>
  </head>
  <body>

  <nav class="navbar navbar-expand-lg">
                  <a class="navbar-brand" href="index.html">
                    Work<b class="yel">Stock</b>
                  </a>

                  <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent4">
                    <ul id="nav4" class="navbar-nav ml-auto">
                      <li class="nav-item mr-20">
                        <a class="page-scroll" href="/lk.php">Личный кабинет</a>
                      </li>
                      <li class="nav-item mr-20">
                        <a class="page-scroll" href="/testcreation.php">Редактировать тест</a>
                      </li>
                    </ul>
                    
                  </div>
                </nav>

    <section class="pricing-section pricing-style-1 mb-80">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-xxl-5 col-xl-5 col-lg-7 col-md-10">
            <div class="section-title text-center mb-60">
              <h3 class="mb-15">Результаты</h3>
            </div>
          </div>
        </div>
        <div class="row justify-content-center">
          <?php 
          $rabs = R::find('ratings','company = ?', array($_SESSION['logged_user']->company));
            asort($rabs,$rabs->score);
          foreach ($rabs as $rab){
            $rab->name = R::findOne('users','id = ?',array($rab->user_id));
          echo '
          <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="single-pricing row">
              <div class="image col-lg-4">
                <img src="assets/img/sber.png" alt="">
              </div>
              <h4 class="col-lg-4 text-center">'.$rab->name->name.' '.$rab->name->surname.'</h4>
              <h4 class="col-lg-4">Счёт: '.$rab->score.'</h4>
              <a href="#0" class="button radius-30 col-lg-2">Связаться</a>
            </div>
          </div>';
          }
          ?>
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
