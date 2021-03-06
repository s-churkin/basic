<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Ff_Instance]].
 *
 * @see Ff_Instance
 */
class Ff_InstanceQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return Ff_Instance[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Ff_Instance|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}