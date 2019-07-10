<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\StudentEvent */

$this->title = '创建新的事件';
$this->params['breadcrumbs'][] = ['label' => '学生事件', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="student-event-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
