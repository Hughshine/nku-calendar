<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\CeventModel */

$this->title = '更新活动: ' . $model->ev_title;
$this->params['breadcrumbs'][] = ['label' => '活动列表', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ev_title, 'url' => ['view', 'id' => $model->ev_id]];
$this->params['breadcrumbs'][] = '更新';
?>
<div class="cevent-model-update">

    <?= $this->render('_form', [
        'model' => $model,'teacher'=>$teacher,
    ]) ?>

</div>
