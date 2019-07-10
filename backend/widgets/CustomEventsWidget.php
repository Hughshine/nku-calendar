<?php
/**
 * Created by PhpStorm.
 * User: lxy
 * Date: 2019/7/7
 * Time: 15:03
 */
namespace backend\widgets;

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
    public $limit=5;//限制数量
    public $option='';//组件类型
    public $event_id;

    public $message;

    public function init()
    {
        parent::init();
        if($this->message===null){
            $this->message= 'Welcome User';
        }else{
            $this->message= 'Welcome '.$this->message;
        }
    }

    public function run()
    {
        return Html::encode($this->message);
    }
}
