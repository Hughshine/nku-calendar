<?php

namespace common\models;

use Yii;
use common\models\base\BaseModel;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use yii\behaviors\BlameableBehavior;

/**
 * This is the model class for table "cevent".
 *
 * @property integer $ev_id
 * @property string $ev_start_time
 * @property string $ev_title
 * @property integer $ev_adminid
 * @property string $ev_place
 * @property integer $ev_number
 * @property integer $cev_tid
 * @property integer $ev_maxnumber
 * @property string $ev_summary
 * @property string $ev_content
 * @property string $ev_label_img
 * @property string $ev_end_time
 * @property integer $ev_created_at
 * @property integer $ev_updated_at
 * @property string $ev_signup_endtime
 */
class CeventModel extends BaseModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cevent';
    }

    public function behaviors()
    {
        return [[
            'class' => TimestampBehavior::className(),
            'createdAtAttribute' => 'ev_created_at',
            'updatedAtAttribute' => 'ev_updated_at',
            'value' => new Expression('NOW()'),
                ],
            [
                'class' => BlameableBehavior::className(),
                'createdByAttribute' => 'ev_adminid',
                'updatedByAttribute' => 'ev_adminid',
            ],

        ];

    }

    public function beforeSave($create)
    {
        if(parent::beforeSave($create))
        {
            if($this->isNewRecord)
            {
                //$this->create_time = date('y-m-d H:m:s');
                $this->ev_adminid = Yii::$app->user->identity->getId();
               // $this->status_id = '0';
            }
            else{
                //$this->update_time = date('y-m-d H:m:s');
                $this->ev_adminid = Yii::$app->user->identity->getId();
            }
            return true;
        }
        else{
            return false;
        }
    }


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ev_start_time', 'ev_end_time', 'ev_signup_endtime'], 'safe'],
            [['ev_title', 'ev_maxnumber','ev_place','ev_summary', 'ev_content','ev_start_time', 'ev_end_time', 'ev_signup_endtime'], 'required'],
            [['ev_adminid', 'ev_number', 'cev_tid', 'ev_maxnumber', 'ev_created_at', 'ev_updated_at'], 'integer'],
            [['ev_title', 'ev_place'], 'string', 'max' => 1024],
            [['ev_summary', 'ev_content', 'ev_label_img'], 'string', 'max' => 255],

        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ev_id' => '活动ID',
            'ev_start_time' => '活动开始时间',
            'ev_title' => '活动名称',
            'ev_adminid' => '发布者',
            'ev_place' => '活动地点',
            'ev_number' => '已报名人数',
            'cev_tid' => '负责老师',
            'ev_maxnumber' => '活动名额',
            'ev_summary' => '活动介绍',
            'ev_content' => '活动内容',
            'ev_label_img' => '标签图',
            'ev_end_time' => '活动结束时间',
            'ev_created_at' => '发布时间',
            'ev_updated_at' => '更新时间',
            'ev_signup_endtime' => '报名截至时间',
        ];
    }
}
