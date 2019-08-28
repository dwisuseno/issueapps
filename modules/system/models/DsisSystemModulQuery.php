<?php

namespace app\modules\system\models;

/**
 * This is the ActiveQuery class for [[DsisSystemModul]].
 *
 * @see DsisSystemModul
 */
class DsisSystemModulQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return DsisSystemModul[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return DsisSystemModul|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}