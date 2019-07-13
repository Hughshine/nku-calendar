<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Cevent */

$this->title = $model->ev_id;
$this->params['breadcrumbs'][] = ['label' => 'Cevents', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cevent-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->ev_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->ev_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'ev_id',
            'ev_time',
            'ev_name',
            'ev_adminid',
            'ev_place',
            'ev_number',
            'cev_tid',
        ],
    ]) ?>

</div>
