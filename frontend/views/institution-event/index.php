<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\InstitutionEventSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Institution Events';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="institution-event-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Institution Event', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

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
//            'ev_adminname',
            'ev_place',
            //'ev_number',
            //'cev_tid',
            //'ev_maxnumber',
            //'all_day',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
