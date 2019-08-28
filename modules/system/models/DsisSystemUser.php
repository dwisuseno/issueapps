<?php

namespace app\modules\system\models;

use \app\modules\system\models\base\DsisSystemUser as BaseDsisSystemUser;

/**
 * This is the model class for table "dsis_system_user".
 */
class DsisSystemUser extends BaseDsisSystemUser
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['role_id'], 'integer'],
            [['status'], 'string'],
            [['name','email'], 'string', 'max' => 100],
            [['username'], 'string', 'max' => 40],
            [['password', 'authKey', 'accessToken'], 'string', 'max' => 255],
            [['created_at', 'updated_at'], 'string', 'max' => 45],
            [['name', 'username', 'role_id', 'password'],'required'],
            [['name', 'username',],'unique'],
        ]);
    }
	
}
