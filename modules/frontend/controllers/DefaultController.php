<?php

namespace app\modules\frontend\controllers;


use yii\web\Controller;
use app\modules\project\models\MModul;

/**
 * Default controller for the `frontend` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    

    protected function findModel($id)
    {
        if (($model = MModul::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
