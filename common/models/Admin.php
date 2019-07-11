<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "admin".
 *
 * @property string $depart_name
 * @property int $depart_id
 *
 * @property Cevent[] $cevents
 */
class Admin extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'admin';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['depart_id'], 'required'],
            [['depart_id'], 'integer'],
            [['depart_name'], 'string', 'max' => 1024],
            [['depart_id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'depart_name' => 'Depart Name',
            'depart_id' => 'Depart ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCevents()
    {
        return $this->hasMany(Cevent::className(), ['ev_adminid' => 'depart_id']);
    }
}
