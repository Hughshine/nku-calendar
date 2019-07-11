<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\StudentEventSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Student Events';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="student-event-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Student Event', ['create'], ['class' => 'btn btn-success']) ?>
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
            'ev_userid',
            'ev_place',
            //'ev_superevent_id',
            //'ev_description',
            //'ev_color',
            //'ev_status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
