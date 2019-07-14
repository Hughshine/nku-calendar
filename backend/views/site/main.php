<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\Modal;
use yii\web\JsExpression;
use backend\widgets\CustomEventsWidget;

/* @var $this yii\web\View */


$DragJS = <<<EOF
/* initialize the external events
-----------------------------------------------------------------*/

$('#external-events .fc-event').each(function() {
    // store data so the calendar knows to render an event upon drop
    $(this).data('event', {
        id : $(this).attr("eventid"),
        class: 'stu-event',
        allday: 1,
        title: $.trim($(this).text()), // use the element's text as the event title
        stick: true // maintain when user navigates (see docs on the renderEvent method)
    });
    // make the event draggable using jQuery UI
        $(this).draggable({
            zIndex: 999,
            revert: true,      // will cause the event to go back to its
            revertDuration: 0  //  original position after the drag
        });
});

EOF;

$this->registerJs($DragJS);

?>
<script src="https://code.jquery.com/jquery-1.11.3.js"></script>
<?=$this->registerJsFile("./main.js"); ?>
<div class="site-index">
    <div class="body-content">
        <?php
        Modal::begin([
            'header' => 'NKU 100days',
            'id' => 'modal',
            'size' => 'modal-lg',
        ]);
        echo '<div id='.'"modalContent"'.'></div>';
        Modal::end();
        ?>
        <?php
                $JSEventClick = <<<EOF
function(calEvent, jsEvent, view) {
        console.log(calEvent.className[0]);
      console.log(calEvent);
      console.log(jsEvent);
      console.log(view);
            $('#modal').modal('show')
            .find('#modalContent')
            .load('index.php?r=cevent/view&id='+calEvent.id);
               

}

EOF;



        ?>
        <style>
            .left {
                float: left;
                margin-top: 50px;
                width: 150px;
                position: fixed;
                /*height: 300px;*/
            }
            .right {
                margin-left: 210px;
                /*max-height: 600px;*/
            }
        </style>
        <div>
            <?= CustomEventsWidget::widget(); ?>
            <div class="">
                <?= yii2fullcalendar\yii2fullcalendar::widget(array(
                    'clientOptions' => [
                        'selectable' => true,
                        'selectHelper' => true,
                        'droppable' => true,
//                        'editable' => true,
                        'firstDay' => 7,
                        'eventClick' => new JsExpression($JSEventClick),
                        'defaultDate' => date('Y-m-d')
                    ],
                    'ajaxEvents' => Url::toRoute(['/cevent/json-calendar'])
                ));
                ?>
            </div>

        </div>
    </div>
</div>

<footer class="footer text-center">
    <div class="container">
        <p class="text-muted small mb-0">Copyright &copy; Your Website 2019</p>
    </div>
</footer>
<a class="scroll-to-top rounded js-scroll-trigger" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>


<!-- <script src="vendor/jquery/"></script> -->
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="js/stylish-portfolio.min.js"></script>
<?php //$this->endBody() ?>


