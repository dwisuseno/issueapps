<?php

namespace app\modules\system\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the base model class for table "dsis_system_user".
 *
 * @property integer $id
 * @property integer $role_id
 * @property string $name
 * @property string $username
 * @property string $password
 * @property string $authKey
 * @property string $accessToken
 * @property string $status
 * @property string $created_at
 * @property string $updated_at
 *
 * @property \app\modules\system\models\DsisSystemRole $role
 * @property \app\modules\system\models\DsisSystemUserMenu[] $dsisSystemUserMenus
 */
class DsisSystemUser extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['role_id'], 'integer'],
            [['status'], 'string'],
            [['name','email'], 'string', 'max' => 100],
            [['username'], 'string', 'max' => 40],
            [['password', 'authKey', 'accessToken'], 'string', 'max' => 255],
            [['created_at', 'updated_at'], 'string', 'max' => 45]
        ];
    }
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dsis_system_user';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('db');
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'role_id' => 'Role ID',
            'name' => 'Name',
            'username' => 'Username',
            'password' => 'Password',
            'authKey' => 'Auth Key',
            'accessToken' => 'Access Token',
            'status' => 'Status',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRole()
    {
        return $this->hasOne(\app\modules\system\models\DsisSystemRole::className(), ['id' => 'role_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDsisSystemUserMenus()
    {
        return $this->hasMany(\app\modules\system\models\DsisSystemUserMenu::className(), ['user_id' => 'id']);
    }


/**
     * @inheritdoc
     * @return array mixed
     */ 
    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'created_at',
                'updatedAtAttribute' => 'updated_at',
                'value' => new \yii\db\Expression('NOW()'),
            ],
        ];
    }

    /**
     * @inheritdoc
     * @return \app\modules\system\models\DsisSystemUserQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\modules\system\models\DsisSystemUserQuery(get_called_class());
    }
}
