<?php

namespace app\modules\system\models;

use \app\modules\system\models\base\DsisSystemRole as BaseDsisSystemRole;

/**
 * This is the model class for table "dsis_system_role".
 */
class DsisSystemRole extends BaseDsisSystemRole
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['name'], 'string', 'max' => 20],
            [['description'], 'string', 'max' => 500],
            [['created_at', 'updated_at'], 'string', 'max' => 45]
        ]);
    }
	
}
