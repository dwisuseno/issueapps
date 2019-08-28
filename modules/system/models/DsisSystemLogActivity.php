<?php

namespace app\modules\system\models;

use \app\modules\system\models\base\DsisSystemLogActivity as BaseDsisSystemLogActivity;

/**
 * This is the model class for table "dsis_system_log_activity".
 */
class DsisSystemLogActivity extends BaseDsisSystemLogActivity
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['time'], 'safe'],
            [['user'], 'string', 'max' => 100],
            [['activity'], 'string', 'max' => 255],
            [['details'], 'string', 'max' => 500]
        ]);
    }
	
}
