<?php
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <!-- mobile responsive meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- ** Plugins Needed for the Project ** -->
    <!-- Bootstrap -->


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


<!-- blog single -->
<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <img src="images/post-single.jpg" width= "600" alt="post-thumb" class="w-100 img-fluid mb-4">
                <div class="content">
                    <h4 class="mb-4"><?php echo $model->ev_title;?></h4>
                    <a href="<?php echo yii\helpers\Url::to(['cevent/choose', 'ceid' => $model->ev_id]) ?>" class="le-button">参加活动</a>
                    <a href="<?php echo yii\helpers\Url::to(['cevent/cancel', 'ceid' => $model->ev_id]) ?>" class="le-button">取消参加</a>
                    <h6><?php echo"FROM:". $model->ev_start_time;?></h6>
                    <h6><?php echo"TO:". $model->ev_end_time;?></h6>
                    <h6><?php echo"AT:". $model->ev_place;?></h6>
                    <br>
                    <p><?php echo $model->ev_content;?></p>
                    <br>
                    <div class="comment-form">

                        <?php $form = ActiveForm::begin(); ?>

                        <?= $form->field($cmt, 'com_content')->textInput(['maxlength' => true]) ?>

                        <div class="form-group">
                            <?= Html::submitButton('提交', ['class' => 'btn btn-primary']) ?>
                        </div>

                        <?php ActiveForm::end(); ?>

                    </div>
                </div>



            </div>
            <div class="col-lg-4">
                <div class="widget">
                    <h6 class="mb-4">LATEST COMMENT</h6>
                    <?php
                    $time = 0;
                    foreach ($comments as $comment):
                        $time = $time + 1;
                        if($time >= 4) break; ?>
                    <div class="media mb-4">
                        <div class="post-thumb-sm mr-3">
                            <img class="img-fluid" src="images/masonary-post/post-1.jpg" alt="post-thumb">
                        </div>
                        <div class="media-body">
                            <ul class="list-inline d-flex justify-content-between mb-2">
                                <li class="list-inline-item">Post By
                                    <?php $user = \common\models\User::find()->where('id =:id',[':id' => $comment->com_userid ])->one();
                                    echo $user->username;?></li>
                                <li class="list-inline-item"><?php echo $comment->com_time;?></li>
                            </ul>
                            <h4><?php echo $comment->com_content;?></h4>
                        </div>
                    </div>
                    <?php endforeach;?>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /blog single -->

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