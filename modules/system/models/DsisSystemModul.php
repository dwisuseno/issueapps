<?php

namespace app\modules\system\models;

use \app\modules\system\models\base\DsisSystemModul as BaseDsisSystemModul;

/**
 * This is the model class for table "dsis_system_modul".
 */
class DsisSystemModul extends BaseDsisSystemModul
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['name', 'created_at', 'updated_at'], 'string', 'max' => 45],
            [['name'], 'unique']
        ]);
    }
	
}
