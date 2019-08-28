<?php

namespace app\modules\confirmation\controllers;

use Yii;
use yii\web\Controller;
use app\modules\confirmation\models\TaskDelivery;
use app\modules\confirmation\models\TaskDeliverySearch;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
/**
 * Default controller for the `done` module
 */
class DefaultController extends Controller
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
                        'actions' => ['index', 'view','backtosprint', 'gotoclose'],
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
    public function actionIndex()
    {
        $searchModel = new TaskDeliverySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionView($id)
    {
        $model = $this->findModel($id);
        $providerComment = new \yii\data\ArrayDataProvider([
            'allModels' => $model->comments,
        ]);
        return $this->render('view', [
            'model' => $this->findModel($id),
            'providerComment' => $providerComment,
        ]);
    }

	protected function findModel($id)
    {
        if (($model = TaskDelivery::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionBacktosprint($id){
    	$model = $this->findModel($id);
        $model->loadAll(Yii::$app->request->post());
        $model->id_status = 2;
        $model->save();
        return $this->redirect(['index']);
    }

    public function actionGotoclose($id){
    	$model = $this->findModel($id);
        $model->loadAll(Yii::$app->request->post());
        $model->id_status = 4;
        $model->actual_finish_date = date("Y-m-d H:i:s");
        $model->deployment = "Production";
        $model->save();
        return $this->redirect(['index']);
    }

}
