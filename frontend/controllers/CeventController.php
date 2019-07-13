<?php

namespace frontend\controllers;

use app\models\Comment;
use Yii;
use app\models\Cevent;
use app\models\CeventSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\Pagination;
use app\models\Operation1;
use yii\debug\models\search\Db;
/**
 * CeventController implements the CRUD actions for Cevent model.
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
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Cevent models.
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

    public function actionOverall()
    {
        $models = Cevent::find();
        $count = $models->count();
        $pager = new Pagination(['totalCount' => $count, 'pageSize' => 3]);
        $cevents = $models->offset($pager->offset)->limit($pager->limit)->all();
        return $this->render("overall", ['pager' => $pager, 'cevents' => $cevents]);
    }


    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionDetail($id)
    {


        $cmt = new Comment();

        if ($cmt->load(Yii::$app->request->post())) {
            $cmt->com_time = date('Y-m-d H:i:s',strtotime('+6 hour'));
            $cmt->com_eveid = $id;
            $cmt->com_userid = Yii::$app->user->getId();
            $cmt->save();
        }
        return $this->render('detail', [
            'model' => $this->findModel($id), 'comments' => $this->findComment($id),'cmt' => $cmt
        ]);
    }

    /**
     * Creates a new Cevent model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Cevent();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->ev_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Cevent model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->ev_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Cevent model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Cevent model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Cevent the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Cevent::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    protected function findComment($id)
    {
        if (($model = Comment::find()->where('com_eveid =:id ', [':id' => $id])->orderBy('com_time DESC')->all()) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionChoose($ceid)
    {
        $ope = new Operation1;
        $data['Operation1']['ev_id'] = $ceid;
        $data['Operation1']['user_id'] = Yii::$app->user->getId();
        $data['Operation1']['op1_time'] = date('Y-m-d H:i:s',strtotime('+6 hour'));
        $data['Operation1']['op1_status'] = 1;
        $ope->choose($data);
//        if($ope->load($data)&&$ope->validate()){
//            $ceve = Cevent::find()->where(['ev_id' => $data->ev_id])->one();
//            if($ceve->updateCounters(['ev_number' => 1])){
//                $ope->save();
//                Yii::$app->session->setFlash('info', '参加活动成功！！');
//            }
//        }
        $this->redirect(['overall']);
    }

    public function actionCancel($ceid)
    {
        $ope = new Operation1();
        $data['Operation1']['ev_id'] = $ceid;
        $data['Operation1']['user_id'] = Yii::$app->user->getId();
        $data['Operation1']['op1_time'] = date('Y-m-d H:i:s',strtotime('+6 hour'));
        $data['Operation1']['op1_status'] = 0;
        $ope->cancel($data);
        $this->redirect(['overall']);
    }
}
