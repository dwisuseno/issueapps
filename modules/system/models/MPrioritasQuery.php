<?php

namespace app\modules\system\models;

/**
 * This is the ActiveQuery class for [[MPrioritas]].
 *
 * @see MPrioritas
 */
class MPrioritasQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return MPrioritas[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return MPrioritas|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}