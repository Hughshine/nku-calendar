<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\CustomEventSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Custom Events';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="custom-event-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Custom Event', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ev_id',
            'ev_name',
            'ev_userid',
            'ev_color',
            'ev_description',
            //'ev_place',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
