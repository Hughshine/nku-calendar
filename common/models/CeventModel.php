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
            'ev_id' => 'Ev ID',
            'ev_start_time' => 'Ev Start Time',
            'ev_title' => 'Ev Title',
            'ev_adminid' => 'Ev Adminid',
            'ev_place' => 'Ev Place',
            'ev_number' => 'Ev Number',
            'cev_tid' => 'Cev Tid',
            'ev_maxnumber' => 'Ev Maxnumber',
            'ev_summary' => 'Ev Summary',
            'ev_content' => 'Ev Content',
            'ev_label_img' => 'Ev Label Img',
            'ev_end_time' => 'Ev End Time',
            'ev_created_at' => 'Ev Created At',
            'ev_updated_at' => 'Ev Updated At',
            'ev_signup_endtime' => 'Ev Signup Endtime',
        ];
    }
}
