<?php

namespace app\modules\system\controllers;

use Yii;
use app\modules\system\models\DsisSystemModul;
use app\modules\system\models\DsisSystemModulSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * DsisSystemModulController implements the CRUD actions for DsisSystemModul model.
 */
class DsisSystemModulController extends Controller
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
                        'actions' => ['index', 'view', 'create', 'update', 'delete', 'pdf', 'save-as-new', 'add-dsis-system-menu', 'add-dsis-system-user-menu'],
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
     * Lists all DsisSystemModul models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new DsisSystemModulSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single DsisSystemModul model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        $providerDsisSystemMenu = new \yii\data\ArrayDataProvider([
            'allModels' => $model->dsisSystemMenus,
        ]);
        $providerDsisSystemUserMenu = new \yii\data\ArrayDataProvider([
            'allModels' => $model->dsisSystemUserMenus,
        ]);
        return $this->render('view', [
            'model' => $this->findModel($id),
            'providerDsisSystemMenu' => $providerDsisSystemMenu,
            'providerDsisSystemUserMenu' => $providerDsisSystemUserMenu,
        ]);
    }

    /**
     * Creates a new DsisSystemModul model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new DsisSystemModul();

        if ($model->loadAll(Yii::$app->request->post()) && $model->saveAll()) {
            return $this->redirect(['index']);
        } else {
            return $this->renderAjax('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing DsisSystemModul model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        if (Yii::$app->request->post('_asnew') == '1') {
            $model = new DsisSystemModul();
        }else{
            $model = $this->findModel($id);
        }

        if ($model->loadAll(Yii::$app->request->post()) && $model->saveAll()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing DsisSystemModul model.
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
     * Export DsisSystemModul information into PDF format.
     * @param integer $id
     * @return mixed
     */
    public function actionPdf($id) {
        $model = $this->findModel($id);
        $providerDsisSystemMenu = new \yii\data\ArrayDataProvider([
            'allModels' => $model->dsisSystemMenus,
        ]);
        $providerDsisSystemUserMenu = new \yii\data\ArrayDataProvider([
            'allModels' => $model->dsisSystemUserMenus,
        ]);

        $content = $this->renderAjax('_pdf', [
            'model' => $model,
            'providerDsisSystemMenu' => $providerDsisSystemMenu,
            'providerDsisSystemUserMenu' => $providerDsisSystemUserMenu,
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
    * Creates a new DsisSystemModul model by another data,
    * so user don't need to input all field from scratch.
    * If creation is successful, the browser will be redirected to the 'view' page.
    *
    * @param type $id
    * @return type
    */
    public function actionSaveAsNew($id) {
        $model = new DsisSystemModul();

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
     * Finds the DsisSystemModul model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return DsisSystemModul the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = DsisSystemModul::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    /**
    * Action to load a tabular form grid
    * for DsisSystemMenu
    * @author Yohanes Candrajaya <moo.tensai@gmail.com>
    * @author Jiwantoro Ndaru <jiwanndaru@gmail.com>
    *
    * @return mixed
    */
    public function actionAddDsisSystemMenu()
    {
        if (Yii::$app->request->isAjax) {
            $row = Yii::$app->request->post('DsisSystemMenu');
            if((Yii::$app->request->post('isNewRecord') && Yii::$app->request->post('_action') == 'load' && empty($row)) || Yii::$app->request->post('_action') == 'add')
                $row[] = [];
            return $this->renderAjax('_formDsisSystemMenu', ['row' => $row]);
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    /**
    * Action to load a tabular form grid
    * for DsisSystemUserMenu
    * @author Yohanes Candrajaya <moo.tensai@gmail.com>
    * @author Jiwantoro Ndaru <jiwanndaru@gmail.com>
    *
    * @return mixed
    */
    public function actionAddDsisSystemUserMenu()
    {
        if (Yii::$app->request->isAjax) {
            $row = Yii::$app->request->post('DsisSystemUserMenu');
            if((Yii::$app->request->post('isNewRecord') && Yii::$app->request->post('_action') == 'load' && empty($row)) || Yii::$app->request->post('_action') == 'add')
                $row[] = [];
            return $this->renderAjax('_formDsisSystemUserMenu', ['row' => $row]);
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
