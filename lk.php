<?php 
require "db.php";
$data=$_POST;
//if ($_SESSION['logged_user']->company == "none"){
//    echo $_SESSION['logged_user']->name , ", privet!";
//} else {
//    echo $_SESSION['logged_user']->company , ", zdravstvu'te!";
//}
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
  </head>
  <body>
    <header class="header header-4">
        <div class="navbar-area">
          <div class="container">
            <div class="row align-items-center">
              <div class="col-lg-12">
                <nav class="navbar navbar-expand-lg">
                  <a class="navbar-brand" href="index.html">
                    Work<b class="yel">Stock</b>
                  </a>
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent4" aria-controls="navbarSupportedContent4" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="toggler-icon"></span>
                    <span class="toggler-icon"></span>
                    <span class="toggler-icon"></span>
                  </button>

                  <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent4">
                    <ul id="nav4" class="navbar-nav ml-auto">
                      <li class="nav-item">
                        <a class="page-scroll" href="/logout.php">Выход</a>
                      </li>
                      
                    </ul>
                    
                  </div>
                </nav>
              </div>
            </div>
          </div>
        </div>
      </header>
    <section id="about" class="about-section about-style-2 mb-80 pt-20">
        
        <div class="container">
          <div class="row">
            <div class="col-lg-12 col-xl-12 text-center pb-50">
                <h3>Личный кабинет</h3>
            </div>
            <div class="col-xl-7 col-lg-7">
              <div class="about-content-wrapper">
                <div class="section-title mb-40 pt-50 pl-50 pr-50 pb-50">
                  <h4>Здравствуйте,</h4>
                  <h2 class="mb-25">
                    <?php 
                      if ($_SESSION['logged_user']->company == "none"){
                            echo $_SESSION['logged_user']->name;
                        } else {
                            echo $_SESSION['logged_user']->company;
                        }
                    ?>
                  </h2>
                </div>
                <div class="section-title mb-40 pt-50 pl-50 pr-50 pb-50">
                    <h4 class=" mb-20">Информация о Вас,</h4>
                    <?php 
                      $rabs = R::find('ratings','user_id = ?', array($_SESSION['logged_user']->id));
                        asort($rabs,$rabs->score);
                      foreach ($rabs as $rab){
                        $rab->name = R::findOne('users','inn = ?',array($rab->company));
                      echo '
                          <h4 ">Тест компании '.$rab->name->company.' </h4>
                          <h4 >Счёт: '.$rab->score.'</h4>';
                      }
                      ?>
                </div>
              </div>
            </div>
            
            <div class="col-xl-5 col-lg-5">
              <div class="about-image-wrapper">
                <div class="row">
                  
                  <div class="col-md-12 ">
                    <div class="right-wrapper">
                      <img src="assets/img/lk.png" alt="">
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-12">
              <?php if ($_SESSION['logged_user']->company == "none"): ?>
                <a href="/find.php" class="button button-lg radius-30 ml-20">Подать заявку</a>
              <?php else:?>
                <a href="/testcreation.php" class="button button-lg radius-30 ml-20">Редактировать тест</a>
                <a href="/userresults.php" class="button button-lg radius-30 ml-20">Результаты заявок</a>
              <?php endif; ?>
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
