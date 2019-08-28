<?php

namespace app\modules\system\controllers;

use Yii;
use app\modules\system\models\DsisSystemEmail;
use app\modules\system\models\DsisSystemEmailSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * DsisSystemEmailController implements the CRUD actions for DsisSystemEmail model.
 */
class DsisSystemEmailController extends Controller
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
                        'actions' => ['index', 'view', 'create', 'update', 'delete', 'pdf'],
                        'roles' => ['@']
                    ],
                    [
                        'allow' => false
                    ]
                ]
            ]
        ];
    }

    public $logMessage = NULL;
        
    public $writeLog = false;

    public function afterAction($action, $result)
    {   
        $result = parent::afterAction($action, $result);
        // var_dump($action);
        // exit();
        if($action->controller->logMessage == NULL){
            $action->controller->logMessage = "OK";
        }
        $sql_insert = "INSERT INTO dsis_system_log_activity (user,activity,details) VALUES ('".Yii::$app->user->identity->name."','".$action->actionMethod."','".$action->controller->id.' - '.$action->controller->module->controllerNamespace.' - '.$action->controller->logMessage."')";
        $command = Yii::$app->db->CreateCommand($sql_insert);
        $command->execute();

        return $result;
    }
    /**
     * Lists all DsisSystemEmail models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new DsisSystemEmailSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single DsisSystemEmail model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new DsisSystemEmail model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new DsisSystemEmail();

        if ($model->loadAll(Yii::$app->request->post()) ) {
            $model->sender = \Yii::$app->user->identity->name;

            $tes = Yii::$app->mail->compose()
                ->setFrom(['info@portal.borneoindobara.com' => $model->sender])
                ->setTo($model->receiver)
                ->setSubject($model->subject)
                ->setHtmlBody($model->body)
                ->send();
            if($tes){
                $model->status = "Terkirim";
                $model->saveAll();
            }
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing DsisSystemEmail model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->loadAll(Yii::$app->request->post()) && $model->saveAll()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing DsisSystemEmail model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->deleteWithRelated();

        return $this->redirect(['index']);
    }
    
    /**
     * 
     * Export DsisSystemEmail information into PDF format.
     * @param integer $id
     * @return mixed
     */
    public function actionPdf($id) {
        $model = $this->findModel($id);

        $content = $this->renderAjax('_pdf', [
            'model' => $model,
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
     * Finds the DsisSystemEmail model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return DsisSystemEmail the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = DsisSystemEmail::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
