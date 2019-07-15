<?php

namespace backend\controllers;

use common\models\TeacherModel;
use frontend\models\Cevent;
use Yii;
use common\models\CeventModel;
use common\models\CeventSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\models\Participation;
use common\models\InstitutionEvent;
use frontend\controllers\StudentEventController;
use backend\models\Admin;

/**
 * CeventController implements the CRUD actions for CeventModel model.
 */
class CeventController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [

            'verbs' => [
                'class' => VerbFilter::className(),
                //'class' => TimestampBehavior::className(),
                'actions' => [
                    'delete' => ['POST'],
                   // 'createdAtAttribute' => 'ev_created_at',
                  //  'updatedAtAttribute' => 'ev_updated_at',
                    // 'value' => new Expression('NOW()'),
                   // 'value'   => function(){return date('Y-m-d H:i:s',time());},
                ],
            ],
        ];
    }

    /**
     * Lists all CeventModel models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CeventSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single CeventModel model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionAjaxView($id)
    {
        return $this->renderAjax('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new CeventModel model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new CeventModel();
        $teacher=TeacherModel::getAllTea();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', '创建成功');
            return $this->redirect(['index']);
        } else {
            return $this->render('create', [
                'model' => $model,'teacher'=>$teacher,
            ]);
        }
    }

    public function actionAjaxUpdate($id)
    {
        $model = $this->findModel($id);
        $teacher=TeacherModel::getAllTea();
        $adminid=$model->ev_adminid;
        $userid = Yii::$app->user->getId();

        if ($model->load(Yii::$app->request->post()) && $model->save(false)) {
            Yii::$app->session->setFlash('success', '修改成功');
            return $this->redirect(['index']);
        } else {
            if($adminid!=$userid) {
                Yii::$app->session->setFlash('info', '不能修改其他学院的活动！！');
                return $this->render('index', [
                    'model' => $this->findModel($id),
                ]);
            }
            else {
                return $this->renderAjax('update', [
                    'model' => $model, 'teacher' => $teacher,
                ]);
            }
        }
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $teacher=TeacherModel::getAllTea();
        $adminid=$model->ev_adminid;
        $userid = Yii::$app->user->getId();

        if ($model->load(Yii::$app->request->post()) && $model->save(false)) {
            Yii::$app->session->setFlash('success', '修改成功');
            return $this->redirect(['index']);
        } else {
            if($adminid!=$userid) {
                Yii::$app->session->setFlash('info', '不能修改其他学院的活动！！');
                return $this->render('index', [
                    'model' => $this->findModel($id),
                ]);
            }
            else {
                return $this->render('update', [
                    'model' => $model, 'teacher' => $teacher,
                ]);
            }
        }
    }

    public function actionJsonCalendar($start=NULL,$end=NULL,$_=NULL){
        try {

            $user = Yii::$app->user;
            if ($user->isGuest)
                return;

            $userid = $user->id;

            $cevents = Cevent::findAll(['ev_adminid' => $userid]);

            $events = array();
            foreach ($cevents as $cevent)
            {
                $Event = new \yii2fullcalendar\models\Event();
                $Event->id = $cevent->ev_id;
                $Event->className = 'inst-event';
                $Event->title = $cevent->ev_title;
                $Event->start = $cevent->ev_start_time;
                $Event->end = $cevent->ev_end_time;
                $Event->color = StudentEventController::NANKAI_PURPLE;
                $Event->allDay = $cevent->all_day;
                $events[] = $Event;
            }

            Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            Yii::$app->response->data  =  $events;//Json::encode($events);
//        header('Content-type: application/json');
//        echo ;
//        Yii::$app->end();
        }catch (\Exception $e) {
            Yii::$app->session->setFlash('error', $e->getMessage());
        }
    }

    /**
     * Deletes an existing CeventModel model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $adminid=$model->ev_adminid;
        $userid = Yii::$app->user->getId();
        $searchModel = new CeventSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        if($adminid!=$userid) {
            Yii::$app->session->setFlash('info', '不能删除其他学院的活动！！');
            return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        }
        else {
            $this->findModel($id)->delete();
            return $this->redirect(['index']);
        }
    }

    public function actions()
    {
        return [
            'upload'=>[
                'class' => 'common\widgets\file_upload\UploadAction',     //这里扩展地址别写错
                'config' => [
                    'imagePathFormat' => "/image/{yyyy}{mm}{dd}/{time}{rand:6}",
                ]
            ],

            'ueditor' => [
                'class' => 'common\widgets\ueditor\UEditorAction',
            ]

        ];
    }
    /**
     * Finds the CeventModel model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return CeventModel the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = CeventModel::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
