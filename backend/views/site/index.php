<?php

/* @var $this yii\web\View */
use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\Modal;
use yii\web\JsExpression;
use backend\widgets\CustomEventsWidget;

$this->title = '日程';
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


        //        $JSDropEvent = <<<EOF
        //function(date) {
        //    alert("Dropped on " + date.format());
        //    if ($('#drop-remove').is(':checked')) {
        //        // if so, remove the element from the "Draggable Events" list
        //        $(this).remove();
        //    }
        //
        //    //由 CustomEvent => StudentEvent
        //}
        //EOF;

        $JSEventClick = <<<EOF
function(calEvent, jsEvent, view) {
        console.log(calEvent.className[0]);
      console.log(calEvent);
      console.log(jsEvent);
      console.log(view);
//    alert('Event: ' + calEvent.title);
//    alert('Coordinates: ' + jsEvent.pageX + ',' + jsEvent.pageY);
//    alert('View: ' + view.name);

    // change the border color just for fun
//    $(this).css('border-color', 'red');
     
            $('#modal').modal('show')
            .find('#modalContent')
            .load('index.php?r=cevent/update&id='+calEvent.id);
}

EOF;


        ?>
<!--        <style>-->
<!--            .left {-->
<!--                float: left;-->
<!--                margin-top: 50px;-->
<!--                width: 150px;-->
<!--                position: fixed;-->
<!--                /*height: 300px;*/-->
<!--            }-->
<!--            .right {-->
<!--                margin-left: 210px;-->
<!--                /*max-height: 600px;*/-->
<!--            }-->
<!--        </style>-->
        <div>
<!--            --><?//= CustomEventsWidget::widget(); ?>
            <!--            <div class="left" id="external-events">-->
            <!--                <h4>日常任务</h4>-->
            <!--                <div class="fc-event ui-draggable ui-draggable-handle">My Event 1</div>-->
            <!--                <div class="fc-event ui-draggable ui-draggable-handle">My Event 2</div>-->
            <!--                <div class="fc-event ui-draggable ui-draggable-handle">My Event 3</div>-->
            <!--                <div class="fc-event ui-draggable ui-draggable-handle">My Event 4</div>-->
            <!--                <div class="fc-event ui-draggable ui-draggable-handle">My Event 5</div>-->
            <!--                <p>-->
            <!--                    <input type="checkbox" id="drop-remove">-->
            <!--                    <label for="drop-remove">remove after drop</label>-->
            <!--                </p>-->
            <!--            </div>-->

            <div>
                <?= yii2fullcalendar\yii2fullcalendar::widget(array(
                    'clientOptions' => [
                        'selectable' => true,
                        'selectHelper' => true,
                        'droppable' => true,
//                        'editable' => true,
//                        'drop' => new JsExpression($JSDropEvent),
//                        'eventDrop' => new JsExpression($JsEventDrop),
                        'firstDay' => 7,
//                        'dayClick'=> new JsExpression($dayClick),
//                    'select' => new JsExpression($JSCode),
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
