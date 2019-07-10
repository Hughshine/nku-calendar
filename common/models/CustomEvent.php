<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "custom_event".
 *
 * @property int $ev_id
 * @property string $ev_name
 * @property int $ev_userid
 * @property int $ev_color
 * @property string $ev_description
 * @property string $ev_place
 */
class CustomEvent extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'custom_event';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ev_id', 'ev_name', 'ev_userid'], 'required'],
            [['ev_id', 'ev_userid', 'ev_color'], 'integer'],
            [['ev_name'], 'string', 'max' => 128],
            [['ev_description', 'ev_place'], 'string', 'max' => 1024],
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
            'ev_name' => 'Ev Name',
            'ev_userid' => 'Ev Userid',
            'ev_color' => 'Ev Color',
            'ev_description' => 'Ev Description',
            'ev_place' => 'Ev Place',
        ];
    }
}
