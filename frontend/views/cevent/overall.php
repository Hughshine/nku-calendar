<!DOCTYPE html>
<html lang="zxx">

<head>

    <!-- slick slider -->
    <link rel="stylesheet" href="plugins/slick/slick.css">
    <!-- themefy-icon -->
    <link rel="stylesheet" href="plugins/themify-icons/themify-icons.css">

    <!-- Main Stylesheet -->
    <link href="css/style.css" rel="stylesheet">

    <!--Favicon-->
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">

</head>

<body>
<!-- preloader -->
<div class="preloader">
    <div class="loader">
        <span class="dot"></span>
        <div class="dots">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
</div>
<!-- /preloader -->

<!-- blog post -->
<section class="section">
    <div class="container">
        <div class="row masonry-container">
            <?php foreach ($cevents as $cevent):?>
            <div class="col-lg-4 col-sm-6 mb-5">
                <article class="text-center">
                    <img class="img-fluid mb-4" src="images/masonary-post/post-2.jpg" alt="post-thumb">
                    <h6 class="text-uppercase mb-2">已选：<?php echo $cevent->ev_number." ";?>上限：<?php echo $cevent->ev_maxnumber;?></h6>
                    <h4 class="title-border"><a class="text-dark"
                        href="<?php echo yii\helpers\Url::to(['cevent/detail', 'id' => $cevent->ev_id]); ?>">
                            <?php echo $cevent->ev_title;?></a></h4>
                    <h6><?php echo"FROM:". $cevent->ev_start_time;?></h6>
                    <h6><?php echo"TO:". $cevent->ev_end_time;?></h6>
                    <h6><?php echo"AT:". $cevent->ev_place;?></h6>
                </article>
            </div>
            <?php endforeach;?>
        </div>
        <div class="pagination pull-right">
            <?php echo yii\widgets\LinkPager::widget([
                'pagination' => $pager,
                'prevPageLabel' => '&laquo; Previous',
                'nextPageLabel' => 'Next &raquo;',
            ]); ?>
        </div>
    </div>
</section>
<!-- /blog post -->

<!-- instagram -->
<section>
    <div class="container-fluid px-0">
        <div class="row no-gutters instagram-slider" id="instafeed" data-userId="4044026246"
             data-accessToken="4044026246.1677ed0.8896752506ed4402a0519d23b8f50a17"></div>
    </div>
</section>
<!-- /instagram -->


<!-- jQuery -->
<script src="plugins/jQuery/jquery.min.js"></script>
<!-- Bootstrap JS -->
<script src="plugins/bootstrap/bootstrap.min.js"></script>
<!-- slick slider -->
<script src="plugins/slick/slick.min.js"></script>
<!-- masonry -->
<script src="plugins/masonry/masonry.js"></script>
<!-- instafeed -->
<script src="plugins/instafeed/instafeed.min.js"></script>
<!-- smooth scroll -->
<script src="plugins/smooth-scroll/smooth-scroll.js"></script>
<!-- headroom -->
<script src="plugins/headroom/headroom.js"></script>
<!-- reading time -->
<script src="plugins/reading-time/readingTime.min.js"></script>

<!-- Main Script -->
<script src="js/script.js"></script>

</body>
</html>