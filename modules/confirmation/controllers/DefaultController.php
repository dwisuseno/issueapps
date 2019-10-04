<?php

namespace app\modules\confirmation\controllers;

use Yii;
use yii\web\Controller;
use app\modules\confirmation\models\TaskDelivery;
use app\modules\confirmation\models\Comment;
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
                        'actions' => ['index', 'view','backtosprint', 'gotoclose','add-comment','deletecomment','check'],
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
        $modelComment = Comment::find()->orderBy(['id' => SORT_DESC])->where('id_tasklist = '.$id.' and deleted <> 1')->all();
        
        return $this->render('view', [
            'model' => $this->findModel($id),
            // 'providerComment' => $providerComment,
            'modelComment' => $modelComment,
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
        
        $model->deployment = "Production";
        $model->save();
        return $this->redirect(['index']);
    }

    protected function findModelComment($id)
    {
        if (($model = Comment::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionAddComment($id){
        // $model = new Comment();
        $model = $this->findModel($id);
        $model_comment = new Comment();
        if ($model->loadAll(Yii::$app->request->post())) {
            // var_dump(Yii::$app->request->post());
            // exit();
            $model_comment->id_tasklist = $id;
            $model_comment->comment = $model->data_comment;
            $model_comment->save();
            return $this->redirect(Yii::$app->request->referrer);
        } else {
            return $this->redirect(Yii::$app->request->referrer);
        }
    }

    public function actionCheck($id){
        $model = $this->findModelComment($id);
        $model->loadAll(Yii::$app->request->post());
        if($model->deleted == 0){
            $model->deleted = 2;
        } else {
            $model->deleted = 0;
            
        }
        $model->save(false);
        return $this->redirect(Yii::$app->request->referrer);
    }

    public function actionDeletecomment($id){
        $model = $this->findModelComment($id);
        $model->loadAll(Yii::$app->request->post());
        $model->deleted = 1;
        $model->save(false);
        return $this->redirect(Yii::$app->request->referrer);
    }

}
