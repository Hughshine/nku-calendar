<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "pevent".
 *
 * @property int $ev_id
 * @property string $ev_time
 * @property string $ev_end
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
            [['ev_name', 'ev_userid'], 'required'],
            [['ev_id', 'ev_userid', 'ev_superevent_id', 'ev_color', 'ev_status'], 'integer'],
            [['ev_time', 'ev_end'], 'safe'],
            [['ev_name', 'ev_place', 'ev_description'], 'string', 'max' => 1024],
            [['ev_id'], 'unique'],
        ];
    }

    public function fields()
    {
        return[
            'id' => 1
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ev_id' => '事件Id',
            'ev_time' => '事件起始时间',
            'ev_end' => '事件结束时间', //默认一个小时以后
            'ev_name' => '事件名称',
            'ev_userid' => '用户Id',
            'ev_place' => '事件地点',
            'ev_superevent_id' => '日常任务编号',
            'ev_description' => '事件描述',
            'ev_color' => '事件颜色',
            'ev_status' => '事件状态',
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
