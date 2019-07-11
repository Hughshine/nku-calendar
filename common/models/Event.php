<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "event".
 *
 * @property string $ev_time
 * @property string $ev_title
 * @property int $ev_id
 * @property int $ev_adminid
 * @property string $ev_place
 * @property int $ev_maxnumber
 * @property int $ev_number
 * @property string $ev_content
 *
 * @property Comment[] $comments
 */
class Event extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'event';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ev_time'], 'safe'],
            [['ev_title', 'ev_id', 'ev_adminid', 'ev_maxnumber', 'ev_content'], 'required'],
            [['ev_id', 'ev_adminid', 'ev_maxnumber', 'ev_number'], 'integer'],
            [['ev_title', 'ev_place', 'ev_content'], 'string', 'max' => 1024],
            [['ev_id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ev_time' => 'Ev Time',
            'ev_title' => 'Ev Title',
            'ev_id' => 'Ev ID',
            'ev_adminid' => 'Ev Adminid',
            'ev_place' => 'Ev Place',
            'ev_maxnumber' => 'Ev Maxnumber',
            'ev_number' => 'Ev Number',
            'ev_content' => 'Ev Content',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComments()
    {
        return $this->hasMany(Comment::className(), ['com_eveid' => 'ev_id']);
    }
}
