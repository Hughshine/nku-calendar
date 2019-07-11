<?php
namespace backend\models;

use yii\base\Model;
use common\models\base\BaseModel;
class CeventForm extends BaseModel
{
    public $ev_id;
    public $ev_title;
    public $ev_content;
    public $ev_label_img;
    public $ev_adminid;
    public $ev_place;
    public $ev_maxnumber;


    public $_lastError="";


    public function rules()
    {
        return[
            [['ev_id','ev_title','ev_content'],'required'],
            [['ev_id','ev_adminid','ev_maxnumber'],'integer'],
            ['title','string','min'=>4,'max'=>50],
        ];
    }

    public function attributeLabels()
    {
        return [
            'ev_id'=>'活动编码',
            'ev_title'=>'活动名称',
            'ev_content'=>'活动内容',
            'ev_label_img'=>'活动标签图',
            'ev_adminid'=>'发布者',
            'ev_place'=>'活动地点',
            'ev_maxnumber'=>'最大人数'

        ];

    }
}
