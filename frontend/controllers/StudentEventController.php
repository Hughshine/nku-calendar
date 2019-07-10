<?php

namespace frontend\controllers;

use common\models\Participation;
use common\models\InstitutionEvent;
use Yii;
use common\models\StudentEvent;
use frontend\models\StudentEventSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Json;
/**
 * StudentEventController implements the CRUD actions for StudentEvent model.
 */
class StudentEventController extends Controller
{
    public $colors = array(0=>'#2ae0c8', 1=>'#cbf5fb', 2=>'#bdf3d4', 3=>'#e6e2c3',
        4=>'#e3c887', 5=>'#fad8be', 6=>'#fbb8ac', 7=>'#fe6673');
    /**
     * {@inheritdoc}
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
     * Lists all StudentEvent models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new StudentEventSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    public function actionJsonCalendar($start=NULL,$end=NULL,$_=NULL){
        $user = Yii::$app->user;
        if ($user->isGuest)
            return;

        $userid = $user->id;

        $c_participations = Participation::findAll(['user_id' => $userid]);

        $pevents = StudentEvent::findAll(['ev_userid' => $userid]);

        $events = array();
        foreach ($c_participations as $c)
        {
            $cevent = InstitutionEvent::findOne(['ev_id' => $c->ev_id]);
            $Event = new \yii2fullcalendar\models\Event();
            $Event->id = $cevent->ev_id;
            $Event->title = $cevent->ev_name;
            $Event->start = $cevent->ev_time;
            $Event->color = $this->colors[rand(0,7)];
            $events[] = $Event;
        }

        foreach ($pevents as $p)
        {
            $Event = new \yii2fullcalendar\models\Event();
            $Event->id = $p->ev_id;
            $Event->title = $p->ev_name;
            $Event->start = $p->ev_time;
            $Event->color = $this->colors[$p->ev_color];
            $events[] = $Event;
        }

        header('Content-type: application/json');
        echo Json::encode($events);
        Yii::$app->end();
    }

    /**
     * Displays a single StudentEvent model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new StudentEvent model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($date)
    {
        $model = new StudentEvent();
        $model->ev_time = $date;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['/site/index']);
        }

        return $this->renderAjax('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing StudentEvent model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->ev_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the StudentEvent model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return StudentEvent the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = StudentEvent::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
