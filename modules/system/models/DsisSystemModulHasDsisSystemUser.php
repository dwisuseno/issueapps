<?php

namespace app\modules\system\models;

use \app\modules\system\models\base\DsisSystemModulHasDsisSystemUser as BaseDsisSystemModulHasDsisSystemUser;

/**
 * This is the model class for table "dsis_system_modul_has_dsis_system_user".
 */
class DsisSystemModulHasDsisSystemUser extends BaseDsisSystemModulHasDsisSystemUser
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['dsis_system_modul_id', 'dsis_system_user_id'], 'required'],
            [['dsis_system_modul_id', 'dsis_system_user_id'], 'integer']
        ]);
    }
	
}
