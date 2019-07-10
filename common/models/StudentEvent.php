<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "pevent".
 *
 * @property int $ev_id
 * @property string $ev_time
 * @property string $ev_name
 * @property int $ev_userid
 * @property string $ev_place
 * @property int $ev_superevent_id
 * @property string $ev_description
 * @property int $ev_color
 * @property int $ev_status
 * @property boolean $all_day
 *
 * @property Operation2[] $operation2s
 */
class StudentEvent extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pevent';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ev_id', 'ev_name', 'ev_userid'], 'required'],
            [['ev_id', 'ev_userid', 'ev_superevent_id', 'ev_color', 'ev_status'], 'integer'],
            [['ev_time'], 'safe'],
            [['ev_name', 'ev_place', 'ev_description'], 'string', 'max' => 1024],
            [['ev_id'], 'unique'],
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
            'ev_userid' => 'Ev Userid',
            'ev_place' => 'Ev Place',
            'ev_superevent_id' => 'Ev Superevent ID',
            'ev_description' => 'Ev Description',
            'ev_color' => 'Ev Color',
            'ev_status' => 'Ev Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOperation2s()
    {
        return $this->hasMany(Operation2::className(), ['ev_id' => 'ev_id']);
    }
}
