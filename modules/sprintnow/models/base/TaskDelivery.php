<?php

namespace app\modules\sprintnow\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;

/**
 * This is the base model class for table "task_delivery".
 *
 * @property integer $id
 * @property integer $id_sprint
 * @property integer $id_aplikasi
 * @property integer $id_pic
 * @property integer $id_platform
 * @property integer $id_model_menu
 * @property integer $is_tested_by_vendor
 * @property integer $is_tested_by_owner
 * @property integer $id_status
 * @property integer $id_prioritas
 * @property string $issue
 * @property integer $estimated_day
 * @property string $actual_finish_date
 * @property string $deployment
 * @property string $keterangan
 * @property string $updated_at
 * @property string $created_at
 * @property string $deleted
 * @property string $created_by
 * @property string $updated_by
 *
 * @property \app\modules\backlog\models\Comment[] $comments
 * @property \app\modules\backlog\models\MSprint $sprint
 * @property \app\modules\backlog\models\MAplikasi $aplikasi
 * @property \app\modules\backlog\models\MPic $pic
 * @property \app\modules\backlog\models\MPlatform $platform
 * @property \app\modules\backlog\models\MModelMenu $modelMenu
 * @property \app\modules\backlog\models\MStatus $status
 * @property \app\modules\backlog\models\MPrioritas $prioritas
 */
class TaskDelivery extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_sprint', 'id_aplikasi', 'id_pic', 'id_platform', 'id_model_menu', 'is_tested_by_vendor', 'is_tested_by_owner', 'id_status', 'id_prioritas', 'estimated_day'], 'integer'],
            [['issue'], 'string', 'max' => 800],
            [['actual_finish_date', 'deployment', 'keterangan', 'updated_at', 'created_at', 'deleted', 'created_by', 'updated_by'], 'string', 'max' => 255]
        ];
    }
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'task_delivery';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_sprint' => 'Sprint Ke-',
            'id_aplikasi' => 'Aplikasi',
            'id_pic' => 'Assign Developer',
            'id_platform' => 'Platform',
            'id_model_menu' => 'Model / Menu',
            'is_tested_by_vendor' => 'Tested By FUSI',
            'is_tested_by_owner' => 'Tested By BC',
            'id_status' => 'Status',
            'id_prioritas' => 'Prioritas',
            'issue' => 'Issue',
            'estimated_day' => 'Estimated Dev in Day',
            'actual_finish_date' => 'Actual Finish Date',
            'deployment' => 'Deployment',
            'keterangan' => 'Keterangan',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComments()
    {
        return $this->hasMany(\app\modules\sprintnow\models\Comment::className(), ['id_tasklist' => 'id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSprint()
    {
        return $this->hasOne(\app\modules\datamaster\models\MSprint::className(), ['id' => 'id_sprint']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAplikasi()
    {
        return $this->hasOne(\app\modules\datamaster\models\MAplikasi::className(), ['id' => 'id_aplikasi']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPic()
    {
        return $this->hasOne(\app\modules\datamaster\models\MPic::className(), ['id' => 'id_pic']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPlatform()
    {
        return $this->hasOne(\app\modules\datamaster\models\MPlatform::className(), ['id' => 'id_platform']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getModelMenu()
    {
        return $this->hasOne(\app\modules\datamaster\models\MModelMenu::className(), ['id' => 'id_model_menu']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStatus()
    {
        return $this->hasOne(\app\modules\datamaster\models\MStatus::className(), ['id' => 'id_status']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPrioritas()
    {
        return $this->hasOne(\app\modules\datamaster\models\MPrioritas::className(), ['id' => 'id_prioritas']);
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
     * @return \app\modules\backlog\models\TaskDeliveryQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\modules\sprintnow\models\TaskDeliveryQuery(get_called_class());
    }
}
