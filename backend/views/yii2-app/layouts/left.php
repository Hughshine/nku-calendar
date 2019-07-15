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
                <p><?= \backend\models\Admin::returnDepartmentName()?></p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>


        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => [
                    ['label' => '南开大学百年校庆活动', 'options' => ['class' => 'header']],
                    ['label' => '学院日程', 'icon' => 'file-code-o', 'url' => ['site/index']],
                    ['label' => '发布活动', 'icon' => 'file-code-o', 'url' => ['cevent/create']],
                    ['label' => '查看活动列表', 'icon' => 'dashboard', 'url' => ['/cevent']],
                    ['label' => '管理留言', 'icon' => 'feeds', 'url' => ['/feeds']],
                    ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
                ],
            ]
        ) ?>

    </section>

</aside>
