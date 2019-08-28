<?php

namespace app\modules\system\controllers;
use app\modules\system\models\DsisSystemLogActivity;
use Yii;

use yii\web\Controller;

/**
 * Default controller for the `system` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $model = DsisSystemLogActivity::find()->orderBy([
           'time' => SORT_DESC,
        ])->limit(90)->all();

        $query_user = "
            select user, count(id) as total
            from dsis_system_log_activity   
            group by user
        ";
        $query_user_per_month_2017 = "
            select extract(MONTH from time) as bulan, count(id) as total
            from dsis_system_log_activity
            where extract(YEAR from time) = 2017
            group by bulan
        ";
        $totalActivityPerUser = Yii::$app->db->CreateCommand($query_user)->queryAll();
        $totalUserPerMonth = Yii::$app->db->CreateCommand($query_user_per_month_2017)->queryAll();
        $username = array();
        $usertotal = array();
        $bulan = array();
        $bulanTotal = array();

        for($i=0;$i<sizeof($totalActivityPerUser);$i++){
            array_push($username, $totalActivityPerUser[$i]['user']);
            array_push($usertotal, (int)$totalActivityPerUser[$i]['total']);
        }

        for($i=0;$i<sizeof($totalActivityPerUser);$i++){
            array_push($bulan, $totalActivityPerUser[$i]['user']);
            array_push($bulanTotal, (int)$totalActivityPerUser[$i]['total']);
        }

        // var_dump($totalActivityPerUser);
        // exit();

        return $this->render('index',[
            'model' => $model,
            'totalActivityPerUser' => $totalActivityPerUser,
            'username' => $username,
            'usertotal' => $usertotal,
        ]);
    }

    public function actionServer(){
    	return $this->render('server');
    }
}
