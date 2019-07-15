<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\StudentEvent */

$this->title = '事件详细信息：' . $model->ev_name;
$this->params['breadcrumbs'][] = ['label' => 'Student Events', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ev_id, 'url' => ['view', 'id' => $model->ev_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="student-event-update">

    <h4><?= Html::encode($this->title) ?></h4>

    <?= $this->render('_form_update', [
        'model' => $model,
    ]) ?>

</div>
