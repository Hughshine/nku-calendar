<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\CeventModel */

$this->title = 'Update Cevent Model: ' . $model->ev_id;
$this->params['breadcrumbs'][] = ['label' => 'Cevent Models', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ev_id, 'url' => ['view', 'id' => $model->ev_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="cevent-model-update">

    <?= $this->render('_form', [
        'model' => $model,'teacher'=>$teacher,
    ]) ?>

</div>
