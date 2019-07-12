<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\Operation1Search */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Operation1s';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="operation1-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Operation1', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ev_id',
            'user_id',
            'op1_time',
            'op1_status',
            'op1_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
