<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "teacher".
 *
 * @property int $user_id
 * @property string $position
 *
 * @property Cevent[] $cevents
 */
class Teacher extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'teacher';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id'], 'required'],
            [['user_id'], 'integer'],
            [['position'], 'string', 'max' => 1024],
            [['user_id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'user_id' => 'User ID',
            'position' => 'Position',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCevents()
    {
        return $this->hasMany(Cevent::className(), ['cev_tid' => 'user_id']);
    }
}
