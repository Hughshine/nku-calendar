<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "cevent".
 *
 * @property int $ev_id
 * @property string $ev_start_time
 * @property string $ev_end_time
 * @property string $ev_title
 * @property int $ev_adminid
 * @property string $ev_place
 * @property int $ev_number
 * @property int $cev_tid
 * @property int $ev_maxnumber
 * @property boolean $all_day
 * @property Admin $evAdmin
 * @property Teacher $cevT
 * @property Operation1[] $operation1s
 */
class InstitutionEvent extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cevent';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ev_id', 'ev_name', 'ev_maxnumber'], 'required'],
            [['ev_id', 'ev_adminid', 'ev_number', 'cev_tid', 'ev_maxnumber'], 'integer'],
            [['ev_time'], 'safe'],
            [['ev_name', 'ev_place'], 'string', 'max' => 1024],
            [['ev_id'], 'unique'],
            [['ev_adminid'], 'exist', 'skipOnError' => true, 'targetClass' => Admin::className(), 'targetAttribute' => ['ev_adminid' => 'depart_id']],
            [['cev_tid'], 'exist', 'skipOnError' => true, 'targetClass' => Teacher::className(), 'targetAttribute' => ['cev_tid' => 'user_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ev_id' => '活动Id',
            'ev_time' => '活动开始时间',
            'ev_name' => '活动名称',
            'ev_adminid' => '活动所属学院id',
            'ev_place' => '活动地点',
            'ev_number' => '当前参与人数',
            'cev_tid' => '活动管理员id',
            'ev_maxnumber' => '活动人数上限',
//            'ev_adminname' => '管理员姓名', //TODO
            'all_day' => '是否为全天活动',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEvAdmin()
    {
        return $this->hasOne(Admin::className(), ['depart_id' => 'ev_adminid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCevT()
    {
        return $this->hasOne(Teacher::className(), ['user_id' => 'cev_tid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOperation1s()
    {
        return $this->hasMany(Operation1::className(), ['ev_id' => 'ev_id']);
    }
}
