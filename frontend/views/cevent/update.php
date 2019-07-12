<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Cevent */

$this->title = 'Update Cevent: ' . $model->ev_id;
$this->params['breadcrumbs'][] = ['label' => 'Cevents', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ev_id, 'url' => ['view', 'id' => $model->ev_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="cevent-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
