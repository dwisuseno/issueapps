<?php

namespace app\modules\system\models;

/**
 * This is the ActiveQuery class for [[DsisSystemModulHasDsisSystemUser]].
 *
 * @see DsisSystemModulHasDsisSystemUser
 */
class DsisSystemModulHasDsisSystemUserQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return DsisSystemModulHasDsisSystemUser[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return DsisSystemModulHasDsisSystemUser|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}