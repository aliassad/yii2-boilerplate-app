<?php

namespace common\models\query;

/**
 * This is the ActiveQuery class for [[\common\models\Guard]].
 *
 * @see \common\models\Guard
 */
class GuardQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return \common\models\Guard[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\Guard|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
