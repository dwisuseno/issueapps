<?php

namespace app\modules\system\controllers;

use Yii;
use app\modules\system\models\DsisSystemUserMenu;
use app\modules\system\models\DsisSystemUser;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * DsisSystemUserMenuController implements the CRUD actions for DsisSystemUserMenu model.
 */
class DsisSystemUserMenuController extends Controller
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
                        'actions' => ['index', 'view', 'create', 'update', 'delete', 'syncrone'],
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
     * Lists all DsisSystemUserMenu models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => DsisSystemUserMenu::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single DsisSystemUserMenu model.
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
     * Creates a new DsisSystemUserMenu model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new DsisSystemUserMenu();

        if ($model->loadAll(Yii::$app->request->post()) && $model->saveAll()) {
            return $this->redirect(['index']);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing DsisSystemUserMenu model.
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
     * Deletes an existing DsisSystemUserMenu model.
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
     * Finds the DsisSystemUserMenu model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return DsisSystemUserMenu the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = DsisSystemUserMenu::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionSyncrone(){
        

        $data_user = DsisSystemUser::find()->select('id')->asArray()->all();
        $data_user_on_list = DsisSystemUserMenu::find()->select('user_id')->asArray()->all();

        // echo "<pre>";
        // var_dump($data_user_on_list);
        // echo "</pre>";
        // exit();

        if(sizeof($data_user_on_list) == 0){
            for($i=0;$i<sizeof($data_user);$i++){
                $model = new DsisSystemUserMenu();
                $model->user_id = $data_user[$i]['id'];
                $model->saveAll();
            }
        } else {
            for($i=0;$i<sizeof($data_user);$i++){
                $flag = 1;
                for($j=0;$j<sizeof($data_user_on_list);$j++){
                    if($data_user[$i]['id'] == $data_user_on_list[$j]['user_id']){
                        $flag = 0;
                        
                    } 
                    
                }
                if($flag == 1){
                    $model = new DsisSystemUserMenu();
                    $model->user_id = $data_user[$i]['id'];
                    $model->saveAll();
                }
            }
        }

        

        return $this->redirect(['index']);
        // echo "<pre>";
        // var_dump($data_user[0]);
        // echo "</pre>";
    }
}
