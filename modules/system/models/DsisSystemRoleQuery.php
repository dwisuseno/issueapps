<?php

namespace app\modules\system\models;

/**
 * This is the ActiveQuery class for [[DsisSystemRole]].
 *
 * @see DsisSystemRole
 */
class DsisSystemRoleQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return DsisSystemRole[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return DsisSystemRole|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}