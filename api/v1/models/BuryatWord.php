<?php

namespace app\api\v1\models;

use app\models\BuryatWord as BaseModel;

class BuryatWord extends BaseModel
{
    /**
     * @inheritdoc
     */
    public function fields()
    {
        $fields = parent::fields();
        unset($fields['id'], $fields['name']);
        $fields[] = 'translations';

        return $fields;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTranslations()
    {
        return parent::getTranslations()->select('name');
    }
}