<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\Modal;
use yii\web\JsExpression;
use frontend\widgets\CustomEventsWidget;

/* @var $this yii\web\View */
$this->title = '我的日程';



$DragJS = <<<EOF
/* initialize the external events
-----------------------------------------------------------------*/

$('#external-events .fc-event').each(function() {
    // store data so the calendar knows to render an event upon drop
    $(this).data('event', {
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
            'header' => '<h4>Branch</h4>',
            'id' => 'modal',
            'size' => 'modal-lg',
        ]);
        echo '<div id='.'"modalContent"'.'></div>';
        Modal::end();
        ?>
        <?php
        //        $JSCode = <<<EOF
        //function(start, end) {
        //    var title = prompt('Event Title:');
        //    var eventData;
        //    if (title) {
        //        eventData = {
        //            title: title,
        //            start: start,
        //            end: end
        //        };
        //        $('#w0').fullCalendar('renderEvent', eventData, true);
        //    }
        //    $('#w0').fullCalendar('unselect');
        //}
        //EOF;

        $JSDropEvent = <<<EOF
function(date) {
    alert("Dropped on " + date.format());
    if ($('#drop-remove').is(':checked')) {
        // if so, remove the element from the "Draggable Events" list
        $(this).remove();
    }
}
EOF;

        $JSEventClick = <<<EOF
function(calEvent, jsEvent, view) {

    alert('Event: ' + calEvent.title);
    alert('Coordinates: ' + jsEvent.pageX + ',' + jsEvent.pageY);
    alert('View: ' + view.name);

    // change the border color just for fun
    $(this).css('border-color', 'red');

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

            <div class="right">
                <?= yii2fullcalendar\yii2fullcalendar::widget(array(
                    'clientOptions' => [
                        'selectable' => true,
                        'selectHelper' => true,
                        'droppable' => true,
                        'editable' => true,
                        'drop' => new JsExpression($JSDropEvent),
//                    'select' => new JsExpression($JSCode),
                        'eventClick' => new JsExpression($JSEventClick),
                        'defaultDate' => date('Y-m-d')
                    ],
                    'ajaxEvents' => Url::toRoute(['/student-event/json-calendar'])
                ));
                ?>
            </div>

        </div>
    </div>
</div>

<footer class="footer text-center">
                <div class="container">
                    <ul class="list-inline mb-5">
                        <li class="list-inline-item">
                            <a class="social-link rounded-circle text-white mr-3" href="#">
                                <i class="icon-social-facebook"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a class="social-link rounded-circle text-white mr-3" href="#">
                                <i class="icon-social-twitter"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a class="social-link rounded-circle text-white" href="#">
                                <i class="icon-social-github"></i>
                            </a>
                        </li>
                    </ul>
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


