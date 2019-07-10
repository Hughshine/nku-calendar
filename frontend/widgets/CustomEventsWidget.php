<?php
namespace frontend\widgets;

use Yii;
use common\models\CustomEvent;
use yii\base\Widget;
use yii\helpers\Html;


/**
 * Class CustomEventsWidget
 * 放用户定义的，可以随意拖动的活动
 * @package backend\widgets
 */
class CustomEventsWidget extends Widget
{
    public $title='default';//列表标题
    const LIMIT=5;//限制数量
    public $option='';//组件类型
    public $events = array();

    public $colors = array(0=>'#2ae0c8', 1=>'#cbf5fb', 2=>'#bdf3d4', 3=>'#e6e2c3',
        4=>'#e3c887', 5=>'#fad8be', 6=>'#fbb8ac', 7=>'#fe6673');

    public function init()
    {
        parent::init();
        $user = Yii::$app->user->identity;
        $userid = $user->id;
        if(!$userid)
            return;
        $this->events = CustomEvent::findAll(['ev_userid' => $userid]);
    }

    public function run()
    {
        $content = '<div class="left" id="external-events">  <h4>日常任务</h4>';
        $count = 0;
        foreach($this->events as $e) {
            $content .= '<div class=\'fc-event ui-draggable ui-draggable-handle\' style="background-color:'.$this->colors[$e->ev_color].';" eventid='.$e->ev_id.'>';
            $content .= $e->ev_name;
            $content .= '</div>';
            $count++;
            if($count>=CustomEventsWidget::LIMIT)
                break;
            //TODO:增加 "增加活动"与"删除活动"按钮
        }

        $content .= '<button id="new-custom-event">新的日常任务</button>';
        $content .= '<button id="new-student-event">新的事件</button>';
//        $content .= '<script>$("#new-custom-event").click(function () {
//            window.alert("111");
//    });</script>';
        $content .= '</div>';
        return $content;
    }
}
