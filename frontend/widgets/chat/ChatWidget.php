<?php
namespace frontend\widgets\chat;
/**
 * 留言板组件
 */
use frontend\models\FeedsForm;
use Yii;
use yii\bootstrap\Widget;
 
class ChatWidget extends Widget
{
    public function run()
    {
        $feed=new FeedsForm();
        $data['feed']=$feed->getList();
 
        return $this->render('index',['data'=>$data]);
    }
}
