<?php

namespace app\models\queries;

class NewsQuery extends \yii\db\ActiveQuery
{
    public function active(): self
    {
        return $this->andWhere(['active' => 1]);
    }
}