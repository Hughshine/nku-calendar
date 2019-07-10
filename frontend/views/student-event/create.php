<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\StudentEvent */

$this->title = 'Create Student Event';
$this->params['breadcrumbs'][] = ['label' => 'Student Events', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="student-event-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
