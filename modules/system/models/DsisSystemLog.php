<?php

namespace app\modules\system\models;

use \app\modules\system\models\base\DsisSystemLog as BaseDsisSystemLog;

/**
 * This is the model class for table "dsis_system_log".
 */
class DsisSystemLog extends BaseDsisSystemLog
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['user'], 'string', 'max' => 255],
            [['date'], 'string', 'max' => 30],
            [['start_login', 'end_login'], 'string', 'max' => 20],
            [['created_at', 'updated_at'], 'string', 'max' => 45]
        ]);
    }
	
}
