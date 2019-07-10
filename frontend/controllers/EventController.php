<?php

namespace frontend\controllers;

use Throwable;
use Yii;
use common\models\Participation;
use common\models\StudentEvent;
use common\models\InstitutionEvent;
use yii\helpers\Json;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * EventController implements the CRUD actions for Event model.
 */
class EventController extends Controller
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
     * Lists all Event models.
     * @return mixed
     */
    public function actionIndex()
    {
        $events = Event::find()->all();

        foreach ($events as $e)
        {
            $event = new \yii2fullcalendar\models\Event();
            $event->id = $e->ev_id;
            $event->title = $e->ev_title;
            $event->start = date('Y-m-d\Th:m:s\Z', strtotime('tomorrow 6am'));//$event->created_date;
            $tasks[] = $event;
        }
        return $this->render('index', [
            'events' => $tasks
        ]);
    }

    /**
     * Displays a single Event model.
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
     * Creates a new Event model.
     * @return mixed
     */
    public function actionCreate($date)
    {
        $model = new Event();
        $model->ev_time = $date;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['/site/index']);
        }

        return $this->renderAjax('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Event model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Event model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     * @throws Throwable
     * @throws \yii\db\StaleObjectException
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Event model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Event the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Event::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
