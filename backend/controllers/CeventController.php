<?php

namespace backend\controllers;

use common\models\TeacherModel;
use Yii;
use common\models\CeventModel;
use common\models\CeventSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

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
            return $this->redirect(['view', 'id' => $model->ev_id]);
        } else {
            return $this->render('create', [
                'model' => $model,'teacher'=>$teacher,
            ]);
        }
    }

    /**
     * Updates an existing CeventModel model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $teacher=TeacherModel::getAllTea();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->ev_id]);
        } else {
            return $this->render('update', [
                'model' => $model,'teacher'=>$teacher,
            ]);
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
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actions()
    {
        return [
            'upload'=>[
                'class' => 'common\widgets\file_upload\UploadAction',     //这里扩展地址别写错
                'config' => [
                    'imagePathFormat' => "/image/{yyyy}{mm}{dd}/{time}{rand:6}",
                ]
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
