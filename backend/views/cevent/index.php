<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\CeventSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '活动列表';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cevent-model-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('发布活动', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ev_id',

            'ev_title',
            'ev_summary',
            //'ev_adminid',
            'ev_start_time',
            'ev_end_time',
             'ev_number',
            'ev_maxnumber',
            'ev_place',

            // 'cev_tid',
            // 'ev_content',
            // 'ev_label_img',
            // 'ev_created_at',
            // 'ev_updated_at',
            // 'ev_signup_endtime',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
