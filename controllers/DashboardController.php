<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\modules\confirmation\models\TaskDelivery;
use app\modules\datamaster\models\MSprint;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
/**
 * Default controller for the `done` module
 */
class DashboardController extends Controller
{
	public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
            'access' => [
                'class' => \yii\filters\AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['index'],
                        'roles' => ['@']
                    ],
                    [
                        'allow' => false
                    ]
                ]
            ]
        ];
    }
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex(){
        if($_SESSION['project'] != 'Default'){
            $totalAllIssue = TaskDelivery::find()->where('deleted = 0 and id_modul = '.$_SESSION['id'].'')->count();
            $totalHighIssue = TaskDelivery::find()->where('id_prioritas = 3 and deleted = 0 and id_modul = '.$_SESSION['id'].'')->count();
            $totalDoneIssue = TaskDelivery::find()->where('id_status = 4 and deleted = 0 and id_modul = '.$_SESSION['id'].'')->count();
            $totalSprint = MSprint::find()->count();

            $totalWebTask = TaskDelivery::find()->where('id_platform = 1 and (id_status = 1 or id_status = 2 or id_status = 3) and deleted = 0 and id_modul = '.$_SESSION['id'].'')->count();
            $totalMobileTask = TaskDelivery::find()->where('id_platform = 2 and (id_status = 1 or id_status = 2 or id_status = 3) and deleted = 0 and id_modul = '.$_SESSION['id'].'')->count();
            $totalRfidTask = TaskDelivery::find()->where('id_platform = 3 and (id_status = 1 or id_status = 2 or id_status = 3) and deleted = 0 and id_modul = '.$_SESSION['id'].'')->count();
            $query_developer = "select * from vw_task_developer where id_modul = ".$_SESSION['id']."";
        } else {
            $totalAllIssue = TaskDelivery::find()->where('deleted = 0')->count();
            $totalHighIssue = TaskDelivery::find()->where('id_prioritas = 3 and deleted = 0')->count();
            $totalDoneIssue = TaskDelivery::find()->where('id_status = 4 and deleted = 0')->count();
            $totalSprint = MSprint::find()->count();

            $totalWebTask = TaskDelivery::find()->where('id_platform = 1 and (id_status = 1 or id_status = 2 or id_status = 3) and deleted = 0')->count();
            $totalMobileTask = TaskDelivery::find()->where('id_platform = 2 and (id_status = 1 or id_status = 2 or id_status = 3) and deleted = 0')->count();
            $totalRfidTask = TaskDelivery::find()->where('id_platform = 3 and (id_status = 1 or id_status = 2 or id_status = 3) and deleted = 0')->count();
            $query_developer = "select * from vw_task_developer";
            
        }
        // $query_developer = "select * from vw_task_developer where ";
        $DeveloperTask = Yii::$app->db->CreateCommand($query_developer)->queryAll();

        
        // echo "<pre>";
        // var_dump($DeveloperTask);
        // echo "</pre>";
        // exit();
        return $this->render('index',[
            'totalAllIssue' => $totalAllIssue,
            'totalHighIssue' => $totalHighIssue,
             'totalDoneIssue' => $totalDoneIssue,
             'totalSprint' => $totalSprint,
             'DeveloperTask' => $DeveloperTask,
             'totalWebTask' => $totalWebTask,
             'totalMobileTask' => $totalMobileTask,
             'totalRfidTask' => $totalRfidTask
        ]);
    }

}
