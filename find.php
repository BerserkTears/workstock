<?php
require 'db.php';
$data = $_POST;
$tests = R::findAll('tests');
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
    .formreg{
        border-radius: 71px;
    background: #f1f1f1 !important;
    box-shadow:  44px 44px 74px #c6c6c6,
                -44px -44px 74px #ffffff;
    }
    #contact{
        background: none;
    }
    </style>
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
                    </ul>
                    
                  </div>
                </nav>
    <!--<section id="contact" class="contact-section contact-style-1">
        <div class="container">
          <div class="row">
            <div class="col-lg-12 pt-50 pl-50 pr-50 pb-50 formreg">
  
              <div class="row">
                <div class="col-xxl-12 col-xl-12 col-lg-10">
                  <div class="section-title mb-40">
                    <h3 class="mb-15">Выбирете тест</h3>
                  </div>
                </div>
              </div>
  
              <div class="contact-form-wrapper">
                <form action="assets/php/contact.php" method="POST">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="single-input">
                        <input type="text" id="name" name="name" class="form-input" placeholder="Введите должность">
                      </div>
                    </div>
                    
                    
                  </div>
                  <div class="form-button">
                    <button type="submit" class="button radius-30">Найти</button>
                  </div>
                </form>
              </div>
  
            </div>
          </div>
        </div>
      </section>-->


      <section class="pricing-section pricing-style-1 mb-80">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-xxl-5 col-xl-5 col-lg-7 col-md-10">
              <div class="section-title text-center mb-60">
                <h3 class="mb-15">Все компании</h3>
              </div>
            </div>
          </div>
          <?php 
          foreach ($tests as $te){
            echo '<form action="test.php" method="POST">';
            $te->sur = R::findone('users','inn = ?', array($te->name));
            echo "<input type='hidden' name = 'te' value = '".$te->name."'>";
            echo '
        
          <div class="row justify-content-center">
            <div class="col-lg-12 col-md-12 col-sm-12">
              <div class="single-pricing row">
                <div class="image col-lg-4">
                  <img src="assets/img/sber.png" alt="">
                </div>
                <h4 class="col-lg-8 text-center">'.$te->sur->company.'</h4>
                <button type="submit" name = "tet" class="button radius-30 col-lg-2">Пройти тест</button>
                <h4 class="col-lg-8 text-center">Вопросов: '.$te->kol.'</h4>
              </div>
            </div>
          </div></form>';
          }
          ?>
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
