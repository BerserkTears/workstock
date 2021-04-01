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
    <style>
      .section-title{
        background: none;
      }
    </style>
  </head>
  <body>
    <section id="contact" class="contact-section contact-style-1">
        <div class="container">
          <div class="row">
            <div class="col-lg-8 pt-50 pl-50 pr-50 pb-50 formreg">
  
              <div class="row">
                <div class="col-xxl-7 col-xl-8 col-lg-10">
                  <div class="section-title mb-40">
                    <h3 class="mb-15">Регистрация</h3>
                  </div>
                </div>
              </div>
  
              <div class="contact-form-wrapper">
                <form action="/userregister.php" method="POST">
                  <div class="row">
                    <div class="col-md-7">
                      <div class="single-input">
                        <label for="name">Имя</label>
                        <input type="text" id="name" name="name" class="form-input" placeholder="Введите ваше имя">
                      </div>
                    </div>
                    <div class="col-md-7">
                      <div class="single-input">
                        <label for="surname">Фамилия</label>
                        <input type="text" id="surname" name="surname" class="form-input" placeholder="Введите вашу фамилию">
                      </div>
                    </div>
                    <div class="col-md-7">
                      <div class="single-input">
                        <label for="login">Логин</label>
                        <input type="email" id="login" name="login" class="form-input" placeholder="Введите ваш логин">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="single-input">
                        <label for="password">Пароль</label>
                        <input type="password" id="password" name="password" class="form-input" placeholder="Введите ваш пароль">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="single-input">
                        <label for="password1">Подтвердите пароль</label>
                        <input type="password" id="password1" name="password1" class="form-input" placeholder="Введите пароль ещё раз">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-button">
                        <button type="submit" class="button radius-30" name='do_reg'>Зарегистрироваться</button>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
  
            </div>
          </div>
        </div>
  
        <div class="contact-image">
          <img src="assets/img/reg2.png" alt="">
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
