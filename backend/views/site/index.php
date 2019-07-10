<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">
    <?php
    use backend\widgets\CustomEventsWidget;
    ?>
    <?= CustomEventsWidget::widget(['message' => ' Yii2.0']) ?>
</div>
