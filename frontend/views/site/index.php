<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;
use frontend\widgets\chat\ChatWidget;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!doctype html>
<html lang="zh">
<head>
<!-- <link rel="stylesheet" type="text/css" href="css/default.css"> -->
<script src="vendor/jquery/jquery.min.js"></script>
<!-- <script src="js/jquery.min.js"></script> -->
<script src="js/jquery.knob.js"></script>
<script src="js/jquery.throttle.js"></script>
<script src="js/jquery.classycountdown.js"></script>
<script>
var theme_list_open = false;  
$(document).ready(function(){
  $("#100banner").hide(0);
  $("#100banner").show(1000);
  $("#title_1").hide(0);
  $("#title_1").show(2000);
  $("#button_1").hide(0);
  $("#button_1").show(10);
});
</script>
<link rel="stylesheet" type="text/css" href="css/jquery.classycountdown.css" />

<style>
  .ClassyCountdownDemo { margin:0 auto 30px auto; max-width:800px; width:calc(100%); padding:30px; display:block }
</style>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Stylish Portfolio - Start Bootstrap Template</title>

  <!-- Bootstrap Core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="css/jquery.classycountdown.css"  rel="stylesheet" type="text/css"/>
  <!-- Custom Fonts -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
  <link href="vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet">

  <!-- Custom CSS -->
  <link href="css/stylish-portfolio.min.css" rel="stylesheet">
</head>
<body id="page-top">

   <a class="menu-toggle rounded" href="#">
    <i class="fas fa-bars"></i>
  </a>
  <nav id="sidebar-wrapper">
    <ul class="sidebar-nav">
      <li class="sidebar-brand">
        <a class="js-scroll-trigger" href="#page-top">百年南开·再铸辉煌</a>
      </li>
      <li class="sidebar-nav-item">
        <a class="js-scroll-trigger" href="#page-top">回到顶层</a>
      </li>
      <li class="sidebar-nav-item">
        <a class="js-scroll-trigger" href="#count">倒计时</a>
      </li>
      <li class="sidebar-nav-item">
        <a class="js-scroll-trigger" href="#comment">评论留言</a>
      </li>
      <li class="sidebar-nav-item">
        <a class="js-scroll-trigger" href="#services">提供服务</a>
      </li>
      <li class="sidebar-nav-item">
        <a class="js-scroll-trigger" href="#team">关于团队</a>
      </li>
    </ul>
      
  </nav>

  <!-- Header -->
  <header class="masthead d-flex">
    <div class="container text-center my-auto">
      <h1 class="mb-1"><img id="100banner" src="img/100banner1.png" alt=""></h1>
      <br>
      <h3 id="title_1" class="mb-5">
        南开大学百年校庆主题活动管理服务
      </h3>
      <a class="btn btn-primary btn-xl js-scroll-trigger"  id="button_1" href="#count" style="background-color:#801dae">继续了解！</a>
    </div>
    <div class="overlay"></div>
  </header>

  <!-- About -->
  


  <!-- Services -->
  <section  id="count">
    <br>
    <br>
    <center>
      <h1 id="title_2" class="mb-5">
        南开大学百年校庆倒计时
        </h1>
        <img id="100logo" src="img/nk100logowhite.png" alt="" style="width:150px">
     </center>

  <div id="countdown18" class="ClassyCountdownDemo"></div>
  <script type="text/javascript">
  $(document).ready(function() {
    var endTime = new Date("2019/10/17 00:00:00"); // 最终时间
      var nowTime = new Date();
      var second = parseInt((endTime.getTime() - nowTime.getTime()) / 1000);
    $('#countdown18').ClassyCountdown({
      theme: "flat-colors-black",
      end:$.now()+second
    });
  });
  </script>
  </section>

  <section class="content-section bg-primary text-white text-center" id="services">
    <div class="container">
      <div class="content-section-heading">
        <h3 class="text-secondary mb-0">服务</h3>
        <h2 class="mb-5">我们可以提供</h2>
      </div>
      <div class="row">
        <div class="col-lg-3 col-md-6 mb-5 mb-lg-0">
          <span class="service-icon rounded-circle mx-auto mb-3">
            <i class="icon-screen-smartphone"></i>
          </span>
          <h4>
            <strong>获取并设置活动提醒</strong>
          </h4>
          <p class="text-faded mb-0">Looks great on any screen size!</p>
        </div>
        <div class="col-lg-3 col-md-6 mb-5 mb-lg-0">
          <span class="service-icon rounded-circle mx-auto mb-3">
            <i class="icon-pencil"></i>
          </span>
          <h4>
            <strong>自定义自己的日程安排</strong>
          </h4>
          <p class="text-faded mb-0">Freshly redesigned for Bootstrap 4.</p>
        </div>
        <div class="col-lg-3 col-md-6 mb-5 mb-md-0">
          <span class="service-icon rounded-circle mx-auto mb-3">
            <i class="icon-like"></i>
          </span>
          <h4>
            <strong>为您参加的活动打分</strong>
          </h4>
          <p class="text-faded mb-0">Millions of users
            <i class="fas fa-heart"></i>
            Start Bootstrap!</p>
        </div>
        <div class="col-lg-3 col-md-6">
          <span class="service-icon rounded-circle mx-auto mb-3">
            <i class="icon-mustache"></i>
          </span>
          <h4>
            <strong>为母校献上自己的祝福</strong>
          </h4>
          <p class="text-faded mb-0">I mustache you a question...</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Callout -->
  <section class="callout">
    <div class="container text-center">
      <h2 class="mx-auto mb-5">Welcome to
        <em>your</em>
        next website!</h2>
      <a class="btn btn-primary btn-xl" href="https://startbootstrap.com/template-overviews/stylish-portfolio/">Download Now!</a>
    </div>
  </section>

  <!--team-->
  <section class="content-section" id="team">
    <div class="container">
      <div class="content-section-heading text-center">
        <h3 class="text-secondary mb-0">剪影</h3>
        <h2 class="mb-5">关于团队</h2>
      </div>
      <div class="row no-gutters">
        <div class="col-lg-6">
          <a class="portfolio-item" href="#">
            <span class="caption">
              <span class="caption-content">
                <h2>Stationary</h2>
                <p class="mb-0">A yellow pencil with envelopes on a clean, blue backdrop!</p>
              </span>
            </span>
            <img class="img-fluid" src="img/portfolio-1.jpg" alt="">
          </a>
        </div>
        <div class="col-lg-6">
          <a class="portfolio-item" href="#">
            <span class="caption">
              <span class="caption-content">
                <h2>Ice Cream</h2>
                <p class="mb-0">A dark blue background with a colored pencil, a clip, and a tiny ice cream cone!</p>
              </span>
            </span>
            <img class="img-fluid" src="img/portfolio-2.jpg" alt="">
          </a>
        </div>
        <div class="col-lg-6">
          <a class="portfolio-item" href="#">
            <span class="caption">
              <span class="caption-content">
                <h2>Strawberries</h2>
                <p class="mb-0">Strawberries are such a tasty snack, especially with a little sugar on top!</p>
              </span>
            </span>
            <img class="img-fluid" src="img/portfolio-3.jpg" alt="">
          </a>
        </div>
        <div class="col-lg-6">
          <a class="portfolio-item" href="#">
            <span class="caption">
              <span class="caption-content">
                <h2>Workspace</h2>
                <p class="mb-0">A yellow workspace with some scissors, pencils, and other objects.</p>
              </span>
            </span>
            <img class="img-fluid" src="img/portfolio-4.jpg" alt="">
          </a>
        </div>
      </div>
    </div>
  </section>


<footer class="footer text-center">
    <div class="container">
      <ul class="list-inline mb-5">
        <li class="list-inline-item">
          <a class="social-link rounded-circle text-white mr-3" href="#">
            <i class="icon-social-facebook"></i>
          </a>
        </li>
        <li class="list-inline-item">
          <a class="social-link rounded-circle text-white mr-3" href="#">
            <i class="icon-social-twitter"></i>
          </a>
        </li>
        <li class="list-inline-item">
          <a class="social-link rounded-circle text-white" href="#">
            <i class="icon-social-github"></i>
          </a>
        </li>
      </ul>
      <p class="text-muted small mb-0">Copyright &copy; Your Website 2019</p>
    </div>
  </footer>
  <a class="scroll-to-top rounded js-scroll-trigger" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>


  <!-- <script src="vendor/jquery/"></script> -->
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="js/stylish-portfolio.min.js"></script>

</body>
</html>