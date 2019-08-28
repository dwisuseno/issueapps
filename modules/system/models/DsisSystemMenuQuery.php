<?php

namespace app\modules\system\models;

/**
 * This is the ActiveQuery class for [[DsisSystemMenu]].
 *
 * @see DsisSystemMenu
 */
class DsisSystemMenuQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return DsisSystemMenu[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return DsisSystemMenu|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}