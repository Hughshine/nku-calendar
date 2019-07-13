<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Operation1 */

$this->title = 'Update Operation1: ' . $model->op1_id;
$this->params['breadcrumbs'][] = ['label' => 'Operation1s', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->op1_id, 'url' => ['view', 'id' => $model->op1_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="operation1-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
