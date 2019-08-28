<?php

namespace app\modules\system\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the base model class for table "dsis_system_log".
 *
 * @property integer $id
 * @property string $user
 * @property string $date
 * @property string $start_login
 * @property string $end_login
 * @property string $created_at
 * @property string $updated_at
 */
class DsisSystemLog extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user'], 'string', 'max' => 255],
            [['date'], 'string', 'max' => 30],
            [['start_login', 'end_login'], 'string', 'max' => 20],
            [['created_at', 'updated_at'], 'string', 'max' => 45]
        ];
    }
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dsis_system_log';
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
            'user' => 'User',
            'date' => 'Date',
            'start_login' => 'Start Login',
            'end_login' => 'End Login',
        ];
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
     * @return \app\modules\system\models\DsisSystemLogQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\modules\system\models\DsisSystemLogQuery(get_called_class());
    }
}
