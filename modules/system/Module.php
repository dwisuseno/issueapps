<?php

namespace app\modules\system;

/**
 * system module definition class
 */
class Module extends \yii\base\Module
{
    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'app\modules\system\controllers';

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        //$this->layout = 'main.php';
        // custom initialization code goes here
    }
}
