<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "operation1".
 *
 * @property int $ev_id
 * @property int $user_id
 * @property string $op1_time
 * @property int $op1_status
 * @property int $op1_id
 *
 * @property Cevent $ev
 * @property Student $user
 */
class Participation extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'operation1';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ev_id', 'user_id', 'op1_status', 'op1_id'], 'required'],
            [['ev_id', 'user_id', 'op1_status', 'op1_id'], 'integer'],
            [['op1_time'], 'safe'],
            [['op1_id'], 'unique'],
            [['ev_id'], 'exist', 'skipOnError' => true, 'targetClass' => Cevent::className(), 'targetAttribute' => ['ev_id' => 'ev_id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => Student::className(), 'targetAttribute' => ['user_id' => 'user_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ev_id' => 'Ev ID',
            'user_id' => 'User ID',
            'op1_time' => 'Op1 Time',
            'op1_status' => 'Op1 Status',
            'op1_id' => 'Op1 ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEv()
    {
        return $this->hasOne(Cevent::className(), ['ev_id' => 'ev_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(Student::className(), ['user_id' => 'user_id']);
    }
}
