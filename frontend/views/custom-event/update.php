<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\CustomEvent */

$this->title = 'Update Custom Event: ' . $model->ev_id;
$this->params['breadcrumbs'][] = ['label' => 'Custom Events', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ev_id, 'url' => ['view', 'id' => $model->ev_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="custom-event-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
