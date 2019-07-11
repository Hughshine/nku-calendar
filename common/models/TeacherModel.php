<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "teacher".
 *
 * @property integer $user_id
 * @property string $position
 */
class TeacherModel extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'teacher';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id'], 'required'],
            [['user_id'], 'integer'],
            [['position'], 'string', 'max' => 1024],
        ];
    }

    public static function getAllTea()
    {
        $teacher=['0'=>'暂无老师'];
        $res =self::find()->asArray()->all();
        if($res)
        {
            foreach($res as $k=>$list)
            {
                $teacher[]=$list['user_id'];
            }
        }
        return $teacher;
    }


    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'user_id' => 'User ID',
            'position' => 'Position',
        ];
    }
}
