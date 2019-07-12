<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cevent".
 *
 * @property integer $ev_id
 * @property string $ev_time
 * @property string $ev_name
 * @property integer $ev_adminid
 * @property string $ev_place
 * @property integer $ev_number
 * @property integer $cev_tid
 *
 * @property Admin $evAdmin
 * @property Event $ev
 */
class Cevent extends \app\models\Event
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cevent';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ev_id'], 'required'],
            [['ev_id', 'ev_adminid', 'ev_number', 'cev_tid'], 'integer'],
            [['ev_time'], 'safe'],
            [['ev_name', 'ev_place'], 'string', 'max' => 1024],
            [['ev_adminid'], 'exist', 'skipOnError' => true, 'targetClass' => Admin::className(), 'targetAttribute' => ['ev_adminid' => 'depart_id']],
            [['ev_id'], 'exist', 'skipOnError' => true, 'targetClass' => Event::className(), 'targetAttribute' => ['ev_id' => 'ev_id']],
            [['ev_number'],'compare','compareAttribute' => 'ev_maxnumber', 'operator' => '<=']
        ];
    }
    /**
     * @inheritdoc
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
    public function getEv()
    {
        return $this->hasOne(Event::className(), ['ev_id' => 'ev_id']);
    }
}
