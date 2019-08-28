<?php

namespace app\modules\system\models;

use \app\modules\system\models\base\DsisSystemUserMenu as BaseDsisSystemUserMenu;

/**
 * This is the model class for table "dsis_system_user_menu".
 */
class DsisSystemUserMenu extends BaseDsisSystemUserMenu
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['modul_id', 'user_id'], 'integer']
        ]);
    }
	
}
