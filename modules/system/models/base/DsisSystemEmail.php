<?php

namespace app\modules\system\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;

/**
 * This is the base model class for table "dsis_system_email".
 *
 * @property integer $id
 * @property string $subject
 * @property string $sender
 * @property string $receiver
 * @property string $body
 * @property string $status
 * @property string $created_at
 * @property string $updated_at
 * @property string $created_by
 * @property string $updated_by
 */
class DsisSystemEmail extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['subject', 'sender', 'receiver', 'body'], 'string', 'max' => 255],
            [['status', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'string', 'max' => 45]
        ];
    }
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dsis_system_email';
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
            'subject' => 'Subject',
            'sender' => 'Sender',
            'receiver' => 'Receiver',
            'body' => 'Body',
            'status' => 'Status',
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
            'blameable' => [
                'class' => BlameableBehavior::className(),
                'createdByAttribute' => 'created_by',
                'updatedByAttribute' => 'updated_by',
                'value' => \Yii::$app->user->identity->name,
            ],
        ];
    }

    /**
     * @inheritdoc
     * @return \app\modules\system\models\DsisSystemEmailQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\modules\system\models\DsisSystemEmailQuery(get_called_class());
    }
}
