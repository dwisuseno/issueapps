<?php

namespace app\modules\system\models;

/**
 * This is the ActiveQuery class for [[DsisSystemUser]].
 *
 * @see DsisSystemUser
 */
class DsisSystemUserQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return DsisSystemUser[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return DsisSystemUser|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}