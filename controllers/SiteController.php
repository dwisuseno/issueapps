<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use yii\helpers\Html;
use kartik\export\ExportMenu;
use kartik\grid\GridView;
use app\modules\system\models\DsisSystemLog;
use app\modules\system\models\DsisSystemUser;
use app\modules\datamaster\models\MSprint;
use yii\web\UploadedFile;

class SiteController extends Controller
{

    
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
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
                    // 'logout' => ['get'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
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

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
       
        return $this->render('index');
        
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        $this->layout = 'login';
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            $model_log = new DsisSystemLog();
            $model_log->user = \Yii::$app->user->identity->name;
            $model_log->date = date("j F Y"); 
            $model_log->start_login = date("H:i:s a");    
            $model_log->save();

            $id = DsisSystemLog::find()->orderBy(['id' => SORT_DESC])->limit(1)->one();
            // var_dump($id->id);
            // exit();
            Yii::$app->session['log_id'] = $id->id;
            return $this->goBack();
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        $log_id = Yii::$app->session['log_id'];
        $connection = Yii::$app->db;
        $connection->createCommand()->update('dsis_system_log', ['end_login' => date("H:i:s a")], ['id' => $log_id])->execute();

        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionSend(){
        // \Yii::$app->mail->htmlLayout = "@app/mail/layouts/html";
        // Yii::$app->mail->compose(['html' => '@app/mail/views/myView' ])
        // ->setFrom(['noreply@hseautomation.com' => 'BEATS man birthday'])
        // ->setTo(['dwi.aji@beraucoal.co.id'])
        // ->setSubject('Special Birthday For You')
        // ->send();
    }

}
