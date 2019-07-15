<?php
use yii\helpers\Html;
use common\models\User;

/* @var $this \yii\web\View */
/* @var $content string */
?>


<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p><?= \frontend\models\User::returnDepartmentName()?></p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- search form -->
<!--        <form action="#" method="get" class="sidebar-form">-->
<!--            <div class="input-group">-->
<!--                <input type="text" name="q" class="form-control" placeholder="Search..."/>-->
<!--              <span class="input-group-btn">-->
<!--                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>-->
<!--                </button>-->
<!--              </span>-->
<!--            </div>-->
<!--        </form>-->
        <!-- /.search form -->
        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => [
                    ['label' => '南开大学百年校庆活动', 'options' => ['class' => 'header']],
                    ['label' => '个人活动日历', 'icon' => 'file-code-o', 'url' => ['site/main']],
                    ['label' => '院校活动总览', 'icon' => 'dashboard', 'url' => ['cevent/overall']],
                    ['label' => '祝福南开', 'icon' => 'dashboard', 'url' => 'http://localhost/nku-calendar/frontend/web/index.php?r=site/index#comment
'],
                    ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
                ],
            ]
        ) ?>

    </section>

</aside>
