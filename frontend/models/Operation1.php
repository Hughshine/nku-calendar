<?php

namespace frontend\models;

use frontend\models\User;
use Yii;

/**
 * This is the model class for table "operation1".
 *
 * @property integer $ev_id
 * @property integer $user_id
 * @property string $op1_time
 * @property integer $op1_status
 * @property integer $op1_id
 *
 * @property Cevent $ev
 * @property Student $user
 */
class Operation1 extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'operation1';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ev_id', 'user_id', 'op1_status', ], 'required'],
            [['ev_id', 'user_id', 'op1_status', ], 'integer'],
            [['ev_id'],'validateSum'],
            [['ev_id'],'validateRepeat','on'=>['choose']],
            [['ev_id'],'validateNotchoose','on'=>['cancel']],
            [['op1_time'], 'safe'],
            [['ev_id'], 'exist', 'skipOnError' => true, 'targetClass' => Cevent::className(), 'targetAttribute' => ['ev_id' => 'ev_id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }


    public function validateSum()
    {
        if (!$this->hasErrors()) {
            $data = Cevent::find()->where('ev_id = :ev_id', [":ev_id" => $this->ev_id])->one();
            if ($data->ev_maxnumber == $data->ev_number) {
                $this->addError('ev_id','上限！！');
                Yii::$app->session->setFlash('info', '活动已达人数上限！！');
            }
        }
    }

    public function validateRepeat()
    {
        if (!$this->hasErrors()) {
            $data = Operation1::find()->where('ev_id = :ev_id and user_id = :user_id', [":ev_id" => $this->ev_id, ":user_id" =>$this->user_id])->orderBy('op1_time DESC')->one();
            if($data)
                if ($data->op1_status == 1) {
                $this->addError('ev_id','重复！！');
                Yii::$app->session->setFlash('info', '不能重复参加活动！！');
            }
        }
    }

    public function validateNotchoose()
    {
        if (!$this->hasErrors()) {
            $data = Operation1::find()->where('ev_id = :ev_id and user_id = :user_id', [":ev_id" => $this->ev_id, ":user_id" =>$this->user_id])->orderBy('op1_time DESC')->one();
            if ($data->op1_status == 0) {
                $this->addError('ev_id','未参加！！');
                Yii::$app->session->setFlash('info', '尚未参加活动！！');
            }
        }
    }

    public function choose($data)
    {
        $this->scenario = "choose";
        if($this->load($data)&&$this->validate()){
            $ceve = Cevent::find()->where(['ev_id' => $data['Operation1']['ev_id']])->one();
            if($ceve->updateCounters(['ev_number' => 1])){
                $this->save();
                Yii::$app->session->setFlash('info', '参加活动成功！！');
                return true;
            }
        }
    }

    public function cancel($data)
    {
        $this->scenario = "cancel";
        if($this->load($data)&&$this->validate()){
            $ceve = Cevent::find()->where(['ev_id' => $data['Operation1']['ev_id']])->one();
                if($ceve->updateCounters(['ev_number' => -1])){
                    $this->save();
                    Yii::$app->session->setFlash('info', '取消参加成功！！');
                    return true;
                }
        }
    }
    /**
     * @inheritdoc
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
