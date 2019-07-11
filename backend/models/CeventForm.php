<?php
namespace backend\models;

use yii\base\Model;

class CeventForm extends Model
{
    public $ev_id;
    public $ev_title;
    public $ev_content;
    public $ev_label_img;
    public $ev_adminid;
    public $ev_place;
    public $ev_maxnumber;
    public $cev_tid;
    public $ev_summary;
    public $ev_start_time;
    public $ev_end_time;
    public $ev_signup_endtime;


    public $_lastError="";


    public function rules()
    {
        return[
            [['ev_id','ev_title','ev_content','ev_place'],'required'],
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
            'ev_maxnumber'=>'最大人数',
            'cev_tid'=>'负责老师',
            'ev_summary'=>'活动摘要',
            'ev_start_time'=>'活动开始时间',
            'ev_end_time'=>'活动结束时间',
            'ev_signup_endtime'=>'报名结束时间'

        ];

    }
}
