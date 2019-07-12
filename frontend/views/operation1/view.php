<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Operation1 */

$this->title = $model->op1_id;
$this->params['breadcrumbs'][] = ['label' => 'Operation1s', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="operation1-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->op1_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->op1_id], [
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
            'user_id',
            'op1_time',
            'op1_status',
            'op1_id',
        ],
    ]) ?>

</div>
