<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CeventSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Cevents';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cevent-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ev_id',
            'ev_time',
            'ev_name',
            'ev_adminid',
            'ev_place',
            // 'ev_number',
            // 'cev_tid',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
