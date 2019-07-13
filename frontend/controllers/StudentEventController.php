<?php

namespace frontend\controllers;

use common\models\CustomEvent;
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
    public $colors = array(0=>'#6465A5', 1=>'#0294A5', 2=>'#F3E96B', 3=>'#F28A30',
        4=>'#F05837', 5=>'#00743F', 6=>'#93A806', 7=>'#F46A4E');

    const NANKAI_PURPLE = '#701e5e';
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
        try {

            $user = Yii::$app->user;
            if ($user->isGuest)
                return;

            $userid = $user->id;

            $c_participations = Participation::findAll(['user_id' => $userid, 'op1_status' => 1]);

            $pevents = StudentEvent::findAll(['ev_userid' => $userid, 'ev_status' => 0]);

            $events = array();
            foreach ($c_participations as $c)
            {
                $cevent = InstitutionEvent::findOne(['ev_id' => $c->ev_id]);
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

            foreach ($pevents as $p)
            {
                $Event = new \yii2fullcalendar\models\Event();
                $Event->id = $p->ev_id;
                $Event->className = 'stu-event';
                $Event->title = $p->ev_name;
                $Event->start = $p->ev_time;
                $Event->end = $p->ev_end;
                $Event->color = $this->colors[$p->ev_color];
                $Event->allDay = $p->all_day;
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
    public function actionCreate($date = null, $hour = '06', $minute = '00', $color = 0, $allday=false)
    {
        try {
            $user = Yii::$app->user->identity;
            if (!$user) {
                return null;
            }
            $model = new StudentEvent();

            $model->ev_color = (int)$color;
            $end_hour = (int)$hour + 1;
            if ($date != null) {
                if (strlen($hour) < 2) {
                    $hour = '0' . $hour;

                }
                if (strlen($minute) < 2)
                    $minute = '0' . $minute;

                if ($end_hour < 10) {
                    $end_hour = '0' . $end_hour;
                }

                $end_date = $date . ' ' . $end_hour . ':' . $minute;

                $date = $date . ' ' . $hour . ':' . $minute;
                $model->ev_time = $date;
                $model->ev_end = $end_date;
            }


            $model->ev_userid = $user->getId();

            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                Yii::$app->session->setFlash('success', '创建成功');
                return $this->redirect(['/site/main']);
            }
            return $this->renderAjax('create', [
                'model' => $model,
            ]);
        }catch (\Exception $e) {
            Yii::$app->session->setFlash('fail', $e->getMessage());
            return $this->renderAjax('create');
        }
    }

    public function actionChangeStatus($id)
    {
        $user = Yii::$app->user->identity;
        $model = StudentEvent::findOne(['ev_id' => $id]);
        if ($model->ev_userid != $user->getId())
            return 'invalid';

        $model->ev_status = 1;
        $model->save(false);
        return $this->redirect(['/site/main']);
    }

    public function actionDragCreate($ceid = null, $date = null, $hour = '06', $minute = '00', $allday=false)
    {
        try {
            $user = Yii::$app->user->identity;
            if (!$user) {
                return null;
            }
            $custom_event = CustomEvent::findOne(['ev_id' => (int)$ceid]);

            if(!$custom_event || $custom_event->ev_userid != $user->getId())
                return null;
            $model = new StudentEvent();

            $model->ev_color = $custom_event->ev_color;
            $end_hour = (int)$hour + 1;
            if ($date != null) {
                if (strlen($hour) < 2) {
                    $hour = '0' . $hour;
                }

                if (strlen($minute) < 2)
                    $minute = '0' . $minute;

                if ($end_hour < 10) {
                    $end_hour = '0' . $end_hour;
                }

                $end_date = $date . ' ' . $end_hour . ':' . $minute;

                $date = $date . ' ' . $hour . ':' . $minute;
                $model->ev_time = $date;
                $model->ev_end = $end_date;
                $model->ev_superevent_id = $custom_event->ev_id;
                $model->ev_name = $custom_event->ev_name;
                $model->ev_place = $custom_event->ev_place;
                $model->ev_description = $custom_event->ev_description;
            }


            $model->ev_userid = $user->getId();

            if ($model->save()) {
                Yii::$app->session->setFlash('success', '创建成功');
                return $this->redirect(['/site/main']);
            }
            Yii::$app->session->setFlash('error', '创建失败');
            return $this->redirect(['/site/main']);
//            ]);
        }catch (\Exception $e) {
            Yii::$app->session->setFlash('error', $e->getMessage());
            return $this->redirect(['/site/main']);
        }
    }

    public function actionDelete($id) {
        return false;
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
            Yii::$app->session->setFlash('success','修改成功');
//            return 'true';
            return $this->redirect(['/site/main']);
        }

        return $this->renderAjax('update', [
            'model' => $model,
        ]);
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
