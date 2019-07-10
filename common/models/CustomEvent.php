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
            [['ev_name', 'ev_userid'], 'required'],
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
            'ev_id' => '活动ID',
            'ev_name' => '活动名称',
            'ev_userid' => '所属用户',
            'ev_color' => '活动颜色',
            'ev_description' => '活动描述',
            'ev_place' => '活动地点',
        ];
    }
}
