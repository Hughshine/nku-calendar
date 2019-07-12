<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Operation1 */

$this->title = 'Create Operation1';
$this->params['breadcrumbs'][] = ['label' => 'Operation1s', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="operation1-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
