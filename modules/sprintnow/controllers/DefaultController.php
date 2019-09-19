<?php

namespace app\modules\sprintnow\controllers;

use Yii;
use yii\web\Controller;
use app\modules\sprintnow\models\TaskDelivery;
use app\modules\sprintnow\models\Comment;
use app\modules\sprintnow\models\TaskDeliverySearch;
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
                    // 'delete' => ['post'],
                ],
            ],
            'access' => [
                'class' => \yii\filters\AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['index', 'view', 'backtobacklog', 'gotobc','add-comment','deletecomment'],
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
        $modelComment = Comment::find()->orderBy(['id' => SORT_DESC])->where('id_tasklist = '.$id.' and deleted = 0')->all();
        
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

    protected function findModelComment($id)
    {
        if (($model = Comment::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionBacktobacklog($id){
    	$model = $this->findModel($id);
        $model->loadAll(Yii::$app->request->post());
        $model->id_status = 1;
        $model->save(false);
        return $this->redirect(['index']);
    }

    public function actionGotobc($id){
    	$model = $this->findModel($id);
        $model->loadAll(Yii::$app->request->post());
        $model->id_status = 3;
        $model->save(false);
        return $this->redirect(['index']);
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

    public function actionDeletecomment($id){
        $model = $this->findModelComment($id);
        $model->loadAll(Yii::$app->request->post());
        $model->deleted = 1;
        $model->save(false);
        return $this->redirect(Yii::$app->request->referrer);
    }

}
