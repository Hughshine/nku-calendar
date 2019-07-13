<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "comment".
 *
 * @property string $com_time
 * @property integer $com_id
 * @property integer $com_userid
 * @property string $com_content
 * @property integer $com_eveid
 *
 * @property Event $comEve
 */
class Comment extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'comment';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['com_time'], 'safe'],
            [['com_id', 'com_userid', 'com_eveid'], 'integer'],
            [['com_content'], 'string', 'max' => 1024],
            [['com_eveid'], 'exist', 'skipOnError' => true, 'targetClass' => Cevent::className(), 'targetAttribute' => ['com_eveid' => 'ev_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'com_time' => 'Com Time',
            'com_id' => 'Com ID',
            'com_userid' => 'Com Userid',
            'com_content' => '(๑•ㅂ•́)و✧说出你对这次活动的评论、意见或想法……',
            'com_eveid' => 'Com Eveid',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComEve()
    {
        return $this->hasOne(Event::className(), ['ev_id' => 'com_eveid']);
    }
}
