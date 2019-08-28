<?php

namespace app\modules\system\models;

/**
 * This is the ActiveQuery class for [[DsisSystemLogActivity]].
 *
 * @see DsisSystemLogActivity
 */
class DsisSystemLogActivityQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return DsisSystemLogActivity[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return DsisSystemLogActivity|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}