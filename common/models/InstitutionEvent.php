<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "cevent".
 *
 * @property int $ev_id
 * @property string $ev_time
 * @property string $ev_name
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
            'ev_id' => 'Ev ID',
            'ev_time' => 'Ev Time',
            'ev_name' => 'Ev Name',
            'ev_adminid' => 'Ev Adminid',
            'ev_place' => 'Ev Place',
            'ev_number' => 'Ev Number',
            'cev_tid' => 'Cev Tid',
            'ev_maxnumber' => 'Ev Maxnumber',
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
