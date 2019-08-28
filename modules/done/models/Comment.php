<?php

namespace app\modules\done\models;

use \app\modules\done\models\base\Comment as BaseComment;

/**
 * This is the model class for table "comment".
 */
class Comment extends BaseComment
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['id_tasklist'], 'integer'],
            [['comment', 'keterangan', 'updated_at', 'created_at', 'deleted', 'created_by', 'updated_by'], 'string', 'max' => 255]
        ]);
    }
	
}
