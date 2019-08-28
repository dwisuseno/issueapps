<?php

namespace app\modules\backlog\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;

/**
 * This is the base model class for table "comment".
 *
 * @property integer $id
 * @property integer $id_tasklist
 * @property string $comment
 * @property string $keterangan
 * @property string $updated_at
 * @property string $created_at
 * @property string $deleted
 * @property string $created_by
 * @property string $updated_by
 *
 * @property \app\modules\backlog\models\TaskDelivery $tasklist
 */
class Comment extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_tasklist'], 'integer'],
            [['comment', 'keterangan', 'updated_at', 'created_at', 'deleted', 'created_by', 'updated_by'], 'string', 'max' => 255]
        ];
    }
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'comment';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_tasklist' => 'Id Tasklist',
            'comment' => 'Comment',
            'keterangan' => 'Keterangan',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTasklist()
    {
        return $this->hasOne(\app\modules\backlog\models\TaskDelivery::className(), ['id' => 'id_tasklist']);
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
     * @return \app\modules\backlog\models\CommentQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\modules\backlog\models\CommentQuery(get_called_class());
    }
}
