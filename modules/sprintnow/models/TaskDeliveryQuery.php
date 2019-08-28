<?php

namespace app\modules\sprintnow\models;

/**
 * This is the ActiveQuery class for [[TaskDelivery]].
 *
 * @see TaskDelivery
 */
class TaskDeliveryQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return TaskDelivery[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return TaskDelivery|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}