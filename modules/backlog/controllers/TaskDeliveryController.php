<?php

namespace app\modules\backlog\controllers;

use Yii;
use app\modules\backlog\models\TaskDelivery;
use app\modules\backlog\models\Comment;
use app\modules\backlog\models\TaskDeliverySearch;
use app\modules\datamaster\models\MSprint;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TaskDeliveryController implements the CRUD actions for TaskDelivery model.
 */
class TaskDeliveryController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post']
                    // 'add-comment' => ['post']
                ],
            ],
            'access' => [
                'class' => \yii\filters\AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['index', 'view', 'create', 'update', 'delete', 'pdf', 'save-as-new','changetoprogress','add-comment', 'modalcreate', 'deletecomment'],
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
     * Lists all TaskDelivery models.
     * @return mixed
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

    /**
     * Displays a single TaskDelivery model.
     * @param integer $id
     * @return mixed
     */
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


    /**
     * Creates a new TaskDelivery model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new TaskDelivery();

        if ($model->loadAll(Yii::$app->request->post())) {
            $sprint_id = MSprint::find()->where('kode = 1')->one();
            // $model->id_sprint = $sprint_id->id;
            $model->id_status = 1;
            $model->id_modul = $_SESSION['id']; 
            $model->save(false);
            return $this->redirect(['index']);
        } else {
            return $this->renderAjax('create', [
                    'model' => $model
            ]);
        }
    }

    /**
     * Updates an existing TaskDelivery model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        if (Yii::$app->request->post('_asnew') == '1') {
            $model = new TaskDelivery();
        }else{
            $model = $this->findModel($id);
        }

        if ($model->loadAll(Yii::$app->request->post())) {
            $model->save(false);
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing TaskDelivery model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $model->loadAll(Yii::$app->request->post());
        $model->deleted = 1;
        $model->save(false);
        return $this->redirect(['index']);
    }
    
    /**
     * 
     * Export TaskDelivery information into PDF format.
     * @param integer $id
     * @return mixed
     */
    public function actionPdf($id) {
        $model = $this->findModel($id);
        $providerComment = new \yii\data\ArrayDataProvider([
            'allModels' => $model->comments,
        ]);

        $content = $this->renderAjax('_pdf', [
            'model' => $model,
            'providerComment' => $providerComment,
        ]);

        $pdf = new \kartik\mpdf\Pdf([
            'mode' => \kartik\mpdf\Pdf::MODE_CORE,
            'format' => \kartik\mpdf\Pdf::FORMAT_A4,
            'orientation' => \kartik\mpdf\Pdf::ORIENT_PORTRAIT,
            'destination' => \kartik\mpdf\Pdf::DEST_BROWSER,
            'content' => $content,
            'cssFile' => '@vendor/kartik-v/yii2-mpdf/assets/kv-mpdf-bootstrap.min.css',
            'cssInline' => '.kv-heading-1{font-size:18px}',
            'options' => ['title' => \Yii::$app->name],
            'methods' => [
                'SetHeader' => [\Yii::$app->name],
                'SetFooter' => ['{PAGENO}'],
            ]
        ]);

        return $pdf->render();
    }

    /**
    * Creates a new TaskDelivery model by another data,
    * so user don't need to input all field from scratch.
    * If creation is successful, the browser will be redirected to the 'view' page.
    *
    * @param type $id
    * @return type
    */
    public function actionSaveAsNew($id) {
        $model = new TaskDelivery();

        if (Yii::$app->request->post('_asnew') != '1') {
            $model = $this->findModel($id);
        }
    
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('saveAsNew', [
                'model' => $model,
            ]);
        }
    }
    
    /**
     * Finds the TaskDelivery model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TaskDelivery the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
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

    public function actionChangetoprogress($id){
        $model = $this->findModel($id);
        $model->loadAll(Yii::$app->request->post());
        $model->id_status = 2;
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
