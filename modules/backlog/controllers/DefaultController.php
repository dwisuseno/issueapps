<?php

namespace app\modules\backlog\controllers;

use yii\web\Controller;

/**
 * Default controller for the `backlog` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->redirect('backlog/task-delivery');
    }
}
