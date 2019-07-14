<?php
namespace backend\widgets;

use common\models\CeventModel;
use frontend\models\Cevent;
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

    public $colors = array(0=>'#6465A5', 1=>'#0294A5', 2=>'#F3E96B', 3=>'#F28A30',
        4=>'#F05837', 5=>'#00743F', 6=>'#93A806', 7=>'#F46A4E');

    public function init()
    {
        parent::init();
        $user = Yii::$app->user->identity;
        $userid = $user->id;
        if(!$userid)
            return;
        $this->events = Cevent::findAll(['ev_adminid' => $userid]);
    }

}
