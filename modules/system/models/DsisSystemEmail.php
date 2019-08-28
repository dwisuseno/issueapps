<?php

namespace app\modules\system\models;

use \app\modules\system\models\base\DsisSystemEmail as BaseDsisSystemEmail;

/**
 * This is the model class for table "dsis_system_email".
 */
class DsisSystemEmail extends BaseDsisSystemEmail
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['subject', 'sender', 'receiver', 'body'], 'string', 'max' => 255],
            [['status', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'string', 'max' => 45]
        ]);
    }
	
}
