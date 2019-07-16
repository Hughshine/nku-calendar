<?php
/**
 *
 * Team:
 * Coding by: liruifeng
 * Time:
 * function: 首页留言的管理，对应create方法
 *
 */
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Feeds */

$this->title = Yii::t('app', 'Create Feeds');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Feeds'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="feeds-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
