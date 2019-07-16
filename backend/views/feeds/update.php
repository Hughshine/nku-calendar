<?php

/**
 *
 * Team:
 * Coding by: liruifeng
 * Time:
 * function: 首页留言的后台展示，对应update
 *
 */
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Feeds */

$this->title = Yii::t('app', 'Update Feeds: {name}', [
    'name' => $model->id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Feeds'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="feeds-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
