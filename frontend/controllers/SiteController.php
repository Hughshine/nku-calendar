<?php
namespace frontend\controllers;

use common\models\InstitutionEvent;
use frontend\models\ResendVerificationEmailForm;
use frontend\models\VerifyEmailForm;
use Yii;
use yii\base\InvalidArgumentException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use yii\helpers\Json;
use frontend\models\FeedForm;

/**
 * Site controller
 */
class SiteController extends Controller
{
    public $colors = array(0=>'#2ae0c8', 1=>'#cbf5fb', 2=>'#bdf3d4', 3=>'#e6e2c3',
        4=>'#e3c887', 5=>'#fad8be', 6=>'#fbb8ac', 7=>'#fe6673');
    /**
     * {@inheritdoc}
     */
    public $enableCsrfValidation = false;
    /**
     * 留言添加
     */
    public function actionAddFeed()
    {
        $model=new FeedsForm();
        $model->content=Yii::$app->request->post('content');
        if ($model->validate()){
            if ($model->create()){
                return json_encode(['status'=>true]);
            }
        }
     
        return json_encode(['status'=>false,'msg'=>'留言发布失败']);
    }

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionHelloWorld($msg = 'hello11')
    {
        $view = \Yii::$app->getView();
        $view->params['message'] = $msg;
        return $this->render('hello', ['message'=> $msg]);
//        return 'Hello world';
    }
    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $this->layout = false;
        return $this->render('index');
    }

    public function actionMain()
    {
        $this->layout = 'main';
        if (Yii::$app->user->isGuest)
        {
            return $this->redirect('index.php?r=site%2Flogin');
        }
        return $this->render('main');

    }



    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
        $this->layout='main-login';
        if (!Yii::$app->user->isGuest) {
            $this->layout='main';
            return $this->redirect('index.php?r=site%2Fmain');
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            $this->layout='main';
            return $this->redirect('index.php?r=site%2Fmain');
        } else {
            $model->password = '';
            $this->layout='main-login';
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionForm($start,$end)
    {
        return $this->renderAjax('form',[
            'start'=>$start,
            'end'=>$end
        ]);
    }

    public function actionDropChild($id,$start,$end){
        echo "ID=".$id." START=".$start." EBD=".$end;
        //$model = Pilotproject::findOne(['ID'=>$id]);

        //$model->PLAN_DATE1 = $start;
        //$model->PLAN_DATE2 = $end;

        // $model->save();
    }

    public function actionEventCalendarSchedule()
    {
        $aryEvent=[
            ['id' => '1', 'resourceId' => 'b', 'start' => '2016-05-07T02:00:00', 'end' => '2016-05-07T07:00:00', 'title' => 'event 1'],
            ['id' => '2', 'resourceId' => 'c', 'start' => '2016-05-07T05:00:00', 'end' => '2016-05-07T22:00:00', 'title' => 'event 2'],
            ['id' => '3', 'resourceId' => 'd', 'start' => '2016-05-06', 'end' => '2016-05-08', 'title' => 'event 3'],
            ['id' => '4', 'resourceId' => 'e', 'start' => '2016-05-07T03:00:00', 'end' => '2016-05-07T08:00:00', 'title' => 'event 4'],
            ['id' => '5', 'resourceId' => 'f', 'start' => '2016-05-07T00:30:00', 'end' => '2016-05-07T02:30:00', 'title' => 'event 5'],
        ];

        return Json::encode($aryEvent);
    }

    public function actionResourceCalendarSchedule()
    {
        $aryResource=[
            ['id' => 'a', 'title' => 'Daily Report'],
            ['id' => 'b', 'title' => 'Auditorium B', 'eventColor' => 'green'],
            ['id' => 'c', 'title' => 'Auditorium C', 'eventColor' => 'orange'],
            [
                'id'       => 'd', 'title' => 'Auditorium D',
                'children' => [
                    ['id' => 'd1', 'title' => 'Room D1'],
                    ['id' => 'd2', 'title' => 'Room D2'],
                ],
            ],
            ['id' => 'e', 'title' => 'Auditorium E'],
            ['id' => 'f', 'title' => 'Auditorium F', 'eventColor' => 'red'],
            ['id' => 'g', 'title' => 'Auditorium G'],
            ['id' => 'h', 'title' => 'Auditorium H'],
            ['id' => 'i', 'title' => 'Auditorium I'],
            ['id' => 'j', 'title' => 'Auditorium J'],
            ['id' => 'k', 'title' => 'Auditorium K'],
            ['id' => 'l', 'title' => 'Auditorium L'],
            ['id' => 'm', 'title' => 'Auditorium M'],
            ['id' => 'n', 'title' => 'Auditorium N'],
            ['id' => 'o', 'title' => 'Auditorium O'],
            ['id' => 'p', 'title' => 'Auditorium P'],
            ['id' => 'q', 'title' => 'Auditorium Q'],
            ['id' => 'r', 'title' => 'Auditorium R'],
            ['id' => 's', 'title' => 'Auditorium S'],
            ['id' => 't', 'title' => 'Auditorium T'],
            ['id' => 'u', 'title' => 'Auditorium U'],
            ['id' => 'v', 'title' => 'Auditorium V'],
            ['id' => 'w', 'title' => 'Auditorium W'],
            ['id' => 'x', 'title' => 'Auditorium X'],
            ['id' => 'y', 'title' => 'Auditorium Y'],
            ['id' => 'z', 'title' => 'Auditorium Z'],
        ];

        return Json::encode($aryResource);
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending your message.');
            }

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post()) && $model->signup()) {
            Yii::$app->session->setFlash('success', 'Thank you for registration. Please check your inbox for verification email.');
            return $this->goHome();
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for the provided email address.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidArgumentException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }

    /**
     * Verify email address
     *
     * @param string $token
     * @throws BadRequestHttpException
     * @return yii\web\Response
     */
    public function actionVerifyEmail($token)
    {
        try {
            $model = new VerifyEmailForm($token);
        } catch (InvalidArgumentException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }
        if ($user = $model->verifyEmail()) {
            if (Yii::$app->user->login($user)) {
                Yii::$app->session->setFlash('success', 'Your email has been confirmed!');
                return $this->goHome();
            }
        }

        Yii::$app->session->setFlash('error', 'Sorry, we are unable to verify your account with provided token.');
        return $this->goHome();
    }

    /**
     * Resend verification email
     *
     * @return mixed
     */
    public function actionResendVerificationEmail()
    {
        $model = new ResendVerificationEmailForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');
                return $this->goHome();
            }
            Yii::$app->session->setFlash('error', 'Sorry, we are unable to resend verification email for the provided email address.');
        }

        return $this->render('resendVerificationEmail', [
            'model' => $model
        ]);
    }
}
