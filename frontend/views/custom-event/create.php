<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\CustomEvent */

$this->title = 'Create Custom Event';
$this->params['breadcrumbs'][] = ['label' => 'Custom Events', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="custom-event-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
