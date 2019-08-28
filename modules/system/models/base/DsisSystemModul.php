<?php

namespace app\modules\system\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the base model class for table "dsis_system_modul".
 *
 * @property integer $id
 * @property string $name
 * @property string $created_at
 * @property string $updated_at
 *
 * @property \app\modules\system\models\DsisSystemMenu[] $dsisSystemMenus
 * @property \app\modules\system\models\DsisSystemUserMenu[] $dsisSystemUserMenus
 */
class DsisSystemModul extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'created_at', 'updated_at'], 'string', 'max' => 45]
        ];
    }
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dsis_system_modul';
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
            'name' => 'Name',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDsisSystemMenus()
    {
        return $this->hasMany(\app\modules\system\models\DsisSystemMenu::className(), ['modul_id' => 'id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDsisSystemUserMenus()
    {
        return $this->hasMany(\app\modules\system\models\DsisSystemUserMenu::className(), ['modul_id' => 'id']);
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
     * @return \app\modules\system\models\DsisSystemModulQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\modules\system\models\DsisSystemModulQuery(get_called_class());
    }
}
