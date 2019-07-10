<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\Modal;
use yii\web\JsExpression;
use frontend\widgets\CustomEventsWidget;

/* @var $this yii\web\View */
$this->title = '我的日程';
/*
TODO: 剩余的三个功能：
TODO: 1. 点击日程里的活动，进行update  2. 拖拽custom-event，添加student-event
TODO: 3. 点击日历直接触发活动创建modal 4. calendar内的拖拽应有效
 */


$DragJS = <<<EOF
/* initialize the external events
-----------------------------------------------------------------*/

$('#external-events .fc-event').each(function() {
    // store data so the calendar knows to render an event upon drop
    $(this).data('event', {
        id : $(this).attr("eventid"),
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
    
    //由 CustomEvent => StudentEvent
}
EOF;

        $JSEventClick = <<<EOF
function(calEvent, jsEvent, view) {
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
    .load('index.php?r=student-event/update&id='+calEvent.id);

}

EOF;
        $dayClick = <<<EOF
function(date, allDay, jsEvent, view) { //TODO: how to know allday event
//        var year = date.toDate().getFullYear();
//        var month = date.getMonth();
//        var day = date.getDay();
//        var ALLDAY = allDay;
//        console.log(allDay);
//        console.log(jsEvent);
//        console.log(view);
        var hour = (date.toDate().getHours()+16)%24;
        var minute = date.toDate().getMinutes();
        
        var date = $(this).attr('data-date');

        $('#modal').modal('show')
            .find('#modalContent')
            .load('index.php?r=student-event/create&date='+date+'&hour='+hour+'&minute='+minute+'&allday=false');
            
            //'+year+'-'+month+'-'+day
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
                        'firstDay' => 7,
                        'dayClick'=> new JsExpression($dayClick),
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


